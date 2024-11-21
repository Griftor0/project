<?php

namespace Core;

class Router {
    private array $routes;

    public function __construct(IRoutes $routeService) {
        $this->routes = $routeService->getRoutes();
    }

    public function execute() : void {
        $URI = $_SERVER['REQUEST_URI'];
        
        $route = $this->findRoute($URI);

        if (!$route) {
            $this->handleNotFound();
        }

        $controller = 'App\\Controllers\\' . $route['controller'];
        $action = $route['action'];

        // Создаем экземпляр контроллера и вызываем действие
        $controllerInstance = new $controller();
        call_user_func_array([$controllerInstance, $action], []);
    }

    // Нахождение маршрута из routes.json
    private function findRoute(string $URI) : ?array {
        if ($URI === '/') {
            return [
                'controller' => 'HomeController', 
                'action' => 'index'
            ];
        }

        $parsedURI = array_filter(explode('/', $URI)); 
        foreach ($this->routes as $route) { 
            $parsedRoute = $route['path'] === '/' ? [''] : array_filter(explode('/', $route['path']));

            if (count($parsedURI) > count($parsedRoute)) {
                continue;
            }
            
            if ($this->isRouteValid($parsedRoute, $parsedURI)) {
                return [
                    'controller' => $route['controller'], 
                    'action' => $route['action']
                ];
            }
        }

        return null;
    }

    // Проверка валидности маршрута
    private function isRouteValid(array $parsedRoute, array $parsedURI) : bool {
        foreach ($parsedRoute as $key => $part) {
            $uriPart = $parsedURI[$key] ?? null;

            if ($uriPart === $part) {
                continue;
            }

            if ($part === '{id}' && preg_match('/^\d+$/', $uriPart)) {
                continue;
            }

            return false;
        }

        return true;
    }

    private function handleNotFound() : void {
        $controller = new \App\Controllers\ErrorController();
        $controller->notFound();  // Вызов метода notFound для обработки ошибки 404
    }
}