<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Domain;

interface StudentRepository
{
    public function save(Student $student): void;

    public function find(string $id): ?Student;

    public function all(): array;
}
