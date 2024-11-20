<?php

require_once __DIR__.'/../vendor/autoload.php';

use Infrastructure\Request;
use Infrastructure\Response;
use Infrastructure\Routing\ResourceNotFoundException;

$container = include __DIR__.'/../src/container_config.php';
$router = include __DIR__.'/../src/router_config.php';

$request = Request::createFromGlobals();

try {
    $method = $request->getMethod();
    $path = $request->getPathInfo();

    $route = $router->route($method, $path);
    $controller = $container->get($route['controller']);
    $function = $route['function'];
    
    $response = call_user_func([$controller, $function], $request);
} catch (ResourceNotFoundException $e) {
    $response = new Response('Requested resource doesn\'t exist.', 404);
} catch (\mysqli_sql_exception $e) {
    $response = new Response('Database connection failed.', 503);
} catch (\Exception | \Error $e) {
    $response = new Response(sprintf('Something went wrong. %s', $e->getMessage()), 500);
}

$response->send();
