<?php

namespace App\Router;

class Router{
    private $routes = [];

    /**
     * Add Route into the router interval array
     *
     * @param string $name
     * @param string $url
     * @param string $httpMethod
     * @param string $controller Controller class
     * @param string $method
     */
    public function addRoute(
        string $name,
        string $url,
        string $httpMethod,
        string $controller,
        string $method
    )
    {
        $this->routes[] = [
            'name' => $name,
            'url' => $url,
            'http_method' => $httpMethod,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * Check if route exist
     *
     * @param string $uri
     * @param string $httpMethod
     * @return bool
     */
    public function hasRoute(string $uri , string $httpMethod): bool
    {
        foreach ($this->routes as $route){
            if($route['url'] === $uri && $route['http_method'] === $httpMethod){
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $uri
     * @param string $httpMethod
     */
    public function execute(string $uri , string $httpMethod)
    {
        if (!$this->hasRoute($uri , $httpMethod)) {
            // Return 404
        }

        $controller = new $route['controller'];
        $method = $route['method'];
        $controller->$method();
    }
}