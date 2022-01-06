<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Domain\Entity;

final class Movie
{
    private function __construct(
        private string $id,
        private string $name,
        private string $duration,
        private string $category,
        private string $releaseDate
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

    public function releaseDate(): string
    {
        return $this->releaseDate;
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

    public function changeCategory($newCategory): void
    {
        if ($this->category != $newCategory) {
            $this->category = $newCategory;
        }
    }

    public function changeReleaseDate($newReleaseDate): void
    {
        if ($this->releaseDate != $newReleaseDate) {
            $this->releaseDate = $newReleaseDate;
        }
    }

    public static function create(
        string $id,
        string $name,
        string $duration,
        string $category,
        string $releaseDate
    ): self {
        return new self(
            $id,
            $name,
            $duration,
            $category,
            $releaseDate
        );
    }
}
