<?php

declare(strict_types=1);


namespace Medine\Gibmyx\Application\Finder;

final class MovieFinderRequest
{
    public function __construct(
        private string $id
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }
}
