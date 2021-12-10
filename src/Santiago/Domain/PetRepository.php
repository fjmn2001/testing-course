<?php

declare(strict_types=1);

namespace Medine\Santiago\Domain;

interface PetRepository
{
    public function save(Pet $pet);

    public function find(string $id): ?Pet;
}
