<?php

/*
    Инжектор маршрутов.
*/

namespace Services;

use Config\IRoutes;

class RouteService {
    private IRoutes $routesInterface;

    public function __construct(IRoutes $routesInterface) {
        $this->routesInterface = $routesInterface;
    }

    public function getRoutes(): array {
        return $this->routesInterface->getRoutes();
    }
}