<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Application\Updater;

use Medine\Gibmyx\Domain\Contract\MovieRepository;

final class MovieUpdater
{
    public function __construct(
        private MovieRepository $repository
    ) {
    }

    public function __invoke(MovieUpdaterRequest $request): void
    {
        $movie = $this->repository->find($request->id());

        if (is_null($movie)) {
            throw new \Exception("Movie not exits");
        }

        $movie->changeName($request->name());
        $movie->changeDuration($request->duration());
        $movie->changeCategory($request->category());

        $this->repository->update($movie);
    }
}
