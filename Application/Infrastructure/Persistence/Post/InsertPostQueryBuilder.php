<?php

namespace Application\Infrastructure\Persistence\Post;

use Application\Domain\Entities\Contracts\IPostTemplate;
use Application\Infrastructure\Database\Query\InsertQuery;

class InsertPostQueryBuilder implements IPostTemplate
{
    private const TABLE = 'posts';

    public function __construct(
        private int $id = 0,
        private string $title = '',
        private string $content = ''
    ) {
    }

    public function withId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function withTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function withContent(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function build(): InsertQuery
    {
        return new InsertQuery([
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content
        ], self::TABLE);
    }

    public function toString(): string
    {
        return $this->build()->toPreparedQuery();
    }
}
