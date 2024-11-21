<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('debug.php');
require_once('autoload.php');

use Core\Routes;
use Core\Router;

$router = new Router(new Routes());
$router->execute();

