<?php

namespace classes;

/*
    Класс маршрутизатора, который будет обрабатывать запросы и вызывать контроллеры с их методами.
*/
use classes\Debugger;

class Router {
    private RouteService $routeService;
    private array $routes;

    public function __construct(RouteService $routeService) {
        $this->routeService = $routeService;
        $this->routes = $this->routeService->getRoutes();
    }

    public function execute() {
        $URI = $_SERVER['REQUEST_URI'];
        $controller = null;  
        $action = null;    
        $params = null;
        
        foreach ($this->routes as $route) {
            if($URI === $route['path']){
                $controller = "controllers\\" . $route['controller'];
                $action = $route['action'] ?? 'index';
                break;
            }      
        }

        $controllerInstance = new $controller();

        call_user_func_array([$controllerInstance, $action], [$params]);
    }
}