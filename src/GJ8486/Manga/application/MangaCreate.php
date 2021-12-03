<?php

namespace Medine\GJ8486\Manga\application;

use Medine\GJ8486\Manga\domain\Manga;
use Medine\GJ8486\Manga\infrastructure\MangaPersistenceText;

class MangaCreate
{
    protected $mangaPresistence;

    public function __construct(){
        $this->mangaPresistence = new MangaPersistenceText();
    }

   public function __invoke(array $request)
   {
       $manga = Manga::create($request['id'], $request['nombre'], $request['autor']);
       return $this->mangaPresistence->save($manga);

   }

}