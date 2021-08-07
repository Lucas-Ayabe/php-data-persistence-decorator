<?php

namespace Application\Infrastructure\Routing;

use Application\Infrastructure\Routing\Contracts\IRouteSource;

class URLPathRouteSource implements IRouteSource
{
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getRoute(): string
    {
        return $_SERVER["REQUEST_URI"];
    }
}
