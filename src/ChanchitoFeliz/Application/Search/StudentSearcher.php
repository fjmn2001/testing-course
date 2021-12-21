<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Application\Search;

use Medine\ChanchitoFeliz\Domain\StudentRepository;

final class StudentSearcher
{
    public function __construct(
        private StudentRepository $repository
    ) {
    }

    public function __invoke(): array
    {
        return $this->repository->all();
    }
}
