<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Infrastructure;

use Medine\Daniel\Library\Domain\Book;
use Medine\Daniel\Library\Domain\Contracts\BookRepository;

final class InMemoryBookRepository implements BookRepository
{
    private array $books;

    public function save(Book $book): void
    {
        $this->books[] = $book;
    }

    public function find(string $id): ?Book
    {
        $book = array_filter($this->books, fn (Book $book) => $book->id() === $id);

        return $book[0];
    }
}