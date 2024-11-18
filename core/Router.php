<?php

/*
    Класс маршрутизатора, который будет обрабатывать запросы и вызывать контроллеры с их методами.
    TODO: Сделать обработку регулярок {id}
    TODO: Написать хэндлер 404 при /controllers/Homecontroller; и при /autoload.php
*/

namespace Core;

use Services\RouteService;

class Router {
    private array $routes;

    public function __construct(RouteService $routeService) {
        $this->routes = $routeService->getRoutes();
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

        if(!$controller){
            http_response_code(404);
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        tt($controller);

        $controllerInstance = new $controller();

        call_user_func_array([$controllerInstance, $action], [$params]);
    }
}