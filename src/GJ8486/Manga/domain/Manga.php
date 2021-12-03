<?php

namespace Medine\GJ8486\Manga\domain;

class Manga
{
    public function __construct(
        protected $id,
        protected $nombre,
        protected $autor
    )
    {

    }

    public static function create(string $id, string $nombre, string $autor,)
    {
        return new self($id, $nombre, $autor,);
    }

}