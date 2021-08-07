<?php

namespace Application\Infrastructure\Database\Query;

use Application\Infrastructure\Database\Contracts\IQuery;
use PDO;

abstract class BaseQuery implements IQuery
{
    public function __construct(
        protected string $table = ''
    ) {
    }

    public function table(string $table): static
    {
        $this->table = $table;
        return $this;
    }

    abstract function execute(PDO $connection): bool;
    abstract function toPreparedQuery(): string;
}
