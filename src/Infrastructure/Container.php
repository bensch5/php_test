<?php

namespace Infrastructure;

class Container
{
    private $bindings;

    public function __construct() {
        $this->bindings = [];
    }

    public function set(string $id, callable $factory): void
    {
        $this->bindings[$id] = $factory;
    }

    public function get(string $id)
    {
        if (!isset($this->bindings[$id])) {
            throw new \Exception(sprintf('Binding %s is not set!', $id));
        }

        $factory = $this->bindings[$id];

        return $factory($this);
    }
}
