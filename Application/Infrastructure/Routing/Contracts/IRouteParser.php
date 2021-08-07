<?php

namespace Application\Infrastructure\Routing\Contracts;

interface IRouteParser
{
    public function parse(string $route): string;
}
