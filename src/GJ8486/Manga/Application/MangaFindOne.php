<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Domain\MangaPersistence;

class MangaFindOne
{
    private $mangaPresistence;

    public function __construct(MangaPersistence $mangaPresistence)
    {
        $this->mangaPresistence = $mangaPresistence;
    }

    public function __invoke(string $id): Manga
    {
        return $this->mangaPresistence->findOne($id);
    }
}
