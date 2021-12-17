<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Application;

use Medine\Gibmyx\Domain\Contract\MovieRepository;

final class MovieFinder
{
    public function __construct(
        private MovieRepository $repository
    ) {
    }

    public function __invoke(MovieFinderRequest $request)
    {
        $movie = $this->repository->find($request->id());

        return $movie;
    }
}
