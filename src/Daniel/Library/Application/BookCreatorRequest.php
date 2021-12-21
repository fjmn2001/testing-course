<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Application;

final class BookCreatorRequest
{
    public function __construct(
        private string $id,
        private string $name,
        private string $author,
        private int $year
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function author(): string
    {
        return $this->author;
    }

    public function year(): int
    {
        return $this->year;
    }
}