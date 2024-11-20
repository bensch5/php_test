<?php

use Infrastructure\Container;
use Data\Repository\InsuranceRepository;
use ExternalApi\InsuranceController;

$container = new Container();

$container->set('database', function() {
    $hostname = 'localhost';
    $username = 'user';
    $password = 'password';
    $database = 'database';

    return mysqli_connect($hostname, $username, $password, $database);
});

$container->set('insuranceRepository', function($c) {
    $database = $c->get('database');
    
    return new InsuranceRepository($database);
});

$container->set('insuranceController', function($c) {
    $repository = $c->get('insuranceRepository');
    
    return new InsuranceController($repository);
});

return $container;

?>
