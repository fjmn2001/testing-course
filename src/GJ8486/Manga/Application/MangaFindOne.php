<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\MangaPersistence;

class MangaFindOne
{
    protected $mangaPresistence;

    public function __construct(MangaPersistence $mangaPresistence)
    {
        $this->mangaPresistence = $mangaPresistence;
    }

    public function __invoke(string $id)
    {
        return $this->mangaPresistence->findOne($id);
    }
}
