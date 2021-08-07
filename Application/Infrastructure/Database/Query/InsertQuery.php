<?php

namespace Application\Infrastructure\Database\Query;

use PDO;

class InsertQuery extends BaseQuery
{
    private array $columns = [];
    private array $values = [];

    /**
     * @param array $fields the $fields array format MUST BE:
     *                      ```["column_name" => "value"]```
     */
    public function __construct(array $fields, ?string $table = '')
    {
        $this->columns = array_keys($fields);
        $this->values = array_values($fields);

        parent::__construct($table);
    }

    public function toPreparedQuery(): string
    {
        $fields = join(', ', $this->columns);
        $placeholders = join(", ", array_map(fn () => "?", $this->columns));

        return "INSERT INTO {$this->table} ($fields) VALUES ($placeholders)";
    }

    public function execute(PDO $connection): bool
    {
        return $connection
            ->prepare($this->toPreparedQuery())
            ->execute($this->values);
    }
}
