<?php

namespace Medine\GJ8486\Manga\Domain\Clock;

use DateTimeImmutable;

interface Clock
{
    public function currentDate(): DateTimeImmutable;
    public function limitDate(): DateTimeImmutable;

}