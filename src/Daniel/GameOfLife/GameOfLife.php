<?php

declare(strict_types=1);

namespace Medine\Daniel\GameOfLife;

final class GameOfLife
{
    const ALIVE = 1;
    const DEAD = 0;

    private array $grid = [];

    public function __invoke(array $grid): array
    {
        $this->grid = $grid;

        foreach ($grid as $rowIndex => $row) {
            $this->grid[$rowIndex] = $this->evaluateRow($row, $rowIndex);
        }

        return $this->grid;
    }

    private function evaluateRow(array $row, int $rowIndex): array
    {
        $rowSize = count($row) - 1;

        foreach ($row as $cellIndex => $cell) {
            $this->grid[$rowIndex][$cellIndex] = $this->evaluateCell($cell, $rowIndex, $cellIndex, $rowSize);
        }

        return $this->grid[$rowIndex];
    }

    private function evaluateCell(int $cell, int $rowIndex, int $cellIndex, int $rowSize): int
    {
        $neighbours = $this->neighbours($rowIndex, $cellIndex, $rowSize);
        $aliveNeighbours = array_filter($neighbours, function ($neighbour) {
            return $neighbour === self::ALIVE;
        });

        if ($cell === self::DEAD) {
            return count($aliveNeighbours) === 3
                ? self::ALIVE
                : self::DEAD;
        }

        return count($aliveNeighbours) === 2 || count($aliveNeighbours) === 3
            ? self::ALIVE
            : self::DEAD;
    }

    private function neighbours(int $rowIndex, int $cellIndex, int $rowSize): array
    {
        return [
            $this->topLeft($rowIndex, $cellIndex),
            $this->topCenter($rowIndex, $cellIndex),
            $this->topRight($rowIndex, $cellIndex, $rowSize),
            $this->centerLeft($rowIndex, $cellIndex),
            $this->centerRight($rowIndex, $cellIndex, $rowSize),
            $this->bottomLeft($rowIndex, $cellIndex),
            $this->bottomCenter($rowIndex, $cellIndex),
            $this->bottomRight($rowIndex, $cellIndex, $rowSize),
        ];
    }

    private function topLeft(int $rowIndex, int $cellIndex): ?int
    {
        if ($rowIndex === 0 || $cellIndex === 0)
            return null;

        return $this->grid[$rowIndex-1][$cellIndex-1];
    }

    private function topCenter(int $rowIndex, int $cellIndex): ?int
    {
        if ($rowIndex === 0)
            return null;

        return $this->grid[$rowIndex-1][$cellIndex];
    }

    private function topRight(int $rowIndex, int $cellIndex, int $rowSize): ?int
    {
        if ($rowIndex === 0 || $cellIndex === $rowSize)
            return null;

        return $this->grid[$rowIndex-1][$cellIndex+1];
    }

    private function centerLeft(int $rowIndex, int $cellIndex): ?int
    {
        if ($cellIndex === 0)
            return null;

        return $this->grid[$rowIndex][$cellIndex-1];
    }

    private function centerRight(int $rowIndex, int $cellIndex, int $rowSize): ?int
    {
        if ($cellIndex === $rowSize)
            return null;

        return $this->grid[$rowIndex][$cellIndex+1];
    }

    private function bottomLeft(int $rowIndex, int $cellIndex): ?int
    {
        if ($rowIndex === count($this->grid) - 1 || $cellIndex === 0)
            return null;

        return $this->grid[$rowIndex+1][$cellIndex-1];
    }

    private function bottomCenter(int $rowIndex, int $cellIndex): ?int
    {
        if ($rowIndex === count($this->grid) - 1)
            return null;

        return $this->grid[$rowIndex+1][$cellIndex];
    }

    private function bottomRight(int $rowIndex, int $cellIndex, int $rowSize): ?int
    {
        if ($rowIndex === count($this->grid) - 1 || $cellIndex === $rowSize)
            return null;

        return $this->grid[$rowIndex+1][$cellIndex+1];
    }
}