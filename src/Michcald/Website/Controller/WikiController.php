<?php

namespace Michcald\Website\Controller;

class WikiController extends \Michcald\Website\Controller
{
    private function getList()
    {
        $res = $this->restCall('get', 'repository/24/entity', array(
            'limit' => 1000,
            'filters' => array(
                array(
                    'field' => 'public',
                    'value' => 1
                )
            ),
            'orders' => array(
                array(
                    'field' => 'title',
                    'direction' => 'asc'
                )
            )
        ));

        if ($res->getStatusCode() != 200) {

        }

        #\Zend\Debug\Debug::dump(json_decode($res->getContent(), true));die;

        return json_decode($res->getContent(), true);
    }

    public function indexAction()
    {
        $array = $this->getList();

        $content = $this->render(
            'wiki/index.html.twig',
            array(
                'paginator' => $array['paginator'],
                'items' => $array['results']
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function readAction($id, $title)
    {
        $res = $this->restCall('get', sprintf('repository/24/entity/%d', $id));

        if ($res->getStatusCode() != 200) {

        }

        #\Zend\Debug\Debug::dump(json_decode($res->getContent(), true));die;

        $array = json_decode($res->getContent(), true);

        if ($array['public'] == 0) {
            throw new \Exception('not public');
        }

        $items = $this->getList();

        $content = $this->render(
            'wiki/read.html.twig',
            array(
                'item' => $array,
                'items' => $items['results']
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }
}