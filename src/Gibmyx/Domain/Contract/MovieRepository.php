<?php

namespace Medine\Gibmyx\Domain\Contract;

use Medine\Gibmyx\Domain\Entity\Movie;

interface MovieRepository
{

    public function save(Movie $movie);

    public function find(string $id): ?Movie;

    public function delete(string $id): void;

}