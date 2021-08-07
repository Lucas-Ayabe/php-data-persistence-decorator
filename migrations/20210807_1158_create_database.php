<?php

use Application\Infrastructure\Database\SQLiteConnection;

require_once __DIR__ . "/../vendor/autoload.php";

$databasePath = __DIR__ . "/../storage/blog.db";
$sqlite = new SQLiteConnection($databasePath);
$connection = $sqlite->connect();

$commands = [
    <<<POSTS
        CREATE TABLE IF NOT EXISTS posts (
            id INTEGER PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT
        )
    POSTS,
];

foreach ($commands as $command) {
    $connection->exec($command);
}

$listTablesQuery = <<<SQL
    SELECT name FROM sqlite_master WHERE type = 'table' ORDER BY name
SQL;

$statement = $connection->query($listTablesQuery);
foreach ($statement->fetchAll(\PDO::FETCH_NUM) as [$name]) {
    echo $name . "\n";
}
