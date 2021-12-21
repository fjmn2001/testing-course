<?php

declare(strict_types=1);

namespace Medine\ChanchitoFeliz\Application\Find;

final class StudentFinderRequest
{
    public function __construct(
        private string $id
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}
