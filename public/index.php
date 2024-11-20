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
    $controller = $container->get($router->route($method, $path));
    
    $response = $controller->handle($request);
} catch(ResourceNotFoundException $e) {
    $response = new Response("Requested resource doesn't exist.", 404);
} catch(\Exception $e) {
    $response = new Response(sprintf('Something went wrong. %s', $e->getMessage()), 500);
}

$response->send();
