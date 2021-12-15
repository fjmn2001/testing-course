<?php

namespace Medine\GJ8486\Manga\Infrastructure;

use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Domain\MangaPersistence;

class MangaPersistenceText implements MangaPersistence
{
    private $DB = [];

    public function save(Manga $manga)
    {
        $this->DB[] = $manga;
    }

    public function findOne(string $id)
    {
        $result = array_merge(array_filter($this->DB, function ($m) use ($id) {
            return ($m->id() == $id);
        }), []);

        return count($result) > 0
           ? Manga::create(
               $result[0]->id(),
               $result[0]->nombre(),
               $result[0]->autor()
           )
           : [];
    }

    public function getDB(): array
    {
        return $this->DB;
    }
}
