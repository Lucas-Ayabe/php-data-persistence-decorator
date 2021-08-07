<?php

namespace Application\routes;

use Application\Infrastructure\Routing\Router;

function routes(): callable
{
    return function (Router $router): void {
        $router
            ->get("/", function () {
                echo "Listar Posts";
            })
            ->post('/', function () {
                echo "Criar Post";
            });
    };
}
