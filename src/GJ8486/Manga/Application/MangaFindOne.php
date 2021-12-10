<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;

class MangaFindOne
{
    protected $mangaPresistence;

    public function __construct()
    {
        $this->mangaPresistence = new MangaPersistenceText();
    }

    public function __invoke(string $id)
    {
        return $this->mangaPresistence->findOne($id);
    }
}
