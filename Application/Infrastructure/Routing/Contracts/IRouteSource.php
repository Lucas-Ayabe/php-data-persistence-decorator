<?php

namespace Application\Infrastructure\Routing\Contracts;

interface IRouteSource
{
    public function getRoute(): string;
    public function getMethod(): string;
}
