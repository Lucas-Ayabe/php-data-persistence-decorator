<?php

namespace Application\Infrastructure\Database\Contracts;

use PDO;

interface IPDOSingleton
{
    public function connect(): PDO;
}
