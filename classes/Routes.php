<?php

namespace classes;

/*
    Добавлен интерфейс для работы с маршрутами, с возможностью загрузки их из JSON-конфига.
    На будущее можно добавить добавление в бд
*/

interface IRoutes {
    public static function getRoutes(): array;
}

class Routes implements IRoutes {
    private static array $routes;

    public function __construct()
    {
        $filePath = 'config/routes.json';
        $json = file_get_contents($filePath);
        $data = json_decode($json, true);
        self::$routes = $data['routes'];
    }

    public static function getRoutes(): array {
        return self::$routes;
    }
}