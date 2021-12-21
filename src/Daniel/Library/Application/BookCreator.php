<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Application;

use Medine\Daniel\Library\Domain\Book;
use Medine\Daniel\Library\Domain\Contracts\BookRepository;

final class BookCreator
{
    public function __construct(private BookRepository $repository)
    {
    }

    public function __invoke(BookCreatorRequest $request): void
    {
        $book = Book::create(
            $request->id(),
            $request->name(),
            $request->author(),
            $request->year(),
        );

        $this->repository->save($book);
    }
}