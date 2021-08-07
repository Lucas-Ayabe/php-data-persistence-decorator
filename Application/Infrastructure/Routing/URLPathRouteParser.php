<?php

namespace Application\Infrastructure\Routing;

use Application\Infrastructure\Routing\Contracts\IRouteParser;

class URLPathRouteParser implements IRouteParser
{
    public function parse(string $route): string
    {
        return filter_var($route, FILTER_SANITIZE_URL);
    }
}
