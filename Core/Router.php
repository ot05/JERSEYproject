<?php

class Router
{
    public $routes = [];

    public function addRoute($method, $url, $controller, $function)
    {
        $this->routes[] = [
            "method" => $method,
            "url" => $url,
            "controller" => $controller,
            "function" => $function
        ];
    }


    public function matchRoute($uri)
    {
        foreach ($this->routes as $route) {
            $controller = $route['controller'];
            $function = $route['function'];

            if (class_exists($controller) && $uri == $route['url'] && $_SERVER['REQUEST_METHOD'] == $route['method']) {
                $controllerInstance = new $controller;

                if (method_exists($controller, $function)) {
                    $controllerInstance->$function();
                    exit();
                }
            }
        }
        (new HomeController)->notfound();
    }
}
