<?php

namespace Core;

class Router {
    private array $routes;

    public function __construct(IRoutes $routeService) {
        $this->routes = $routeService->getRoutes();
    }

    public function execute() : void {
        $URI = $_SERVER['REQUEST_URI'];
        $controller = null;  
        $action = null;    
        $params = null;
        
        foreach ($this->routes as $route) {
            if($URI === $route['path']){
                $controller = "app\\controllers\\" . $route['controller'];
                $action = $route['action'] ?? 'index';
                break;
            }      
        }

        if (!$controller || !class_exists($controller) || !method_exists($controller, $action)) {
            http_response_code(404);
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        $controllerInstance = new $controller();
        call_user_func_array([$controllerInstance, $action], [$params]);
    }
}