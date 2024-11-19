<?php

/*
    Класс маршрутизатора, который будет обрабатывать запросы и вызывать контроллеры с их методами.
    TODO: Сделать обработку регулярок {id}
    TODO: Написать хэндлер 404 при /controllers/Homecontroller; и при /autoload.php
    TODO: Продумать логирование
    TODO: Подумать над темой сайта
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('debug.php');
require_once('autoload.php');

use Core\Routes;
use Core\Router;

$router = new Router(new Routes());
$router->execute();

