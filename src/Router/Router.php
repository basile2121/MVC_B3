<?php

namespace App\Router;

use Doctrine\DBAL\Exception;

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
     * @return array
     * @throws \Exception
     */
    public function getRoute(string $uri , string $httpMethod): array
    {
        foreach ($this->routes as $route){
            if($route['url'] === $uri && $route['http_method'] === $httpMethod){
                return $route;
            }
        }
        throw new \Exception("Erreur 404");
    }

    /**
     * @param string $uri
     * @param string $httpMethod
     * @throws \Exception
     */
    public function execute(string $uri , string $httpMethod)
    {
        $route = $this->getRoute($uri , $httpMethod);
        $controller = new $route['controller'];
        $method = $route['method'];
        $controller->$method();
    }
}