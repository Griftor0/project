<?php

namespace classes;

/*
    Добавлен интерфейс, в случае новых способов хранения маршрутов
*/

interface IRoutes{
    public static function getRoutes(): array;
    public static function add(string $method, string $path, string $controller, string $action): void;
}

class Routes implements IRoutes{
    private static array $routes = [];

    public static function getRoutes(): array{
        return self::$routes;
    }

    public static function add(string $method, string $path, string $controller, string $action): void{
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }
}