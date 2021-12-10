<?php

declare(strict_types=1);

namespace Tests\ChanchitoFeliz\Domain;

use Medine\ChanchitoFeliz\Domain\Student;

final class StudentMother
{
    public static function random(): Student
    {
        return new Student(
            (string)mt_rand(),
            (string)mt_rand(),
        );
    }
}
