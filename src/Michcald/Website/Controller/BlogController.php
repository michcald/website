<?php

namespace Michcald\Website\Controller;

class BlogController extends \Michcald\Website\Controller
{
    private function getPostsList($page)
    {
        $res = $this->restCall('get', 'repository/26/entity', array(
            'limit' => 10,
            'page' => $page,
            'filters' => array(
                array(
                    'field' => 'public',
                    'value' => 1
                )
            ),
            'orders' => array(
                array(
                    'field' => 'published',
                    'direction' => 'desc'
                )
            )
        ));

        if ($res->getStatusCode() != 200) {
            throw new \Exception($res->getContent());
        }

        #\Zend\Debug\Debug::dump(json_decode($res->getContent(), true));die;

        return json_decode($res->getContent(), true);
    }

    public function indexAction()
    {
        $page = (int)$this->getRequest()->getQueryParam('page', 1);

        $array = $this->getPostsList($page);

        $content = $this->render(
            'blog/index.html.twig',
            array(
                'paginator' => $array['paginator'],
                'posts' => $array['results']
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function readAction($id, $date, $title)
    {
        $res = $this->restCall('get', sprintf('repository/26/entity/%d', $id));

        if ($res->getStatusCode() != 200) {

        }

        #\Zend\Debug\Debug::dump(json_decode($res->getContent(), true));die;

        $array = json_decode($res->getContent(), true);

        if ($array['public'] == 0) {
            throw new \Exception('not public');
        }

        if (strtotime($array['published']) > time()) {
            throw new \Exception('Not published yet');
        }

        $content = $this->render(
            'blog/read.html.twig',
            array(
                'post' => $array,
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }
}