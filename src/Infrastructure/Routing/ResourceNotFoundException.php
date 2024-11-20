<?php

namespace Infrastructure\Routing;

class ResourceNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Requested resource doesn't exist.");
    }
}