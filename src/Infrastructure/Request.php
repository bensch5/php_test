<?php

namespace Infrastructure;

class Request
{
    protected string $pathInfo;
    protected string $method;
    protected array $parameters;
    
    public function __construct(array $server, array $query = []) {
        $this->pathInfo = $server['PATH_INFO'] ?? '/';
        $this->method = $server['REQUEST_METHOD'];
        $this->parameters = $query;
    }
    
    public static function createFromGlobals(): Request
    {
        return new Request($_SERVER, $_GET);
    }

    public function getPathInfo(): string
    {
        return $this->pathInfo;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}