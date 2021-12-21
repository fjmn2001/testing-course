<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Domain;

use DateTimeImmutable;

interface ClockRepository
{
    public function now(): DateTimeImmutable;
}
