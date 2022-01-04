<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application\Find;

use Medine\Daniel\Library\Application\Find\BookFinderRequest;
use Medine\Daniel\Library\Domain\Book;

final class BookFinderRequestMother
{
    public static function create(string $id): BookFinderRequest
    {
        return new BookFinderRequest($id);
    }

    public static function fromEntity(Book $book): BookFinderRequest
    {
        return self::create($book->id());
    }

    public static function random(): BookFinderRequest
    {
        return self::create('random');
    }
}
