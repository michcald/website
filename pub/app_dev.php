<?php

define('ENV', 'dev');

include '../vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

\Michcald\Website\Bootstrap::init();

$mvc = \Michcald\Mvc\Container::get('website.mvc');

$request = \Michcald\Mvc\Container::get('website.mvc.request');

$mvc->run($request);