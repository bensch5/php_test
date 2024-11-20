<?php

use Infrastructure\Container;
use Data\Repository\DetailsRepository;
use Data\Repository\OverviewRepository;
use ExternalApi\DetailsController;
use ExternalApi\OverviewController;

$container = new Container();

$container->set('overviewRepository', function() {
    return new OverviewRepository();
});

$container->set('overviewController', function($c) {
    $repository = $c->get('overviewRepository');
    
    return new OverviewController($repository);
});

$container->set('detailsRepository', function() {
    return new DetailsRepository();
});

$container->set('detailsController', function($c) {
    $repository = $c->get('detailsRepository');

    return new DetailsController($repository);
});

return $container;

?>
