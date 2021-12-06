<?php

namespace Medine\GJ8486\Manga\application;

use Medine\GJ8486\Manga\domain\Manga;
use Medine\GJ8486\Manga\infrastructure\MangaPersistenceText;

class MangaFindOne
{
    protected $mangaPresistence;

    public function __construct(){
        $this->mangaPresistence = new MangaPersistenceText();
    }

   public function __invoke(string $id)
   {
       return $this->mangaPresistence->findOne($id);

   }

}