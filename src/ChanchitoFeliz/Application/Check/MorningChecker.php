<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Application\Check;

use Medine\ChanchitoFeliz\Domain\ClockRepository;

final class MorningChecker
{
    public function __construct(
        private ClockRepository $repository
    ) {
    }

    public function __invoke(): bool
    {
        $hour = (int)$this->repository->now()->format('H');

        return $hour > 8 && $hour < 12;
    }
}
