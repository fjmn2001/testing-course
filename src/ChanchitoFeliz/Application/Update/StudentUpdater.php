<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Application\Update;

use http\Exception\RuntimeException;
use Medine\ChanchitoFeliz\Domain\StudentRepository;

final class StudentUpdater
{
    public function __construct(
        private StudentRepository $repository
    ) {
    }

    public function __invoke(StudentUpdaterRequest $request): void
    {
        $student = $this->repository->find($request->id());

        if (null === $student) {
            throw new RuntimeException("Student does not exists.");
        }

        $student->changeName($request->name());
        $this->repository->save($student);
    }
}
