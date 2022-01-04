<?php

declare(strict_types=1);

namespace Medine\Daniel\Library\Application\Find;

final class BookFinderRequest
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
