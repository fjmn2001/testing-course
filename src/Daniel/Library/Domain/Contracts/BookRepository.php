<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Domain\Contracts;

use Medine\Daniel\Library\Domain\Book;

interface BookRepository
{
    public function save(Book $book): void;

    public function find(string $id): ?Book;
}
