<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Application\Create;

use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Medine\Gibmyx\Domain\Entity\Movie;

final class MovieCreate
{
    public function __construct(
        private MovieRepository $repository
    ) {
    }

    public function __invoke(MovieCreateRequest $request)
    {
        $movie = Movie::create(
            $request->id(),
            $request->name(),
            $request->duration(),
            $request->category()
        );

        $this->repository->save($movie);
    }
}
