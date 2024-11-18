<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('debug.php');
require_once('autoload.php');

use Config\Routes;
use Services\RouteService;
use Core\Router;

$routeService = new RouteService(new Routes());

$router = new Router($routeService);
$router->execute();
