<?php

namespace Tests;

use Medine\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturnItselfNumber(): void
    {
        self::assertEquals(1, (new FizzBuzz())(1));
        self::assertEquals(2, (new FizzBuzz())(2));
    }

    /**
     * @test
     */
    public function itShouldReturnFizzIfDivisibleBy3(): void
    {
        self::assertEquals('Fizz', (new FizzBuzz())(3));
    }

    /**
     * @test
     */
    public function itShouldReturnFizzIfDivisibleBy5(): void
    {
        self::assertEquals('Buzz', (new FizzBuzz())(5));
    }

    /**
     * @test
     */
    public function itShouldReturnFizzbuzzIfDivisibleBy3And5(): void
    {
        self::assertEquals('FizzBuzz', (new FizzBuzz())(15));
    }
}
