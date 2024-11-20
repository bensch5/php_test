<?php

namespace Infrastructure\Routing;

class Router
{
    private static Router $router;

    private function __construct(private array $routes = []) {}

    public static function getRouter(): Router
    {
        return self::$router ?? new Router();
    }

    public function get(string $path, string $controller): void
    {
        $this->register($path, $controller, 'GET');
    }

    public function post(string $path, string $controller): void
    {
        $this->register($path, $controller, 'POST');
    }

    private function register(string $path, string $controller, string $method): void
    {
        if (!isset($this->routes[$method])) $this->routes[$method] = [];

        $this->routes[$method][$path] = $controller;
    }

    public function route(string $method, string $path): string
    {
        return $this->routes[$method][$path] ?? throw new ResourceNotFoundException();
    }
}