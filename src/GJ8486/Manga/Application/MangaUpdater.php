<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\MangaPersistence;

class MangaUpdater
{
    public function __construct(MangaPersistence $mangaPresistence)
    {
        $this->mangaPresistence = $mangaPresistence;
    }

    public function __invoke(array $request): void
    {
        $manga = $this->mangaPresistence->findOne($request['id']);

        $manga->changeAutor($request['nombre']);
        $manga->changeNombre($request['autor']);
        $manga->changeEstado($request['estado']);

        $this->mangaPresistence->update($manga);
    }
}