<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Domain\Entity;

final class Movie
{
    private string $id;
    private string $name;
    private string $duration;
    private string $category;

    private function __construct(
        string $id,
        string $name,
        string $duration,
        string $category
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->category = $category;
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

    public static function create(
        string $id,
        string $name,
        string $duration,
        string $category
    ): self {
        return new self(
            $id,
            $name,
            $duration,
            $category
        );
    }
}
