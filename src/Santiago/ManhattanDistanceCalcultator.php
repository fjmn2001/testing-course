<?php

declare(strict_types=1);

namespace Medine\Santiago;

use Closure;
use Medine\Santiago\Exceptions\DistanceErrorException;

final class ManhattanDistanceCalcultator
{
    private int $i = 0;

    public function __invoke(array $vector1, array $vector2): int
    {
        if (count($vector1) !== count($vector2)) {
            throw new DistanceErrorException;
        }

        return array_reduce($vector1, $this->toReduce($vector2), 0);
    }

    private function toReduce(array $vector2): Closure
    {
        return function (int $acc, int $value) use ($vector2) {
            $this->i++;

            return $acc + abs($value - $vector2[$this->i - 1]);
        };
    }
}
