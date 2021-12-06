<?php

declare(strict_types=1);

namespace Medine\Santiago\Domain;

final class Pet
{
    private function __construct(
        private string $id,
        private string $name,
        private string $age
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function age(): string
    {
        return $this->age;
    }

    public static function create(
        string $id,
        string $name,
        string $age,
    ): self
    {
        return new self(
            $id,
            $name,
            $age
        );
    }
}