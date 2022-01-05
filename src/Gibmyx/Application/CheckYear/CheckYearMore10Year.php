<?php

declare(strict_types=1);


namespace Medine\Gibmyx\Application\CheckYear;


use Medine\Gibmyx\Domain\Contract\MovieRepository;

final class CheckYearMore10Year
{

    public function __construct(
      private MovieRepository $repository
    ) {
    }

    public function __invoke(MovieRequest $request): bool
    {
        $now = $this->repository->now();
        $releaseDate = new \DateTimeImmutable($request->releaseDate());
        $diff = $now->diff($releaseDate);

        return $diff->y >= 10;
    }
}
