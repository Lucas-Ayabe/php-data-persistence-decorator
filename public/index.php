<?php

use Application\Infrastructure\Routing\Router;
use Application\Infrastructure\Routing\URLPathRouteParser;
use Application\Infrastructure\Routing\URLPathRouteSource;

use function Application\routes\routes;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new \Application\Application(
    new Router(
        new URLPathRouteSource(),
        new URLPathRouteParser()
    )
);

$app->registerRoutes([routes()])->start();
