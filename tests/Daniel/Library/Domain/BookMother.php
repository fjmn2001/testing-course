<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Domain;

use Medine\Daniel\Library\Application\Create\BookCreatorRequest;
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
        return self::create(
            $request->id(),
            $request->name(),
            $request->author(),
            $request->year(),
        );
    }

    public static function random(): Book
    {
        return self::create(
            'db4799af-3712-4235-853c-967a451bd7b9',
            'El principito',
            'Antoine de Saint-Exupéry',
            1943
        );
    }
}