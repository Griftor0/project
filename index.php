<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('autoload.php');

use classes\Debugger;
use classes\Routes;
use classes\RouteService;

$routes = new RouteService(new Routes());
$routes->add('GET', '/home', 'HomeController', 'index');
$routes->add('POST', '/login', 'AuthController', 'login');


Debugger::tt($router->getRoutes());
Debugger::tt($router2->getRoutes());
