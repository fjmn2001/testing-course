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
        $this->DB[$movie->id()] = [
            'id' => $movie->id(),
            'name' => $movie->name(),
            'duration' => $movie->duration(),
            'category' => $movie->category(),
            'releaseDate' => $movie->releaseDate(),
        ];
    }

    public function update(Movie $movie): void
    {
        // TODO: Implement update() method.
    }

    public function find(string $id): ?Movie
    {
        $exits = key_exists($id, $this->DB);
        return $exits == false
            ? null
            : Movie::create(
                $this->DB[$id]['id'],
                $this->DB[$id]['name'],
                $this->DB[$id]['duration'],
                $this->DB[$id]['category'],
                $this->DB[$id]['releaseDate']
            );
    }

    public function delete(string $id): void
    {
        if (!key_exists($id, $this->DB)) {
            return;
        }

        unset($this->DB[$id]);
    }

    public function getDb(): array
    {
        return $this->DB;
    }

    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }
}
