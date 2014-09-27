<?php

namespace Michcald\Website;

abstract class Bootstrap
{
    public static function init()
    {
        date_default_timezone_set('Europe/London');

        self::initConfig();
        self::initRoutes();
        self::initRequest();
        self::initRestClient();
        self::initTwig();
    }

    private static function initConfig()
    {
        $dir = realpath(__DIR__ . '/../../../app/config');

        $config = \Michcald\Website\Config::getInstance();

        if (file_exists(sprintf('%s/parameters.yml', $dir))) {
            $config->loadFile(sprintf('%s/parameters.yml', $dir));
        }

        if (file_exists(sprintf('%s/users.yml', $dir))) {
            $config->loadFile(sprintf('%s/users.yml', $dir));
        }

        $config->loadFile(sprintf('%s/config.yml', $dir));
        $config->loadFile(sprintf('%s/routes.yml', $dir));
    }

    private static function initRoutes()
    {
        $mvc = new \Michcald\Mvc\Mvc();

        $config = \Michcald\Website\Config::getInstance();

        foreach ($config->routes as $routeConfig) {

            $uri = new \Michcald\Mvc\Router\Route\Uri();
            $uri->setPattern($routeConfig['uri']['pattern']);

            foreach ($routeConfig['uri']['requirements'] as $requirement) {
                $uri->setRequirement($requirement['param'], $requirement['value']);
            }

            $route = new \Michcald\Mvc\Router\Route();
            $route->setMethods($routeConfig['methods'])
                ->setUri($uri)
                ->setId($routeConfig['name'])
                ->setControllerClass($routeConfig['controller'])
                ->setActionName($routeConfig['action']);

            $mvc->addRoute($route);
        }

        \Michcald\Mvc\Container::add('website.mvc', $mvc);
    }

    private static function initRequest()
    {
        $request = new \Michcald\Website\Request();

        \Michcald\Mvc\Container::add('website.mvc.request', $request);
    }

    private static function initRestClient()
    {
        $config = \Michcald\Website\Config::getInstance();

        if (isset($config->dummy)) {

            $endpoint = $config->dummy['endpoint'];

            if ($endpoint{strlen($endpoint)-1} != '/') {
                $endpoint .= '/';
            }

            $rest = new RestClient($endpoint);

            $auth = new RestClient\DummyAuth();
            $auth->setPrivateKey($config->dummy['key']['private'])
                ->setPublicKey($config->dummy['key']['public']);

            $rest->setAuth($auth);

            \Michcald\Mvc\Container::add('website.rest_client', $rest);
        }
    }

    private static function initTwig()
    {
        $config = \Michcald\Website\Config::getInstance();

        if (isset($config->twig)) {
            $options = array();

            $templates = __DIR__ . '/../../../' . $config->twig['templates'];

            if (ENV == 'prod') {
                $options['cache'] = __DIR__ . '/../../../' . $config->twig['cache'];
            }

            if (ENV == 'dev') {
                $options['debug'] = true;
            }

            $loader = new \Twig_Loader_Filesystem($templates);
            $twig = new \Twig_Environment($loader, $options);

            $twig->addExtension(new Twig\Util());

            if (ENV == 'dev') {
                $twig->addExtension(new \Twig_Extension_Debug());
            }

            \Michcald\Mvc\Container::add('website.twig', $twig);
        }
    }
}
