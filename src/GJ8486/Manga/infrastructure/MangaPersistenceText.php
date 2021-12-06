<?php

namespace Medine\GJ8486\Manga\infrastructure;

use Medine\GJ8486\Manga\domain\Manga;
use Medine\GJ8486\Manga\domain\MangaPersistence;

class MangaPersistenceText implements MangaPersistence
{
    public $DB = [];

    public function save(Manga $manga)
    {
        $this->DB[] = $manga;

        return [
            "id" => $manga->id(),
            "nombre" => $manga->nombre(),
            "autor" => $manga->autor(),
        ];
    }

    public function findOne(string $id)
    {
       return $this->DB;
    }

}