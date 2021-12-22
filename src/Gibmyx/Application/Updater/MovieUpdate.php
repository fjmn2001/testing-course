<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Application\Updater;

use Medine\Gibmyx\Domain\Contract\MovieRepository;

final class MovieUpdate
{
    public function __construct(
        private MovieRepository $repository
    ) {
    }

    public function __invoke(MovieUpdateRequest $request): void
    {
        $movie = $this->repository->find($request->id());

        if (is_null($movie)) {
            throw new \Exception("Movie not exits");
        }

        $movie->nameChange($request->name());
        $movie->durationChange($request->duration());
        $movie->categoryChange($request->category());

        $this->repository->update($movie);
    }
}
