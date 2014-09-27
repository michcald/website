<?php

namespace Michcald\Website\Twig;

class Util extends \Twig_Extension
{
    public function getName()
    {
        return 'website_util';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('blankToDash', array($this, 'fromBlankToDash')),
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('asset', array($this, 'asset')),
            new \Twig_SimpleFunction('config', array($this, 'config')),
            new \Twig_SimpleFunction('url', array($this, 'url')),
            new \Twig_SimpleFunction('navbar', array($this, 'navbar')),
            new \Twig_SimpleFunction('analytics', array($this, 'analytics')),
            new \Twig_SimpleFunction('paginator', array($this, 'paginator')),
        );
    }

    public function paginator(array $paginator, $routeId, array $routeParams = array())
    {
        $twig = \Michcald\Mvc\Container::get('website.twig');

        echo $twig->render('twig/paginator.html.twig', array(
            'paginator'   => $paginator,
            'routeId'     => $routeId,
            'routeParams' => $routeParams
        ));
    }

    public function fromBlankToDash($string)
    {
        return str_replace(' ', '-', $string);
    }

    public function config()
    {
        return \Michcald\Website\Config::getInstance();
    }

    public function asset($filename)
    {
        $config = \Michcald\Website\Config::getInstance();

        $file = sprintf(
            '%s/pub/assets/%s',
            $config->base_dir,
            $filename
        );

        return $file;
    }

    public function url($routeId, array $routeParams = array())
    {
        /* @var $router \Michcald\Mvc\Router */
        $router = \Michcald\Mvc\Container::get('mvc.router');

        /* @var $selectedRoute \Michcald\Mvc\Router\Route */
        $selectedRoute = null;
        foreach ($router->getRoutes() as $route) {
            /* @var $route \Michcald\Mvc\Router\Route */
            if ($route->getId() == $routeId) {
                $selectedRoute = $route;
                break;
            }
        }

        if (!$selectedRoute) {
            throw new \Exception(sprintf('No route found with ID %s', $routeId));
        }

        $uri = $selectedRoute->getUri();

        $realUri = $uri->generate($routeParams);

        $config = \Michcald\Website\Config::getInstance();

        $url = sprintf(
            '%s/%s',
            $config->base_url,
            $realUri
        );

        return $url;
    }

    public function navbar($selected)
    {
        $twig = \Michcald\Mvc\Container::get('website.twig');

        echo $twig->render(
            'twig/navbar.html.twig',
            array(
                'selected' => $selected
            )
        );
    }

    public function analytics($selected)
    {
        $twig = \Michcald\Mvc\Container::get('website.twig');

        echo $twig->render(
            'twig/analytics.html.twig'
        );
    }

}