<?php

declare(strict_types=1);

namespace Medine;

final class FizzBuzz
{
    public function __invoke(int $number): int|string
    {
        if ($number % 3 === 0 && $number % 5 === 0) {
            return 'FizzBuzz';
        }

        if ($number % 3 === 0) {
            return 'Fizz';
        }

        if ($number % 5 === 0) {
            return 'Buzz';
        }

        return $number;
    }
}
