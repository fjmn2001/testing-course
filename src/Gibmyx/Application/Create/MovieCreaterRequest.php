<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Application\Create;

final class MovieCreaterRequest
{
    public function __construct(
        private string $id,
        private string $name,
        private string $duration,
        private string $category,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }

    public function category(): string
    {
        return $this->category;
    }
}
