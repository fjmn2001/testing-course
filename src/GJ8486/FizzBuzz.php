<?php

namespace Medine\GJ8486;

class FizzBuzz
{
    public function __invoke(int $number)
    {
        $respons = $number;

        if (!($number % 3)) $respons = 'Fizz';
        if (!($number % 5)) $respons = 'Buzz';
        if (!($number % 3) && !($number % 5)) $respons = 'FizzBuzz';

        return $respons;
    }
}