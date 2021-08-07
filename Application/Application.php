<?php

namespace Application;

use Application\Infrastructure\Routing\Router;

class Application
{
    public function __construct(private Router $router)
    {
    }

    public function registerRoutes(array $routeRegisters): self
    {
        foreach ($routeRegisters as $register) {
            $register($this->router);
        }

        return $this;
    }

    public function start(): void
    {
        $this->router->dispatch();
    }
}
