<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Application\Update;

use Medine\Daniel\Library\Application\Find\BookNotExistsException;
use Medine\Daniel\Library\Domain\Contracts\BookRepository;

final class BookUpdater
{
    public function __construct(
        private BookRepository $repository
    ) {
    }

    public function __invoke(BookUpdaterRequest $request)
    {
        $book = $this->repository->find($request->id());

        if ($book === null) {
            throw new BookNotExistsException("This book doesn't exist.");
        }

        $book->changeName($request->name());
        $book->changeAuthor($request->author());
        $book->changeYear($request->year());

        $this->repository->update($book);
    }
}
