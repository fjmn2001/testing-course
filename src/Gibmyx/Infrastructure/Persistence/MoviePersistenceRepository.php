<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Infrastructure\Persistence;

use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Medine\Gibmyx\Domain\Entity\Movie;

final class MoviePersistenceRepository implements MovieRepository
{
    private $DB = [];

    public function save(Movie $movie): void
    {
        array_push($this->DB, [
            'id' => $movie->id(),
            'name' => $movie->name(),
            'duration' => $movie->duration(),
            'category' => $movie->category(),
        ]);
    }

    public function update(Movie $movie): void
    {
        // TODO: Implement update() method.
    }

    public function find(string $id): ?Movie
    {
        $indice = array_search($id, array_column($this->DB, 'id'), true);

        return $indice == false
            ? null
            : Movie::create(
                $this->DB[$indice]['id'],
                $this->DB[$indice]['name'],
                $this->DB[$indice]['duration'],
                $this->DB[$indice]['category']
            );
    }

    public function delete(string $id): void
    {
        $indice = array_search($id, array_column($this->DB, 'id'), true);
        unset($this->DB[$indice]);
    }

    public function getDb(): array
    {
        return $this->DB;
    }
}
