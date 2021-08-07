<?php

namespace Application\Domain\Entities\Contracts;

use Application\Presentation\Contracts\ITemplate;

interface IPostTemplate extends ITemplate
{
    public function withId(int $id): static;
    public function withTitle(string $title): static;
    public function withContent(string $content): static;
}
