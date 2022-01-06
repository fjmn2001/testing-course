<?php

namespace Medine\GJ8486\Manga\Domain;

class Manga
{
    public function __construct(
        private $id,
        private $nombre,
        private $autor,
        private $estado
    ) {
    }
    

    public static function create(string $id, string $nombre, string $autor, string $estado)
    {
        return new self($id, $nombre, $autor, $estado);
    }

    public function id()
    {
        return $this->id;
    }

    public function autor()
    {
        return $this->autor;
    }

    public function nombre()
    {
        return $this->nombre;
    }

    public function estado()
    {
        return $this->estado;
    }

    public function changeAutor(string $new_value)
    {
        if ($new_value != $this->autor) {
            $this->autor = $new_value;
        }
    }

    public function changeNombre(string $new_value)
    {
        if ($new_value != $this->nombre) {
            $this->nombre = $new_value;
        }
    }

    public function changeEstado(string $new_value)
    {
        if ($new_value != $this->estado) {
            $this->estado = $new_value;
        }
    }
}
