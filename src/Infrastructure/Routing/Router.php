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

    public function get(string $path, string $action): void
    {
        $this->register($path, $action, 'GET');
    }

    public function post(string $path, string $action): void
    {
        $this->register($path, $action, 'POST');
    }

    private function register(string $path, string $action, string $method): void
    {
        if (!isset($this->routes[$method])) $this->routes[$method] = [];

        list($controller, $function) = $this->splitAction($action);

        $this->routes[$method][$path] = [
            'controller' => $controller,
            'function' => $function
        ];
    }

    private function splitAction(string $action, string $separator = '->'): array
    {
        $sep_i = strpos($action, $separator);

        $controller = substr($action, 0, $sep_i);
        $function = substr($action, $sep_i + strlen($separator), strlen($action));

        return [$controller, $function];
    }

    public function route(string $method, string $path): array
    {
        return $this->routes[$method][$path] ?? throw new ResourceNotFoundException();
    }
}