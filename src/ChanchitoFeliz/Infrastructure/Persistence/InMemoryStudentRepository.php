<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Infrastructure\Persistence;

use Medine\ChanchitoFeliz\Domain\Student;
use Medine\ChanchitoFeliz\Domain\StudentRepository;

final class InMemoryStudentRepository implements StudentRepository
{
    private array $students = [];

    public function save(Student $student): void
    {
        $this->students[$student->id()] = $student;
    }

    public function find(string $id): ?Student
    {
        return $this->students[$id] ?? null;
    }

    public function all(): array
    {
        return $this->students;
    }
}
