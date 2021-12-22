<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Application\Finder;

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

        if (is_null($movie)) {
            throw new \Exception("Movie not exits");
        }

        return $movie;
    }
}
