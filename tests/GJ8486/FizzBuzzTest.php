<?php

namespace Tests\GJ8486;

use Medine\GJ8486\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{


    /** @test */
    public function shouldReturnItself(): void
    {
        $fizzBuzz = new FizzBuzz;
        self::assertEquals(($fizzBuzz)(1), 1);
        self::assertEquals(($fizzBuzz)(2), 2);
    }

    /** @test */
    public function returnFizzIfDivisibleBy3()
    {
        $fizzBuzz = new FizzBuzz;
        self::assertEquals(($fizzBuzz)(3), 'Fizz');
    }


    /** @test */
    public function returnBuzzIfDivisibleBy5()
    {
        $fizzBuzz = new FizzBuzz;
        self::assertEquals(($fizzBuzz)(5), 'Buzz');
    }

    /** @test */
    public function returnFizzBuzzIfDivisibleBy3And5()
    {
        $fizzBuzz = new FizzBuzz;
        self::assertEquals(($fizzBuzz)(15), 'FizzBuzz');
    }
}
