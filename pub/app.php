<?php

define('ENV', 'prod');

include '../vendor/autoload.php';

ini_set('display_errors', 0);

\Michcald\Website\Bootstrap::init();

$mvc = \Michcald\Mvc\Container::get('website.mvc');

$request = \Michcald\Mvc\Container::get('website.mvc.request');

$mvc->run($request);