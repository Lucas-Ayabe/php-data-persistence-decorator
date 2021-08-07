<?php

namespace Application\Domain\Entities;

use Application\Domain\Entities\Contracts\IPostTemplate;

class Post
{
    public function __construct(
        protected int $id,
        protected string $title,
        protected string $content,
    ) {
    }

    public function toString(IPostTemplate $template): string
    {
        return $template
            ->withId($this->id)
            ->withTitle($this->title)
            ->withContent($this->content)
            ->toString();
    }
}
