<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Domain\Contracts;

interface Clock
{
    public function now(): \DateTimeImmutable;
}