<?php

declare(strict_types=1);

namespace Tests\Daniel\GameOfLife;

use Medine\Daniel\GameOfLife\GameOfLife;
use PHPUnit\Framework\TestCase;

final class GameOfLifeTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldGetZeroAliveCells(): void
    {
        $grid =
            [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ];

        $expected =
            [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ];

        $actual = (new GameOfLife())->__invoke($grid);

        $this->assertEquals($actual, $expected);
    }

    /**
     * @test
     */
    public function itShouldTurnAnAliveCellToDead(): void
    {
        $grid =
            [
                [0, 0, 0],
                [0, 1, 0],
                [0, 0, 0],
            ];

        $expected =
            [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ];

        $actual = (new GameOfLife())->__invoke($grid);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function itShouldTurnADeadCellToAlive(): void
    {
        $grid =
            [
                [0, 0, 1],
                [0, 1, 1],
                [0, 0, 0],
            ];

        $expected =
            [
                [0, 1, 1],
                [0, 1, 1],
                [0, 0, 0],
            ];

        $actual = (new GameOfLife())->__invoke($grid);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function itShouldTurnTwoDeadCellToAliveAndKillOneCell(): void
    {
        $grid =
            [
                [0, 0, 1],
                [0, 1, 1],
                [0, 1, 0],
            ];

        $expected =
            [
                [0, 1, 1],
                [1, 0, 1],
                [0, 1, 0],
            ];

        $actual = (new GameOfLife())->__invoke($grid);

        $this->assertEquals($expected, $actual);
    }
}
