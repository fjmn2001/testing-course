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
    public function it_should_get_cero_alive_cells()
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
    public function it_should_turn_an_alive_cell_to_dead()
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
    public function it_should_turn_a_dead_cell_to_alive()
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
    public function it_should_turn_two_dead_cell_to_alive_and_kill_one_cell()
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