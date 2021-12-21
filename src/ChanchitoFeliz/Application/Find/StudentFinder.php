<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Application\Find;

use Medine\ChanchitoFeliz\Domain\StudentRepository;
use RuntimeException;

final class StudentFinder
{
    public function __construct(
        private StudentRepository $repository
    )
    {
    }

    public function __invoke(StudentFinderRequest $request): StudentFinderResponse
    {
        $student = $this->repository->find($request->id());

        if (null === $student) {
            throw new RuntimeException("Student does not exists.");
        }

        return new StudentFinderResponse(
            $student->id(),
            $student->name()
        );
    }
}
