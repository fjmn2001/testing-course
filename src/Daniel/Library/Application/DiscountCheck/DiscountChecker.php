<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Application\DiscountCheck;

use Medine\Daniel\Library\Domain\Contracts\Clock;

final class DiscountChecker
{
    public function __construct(private Clock $repository)
    {
    }

    public function __invoke(): bool
    {
        $time = $this->repository->now()->format('H');

        return $time > 7 && $time < 10;
    }
}