<?php

namespace Medine\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;

class MangaCreate
{
    protected $mangaPresistence;

    public function __construct()
    {
        $this->mangaPresistence = new MangaPersistenceText();
    }

    public function __invoke(array $request)
    {
        $manga = Manga::create($request['id'], $request['nombre'], $request['autor']);
        return $this->mangaPresistence->save($manga);
    }
}
