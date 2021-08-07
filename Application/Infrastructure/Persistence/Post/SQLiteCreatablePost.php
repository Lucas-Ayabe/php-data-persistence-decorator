<?php

namespace Application\Infrastructure\Persistence\Post;

use Application\Domain\Entities\Post;
use Application\Infrastructure\Database\SQLiteConnection;
use PDO;

class SQLiteCreatablePost
{
    private PDO $connection;

    public function __construct(
        SQLiteConnection $sqlite,
        private Post $post
    ) {
        $this->connection = $sqlite->connect();
    }

    public function create(): Post
    {
        $query = new InsertPostQueryBuilder();
        $this->post->toString($query);
        $query->build()->execute($this->connection);

        return $this->post;
    }
}
