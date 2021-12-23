<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application\Update;

use Medine\Daniel\Library\Application\Update\BookUpdaterRequest;
use Medine\Daniel\Library\Domain\Book;

final class BookUpdaterRequestMother
{
    public static function create(
        string $id,
        string $name,
        string $author,
        int $year
    ): BookUpdaterRequest
    {
        return new BookUpdaterRequest(
            $id,
            $name,
            $author,
            $year
        );
    }

    public static function fromEntity(Book $book): BookUpdaterRequest
    {
        return self::create(
            $book->id(),
            'random-name',
            'random-author',
            2021
        );
    }

    public static function random(): BookUpdaterRequest
    {
        return self::create(
            'random-id',
            'random-name',
            'random-author',
            2021
        );
    }
}