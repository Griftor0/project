<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('autoload.php');
require('debug.php');

use classes\Router;
use classes\Routes;
use classes\RouteService;

$routeService = new RouteService(new Routes());

$router = new Router($routeService);
$router->execute();
