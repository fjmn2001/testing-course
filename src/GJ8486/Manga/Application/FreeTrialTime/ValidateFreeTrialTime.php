<?php

namespace Medine\GJ8486\Manga\Application\FreeTrialTime;

use Medine\GJ8486\Manga\Domain\Clock\Clock;

class ValidateFreeTrialTime
{
    public function __construct( private Clock $repository)
    {}

    public function __invoke(): bool
    {
        $currentDate = $this->repository->currentDate();
        $limitDate = $this->repository->limitDate();

        return $currentDate <= $limitDate;
    }

}