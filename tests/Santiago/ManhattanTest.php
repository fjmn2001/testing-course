<?php

namespace Tests\Santiago;

use Medine\Santiago\Exceptions\DistanceErrorException;
use Medine\Santiago\ManhattanDistanceCalcultator;
use PHPUnit\Framework\TestCase;

class ManhattanTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturn16(): void
    {
        $result = (new ManhattanDistanceCalcultator)([3, 4, 2, 1], [0, 5, 6, 9]);

        self::assertEquals(16, $result);
    }

    /**
     * @test
     */
    public function itShouldReturn3(): void
    {
        $result = (new ManhattanDistanceCalcultator)([-2, 4], [0, 5]);

        self::assertEquals(3, $result);
    }

    /**
     * @test
     */
    public function itShouldReturnAnException(): void
    {
        $this->expectException(DistanceErrorException::class);

        (new ManhattanDistanceCalcultator)([-2, 4, 3], [0, 5]);
    }
}
