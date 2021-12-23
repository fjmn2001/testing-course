<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Domain\MangaPersistence;

class MangaCreator
{
    private $mangaPresistence;

    public function __construct(MangaPersistence $mangaPresistence)
    {
        $this->mangaPresistence = $mangaPresistence;
    }

    public function __invoke(array $request): void
    {
        $manga = Manga::create($request['id'], $request['nombre'], $request['autor'], $request['estado']);
        $this->mangaPresistence->save($manga);
    }
}
