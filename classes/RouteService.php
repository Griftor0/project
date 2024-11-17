<?php

namespace classes;

/*
    Инжектер маршрутов
*/

class RouteService{
    private IRoutes $routesInterface;

    public function __construct(IRoutes $routesInterface) {
        $this->routesInterface = $routesInterface;
    }

    public function add(string $method, string $path, string $controller, string $action): void {
        $this->routesInterface->add($method, $path, $controller, $action);
    }

    public function getRoutes(): array {
        return $this->routesInterface->getRoutes();
    }
}