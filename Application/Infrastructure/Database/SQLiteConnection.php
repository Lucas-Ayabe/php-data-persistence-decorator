<?php

namespace Application\Infrastructure\Database;

use Application\Infrastructure\Database\Contracts\IPDOSingleton;
use PDO;

class SQLiteConnection implements IPDOSingleton
{
    private static ?PDO $instance = null;
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function connect(): PDO
    {
        if (!self::$instance) {
            self::$instance = new PDO("sqlite:{$this->path}");
        }

        return self::$instance;
    }
}
