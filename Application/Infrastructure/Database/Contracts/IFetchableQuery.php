<?php

namespace Application\Infrastructure\Database\Contracts;

use PDO;

interface IFetchableQuery extends IQuery
{
    public function fetchAll(PDO $connection): array;
}
