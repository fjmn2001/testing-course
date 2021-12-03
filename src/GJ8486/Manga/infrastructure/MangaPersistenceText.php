<?php

namespace Medine\GJ8486\Manga\infrastructure;

use Medine\GJ8486\Manga\domain\Manga;
use Medine\GJ8486\Manga\domain\MangaPersistence;

class MangaPersistenceText implements MangaPersistence
{
    public function save(Manga $manga)
    {
        return $manga;
    }

    public function findOne(Manga $manga)
    {
        // TODO: Implement findOne() method.
    }

}