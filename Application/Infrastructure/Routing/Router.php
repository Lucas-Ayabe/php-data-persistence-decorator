<?php

namespace Application\Infrastructure\Routing;

use Application\Infrastructure\Routing\Contracts\IRouteParser;
use Application\Infrastructure\Routing\Contracts\IRouteSource;

class Router
{
    private array $routes = [];

    public function __construct(
        private IRouteSource $source,
        private IRouteParser $parser
    ) {
    }

    public function dispatch(): void
    {
        $route = $this->parser->parse($this->source->getRoute());
        $this->routes[$this->source->getMethod()][$route]();
    }

    public function registerRoute(
        string $method,
        string $route,
        callable $handler
    ): self {
        $this->routes[$method][$route] = $handler;
        return $this;
    }

    public function get(string $route, callable $handler): self
    {
        return $this->registerRoute("GET", $route, $handler);
    }

    public function post(string $route, callable $handler): self
    {
        return $this->registerRoute("POST", $route, $handler);
    }

    public function put(string $route, callable $handler): self
    {
        return $this->registerRoute("PUT", $route, $handler);
    }

    public function delete(string $route, callable $handler): self
    {
        return $this->registerRoute("DELETE", $route, $handler);
    }
}
