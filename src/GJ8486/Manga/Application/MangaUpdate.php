<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\MangaPersistence;

class MangaUpdate
{
    public function __construct(MangaPersistence $mangaPresistence)
    {
        $this->mangaPresistence = $mangaPresistence;
    }

    public function __invoke(array $request)
    {
        $manga = $this->mangaPresistence->findOne($request['id']);

        $manga->nombreChange($request['nombre']);
        $manga->autorChange($request['autor']);
        $manga->estadoChange($request['estado']);

        return $this->mangaPresistence->update($manga);
    }
}