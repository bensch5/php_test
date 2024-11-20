<?php

use Infrastructure\Routing\Router;

$router = Router::getRouter();

$router->get('/overview', 'overviewController');
$router->get('/details', 'detailsController');

return $router;
