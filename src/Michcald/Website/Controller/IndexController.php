<?php

namespace Michcald\Website\Controller;

class IndexController extends \Michcald\Website\Controller
{
    private function getHighlightedPostsList()
    {
        $res = $this->restCall('get', 'repository/26/entity', array(
            'limit' => 1000,
            'filters' => array(
                array(
                    'field' => 'public',
                    'value' => 1
                ),
                array(
                    'field' => 'highlight',
                    'value' => 1
                )
            ),
            'orders' => array(
                array(
                    'field' => 'created',
                    'direction' => 'asc'
                )
            )
        ));

        if ($res->getStatusCode() != 200) {

        }

        #\Zend\Debug\Debug::dump(json_decode($res->getContent(), true));die;

        $array = json_decode($res->getContent(), true);

        $posts = array();

        foreach ($array['results'] as $post) {
            if (strtotime($post['published']) < time()) {
                $posts[] = $post;
            }
        }

        return $posts;
    }

    public function indexAction()
    {
        $content = $this->render(
            'index/index.html.twig',
            array(
                'posts' => $this->getHighlightedPostsList()
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function aboutMeAction()
    {
        $res = $this->restCall('get', 'repository/27/entity/1');

        if ($res->getStatusCode() != 200) {

        }

        $page = json_decode($res->getContent(), true);

        $content = $this->render(
            'index/about_me.html.twig',
            array(
                'page' => $page,
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function openSourceAction()
    {
        $res = $this->restCall('get', 'repository/27/entity/4');

        if ($res->getStatusCode() != 200) {

        }

        $page = json_decode($res->getContent(), true);

        $content = $this->render(
            'index/open_source.html.twig',
            array(
                'page' => $page,
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function blogAction()
    {
        $content = $this->render(
            'index/blog.html.twig'
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function contactMeAction()
    {
        $builder = new \Gregwar\Captcha\CaptchaBuilder();
        $builder->build();

        // saving the phrase in the session
        $_SESSION['phrase'] = $builder->getPhrase();

        if ($this->getRequest()->isMethod('post')) {
            if($builder->testPhrase($userInput)) {
                // instructions if user phrase is good
            }
            else {
                // user phrase is wrong
            }
        }

        $content = $this->render(
            'index/contact_me.html.twig',
            array(
                'captcha' => $builder
            )
        );

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }

    public function notFoundAction($any)
    {
        $this->getLogger()->addNotice('Page not found', array(
            'uri' => $any
        ));

        $content = $this->render('index/not-found.html.twig', array(
            'message' => sprintf('Page not found: %s', $any)
        ));

        $response = new \Michcald\Mvc\Response();
        $response->addHeader('Content-Type: text/html')
            ->setContent($content);
        return $response;
    }
}