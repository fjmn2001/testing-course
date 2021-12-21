<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Application\Create;

use Medine\ChanchitoFeliz\Domain\Student;
use Medine\ChanchitoFeliz\Domain\StudentRepository;

final class StudentCreator
{
    public function __construct(
        private StudentRepository $repository
    )
    {
    }

    public function __invoke(StudentCreatorRequest $request)
    {
        $student = Student::create(
            $request->id(),
            $request->name()
        );

        $this->repository->save($student);
    }
}
