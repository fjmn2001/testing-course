<?php

namespace Tests\GJ8486\Manga\application;

use Medine\GJ8486\Manga\application\MangaCreate;
use PHPUnit\Framework\TestCase;

class MangaCreateTest extends TestCase
{
    /** @test */
    public function itShouldCreateANewManga()
    {
        $nuevo_manga = [
            'id' => '20202020202',
            'nombre' => 'Vinland Saga',
            'autor' => 'Makoto Yukimura'
        ];
        $manga_guardado = (new MangaCreate())($nuevo_manga);

        $this->assertEquals($nuevo_manga, array_merge((array)$manga_guardado),[]);
    }

}