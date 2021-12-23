<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Domain;

final class Book
{
    public function __construct(
        private string $id,
        private string $name,
        private string $author,
        private int $year
    ) {
    }

    public static function create(string $id, string $name, string $author, int $year): self
    {
        return new self(
            $id,
            $name,
            $author,
            $year
        );
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

    public function changeName(string $name): void
    {
        $this->name = $name;
    }

    public function changeAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function changeYear(int $year): void
    {
        $this->year = $year;
    }
}
