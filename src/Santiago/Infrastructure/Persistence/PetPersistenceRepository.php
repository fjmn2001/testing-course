<?php

declare(strict_types=1);

namespace Medine\Santiago\Infrastructure\Persistence;

use Medine\Santiago\Domain\Pet;
use Medine\Santiago\Domain\PetRepository;

final class PetPersistenceRepository implements PetRepository
{
    private $DB = [];

    public function save(Pet $pet): void
    {
        array_push($this->DB, [
            'id' => $pet->id(),
            'name' => $pet->name(),
            'age' => $pet->age()
        ]);
    }

    public function find(string $id): ?Pet
    {
        $indice = array_search($id, array_column($this->DB, 'id'), true);

        return $indice == false
            ? null
            : Pet::create(
                $this->DB[$indice]['id'],
                $this->DB[$indice]['name'],
                $this->DB[$indice]['age']
            );
    }

    public function getDb(): array
    {
        return $this->DB;
    }
}
