<?php

declare(strict_types=1);

namespace Medine\Santiago;

use Medine\Santiago\Exceptions\DistanceErrorException;

final class ManhattanDistanceCalcultator
{
    public function __invoke(array $vector1, array $vector2): int
    {
        $counter = count($vector1);
        $counter2 = count($vector2);

        if ($counter !== $counter2) {
            throw new DistanceErrorException;
        }

        $addition = 0;

        for ($i = 0; $i < $counter; $i++) {
            $addition += abs($vector1[$i] - $vector2[$i]);
        }

        return $addition;
    }
}
