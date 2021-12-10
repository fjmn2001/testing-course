<?php

namespace Medine\GJ8486\Manga\Domain;

interface MangaPersistence
{
    public function save(Manga $manga);
    public function findOne(string $id);
}
