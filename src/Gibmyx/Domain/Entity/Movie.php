<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Domain\Entity;

final class Movie
{
    private function __construct(
        private string $id,
        private string $name,
        private string $duration,
        private string $category
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

    public function changeName($newName): void
    {
        if ($this->name != $newName) {
            $this->name = $newName;
        }
    }

    public function changeDuration($newDuration): void
    {
        if ($this->duration != $newDuration) {
            $this->duration = $newDuration;
        }
    }

    public function changgeCategory($newCategory): void
    {
        if ($this->category != $newCategory) {
            $this->category = $newCategory;
        }
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
