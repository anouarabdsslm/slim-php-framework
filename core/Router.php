<?php

namespace App\Core;

use Exception;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static();

        require $file;

        return $router;
    }

    public function get($endPoint, $handler)
    {
        $this->routes['GET'][trim($endPoint, '/')] = $handler;
    }

    public function post($endPoint, $handler)
    {
        $this->routes['POST'][trim($endPoint, '/')] = $handler;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception("Route does not exists!");
    }
    public function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller();

        if (!method_exists($controller, $action)) {
            throw new Exception("$controller does not have nay action called: $action");
        }

        return $controller->$action();
    }
}
