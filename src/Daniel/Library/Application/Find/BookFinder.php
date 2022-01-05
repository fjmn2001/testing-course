<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Application\Find;

use Medine\Daniel\Library\Domain\Book;
use Medine\Daniel\Library\Domain\Contracts\BookRepository;

final class BookFinder
{
    public function __construct(private BookRepository $repository)
    {
    }

    public function __invoke(BookFinderRequest $request): Book
    {
        $book = $this->repository->find($request->id());

        if ($book === null) {
            throw new BookNotExistsException("This book doesn't exist.");
        }

        return $book;
    }
}
