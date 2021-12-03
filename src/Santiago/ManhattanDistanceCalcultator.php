<?php

declare(strict_types=1);

namespace Medine\Santiago;

use Closure;
use Medine\Santiago\Exceptions\DistanceErrorException;

final class ManhattanDistanceCalcultator
{
    public function __invoke(array $vector1, array $vector2): int
    {
        if (count($vector1) !== count($vector2)) {
            throw new DistanceErrorException;
        }

        $i = 0;

        return array_reduce($vector1, $this->toReduce($vector2, $i), 0);
    }

    private function toReduce(array $vector2, int $i): Closure
    {
        return static function (int $acc, int $value) use ($vector2, &$i) {
            $i++;
            return $acc + abs($value - $vector2[$i - 1]);
        };
    }
}
