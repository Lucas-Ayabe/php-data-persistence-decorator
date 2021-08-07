<?php

namespace Application\Infrastructure\Database\Contracts;

use PDO;

interface IQuery
{
    public function toPreparedQuery(): string;
    public function execute(PDO $connection): bool;
}
