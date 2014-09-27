<?php

namespace Michcald\Website;

abstract class Controller extends \Michcald\Mvc\Controller
{
    protected function render($filename, array $data = array())
    {
        $twig = \Michcald\Mvc\Container::get('website.twig');

        return $twig->render($filename, $data);
    }

    /**
     *
     * @param type $method
     * @param type $resource
     * @param array $params
     * @return \Michcald\RestClient\Response
     */
    protected function restCall($method, $resource, array $params = array())
    {
        /* @var $rest \Michcald\Website\RestClient */
        $rest = \Michcald\Mvc\Container::get('website.rest_client');

        return $rest->call($method, $resource, $params);
    }

    protected function redirect($routeId, array $params = array())
    {
        /* @var $router \Michcald\Mvc\Router */
        $router = \Michcald\Mvc\Container::get('mvc.router');

        foreach ($router->getRoutes() as $route) {
            /* @var $route \Michcald\Mvc\Router\Route */
            if ($route->getId() == $routeId) {
                $uri = $route->getUri()->generate($params);
                $config = Config::getInstance();
                header(sprintf('Location: %s/%s', $config->base_url, $uri));
                die;
            }
        }

        throw new \Exception(sprintf('Route id %s not found', $routeId));
    }

    protected function generateUrl($routeId, array $params = array())
    {
        /* @var $router \Michcald\Mvc\Router */
        $router = \Michcald\Mvc\Container::get('mvc.router');

        foreach ($router->getRoutes() as $route) {
            /* @var $route \Michcald\Mvc\Router\Route */
            if ($route->getId() == $routeId) {
                $uri = $route->getUri()->generate($params);
                $config = Config::getInstance();
                return sprintf('%s%s', $config->base_url, $uri);
            }
        }

        throw new \Exception(sprintf('Route id %s not found', $routeId));
    }
}
