<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Domain;

use Medine\Daniel\Library\Application\BookCreatorRequest;
use Medine\Daniel\Library\Domain\Book;

final class BookMother
{
    public static function create(
        string $id,
        string $name,
        string $author,
        int $year
    ): Book
    {
        return new Book(
            $id,
            $name,
            $author,
            $year
        );
    }

    public static function fromRequest(BookCreatorRequest $request): Book
    {
        return new Book(
            $request->id(),
            $request->name(),
            $request->author(),
            $request->year(),
        );
    }
}