<?php

use Infrastructure\Routing\Router;

$router = Router::getRouter();

$router->get('/overview', 'insuranceController->getOverview');
$router->get('/details', 'insuranceController->getDetails');

return $router;
