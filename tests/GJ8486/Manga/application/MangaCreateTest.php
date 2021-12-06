<?php

namespace Tests\GJ8486\Manga\application;

use Medine\GJ8486\Manga\application\MangaCreate;
use Medine\GJ8486\Manga\application\MangaFindOne;
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
        $this->assertSame($nuevo_manga, $manga_guardado);
    }

    /** @test */
    public function itShouldFindAndReturndAManga()
    {
        $nuevo_manga = [
            'id' => '20202020202',
            'nombre' => 'Vinland Saga',
            'autor' => 'Makoto Yukimura'
        ];
        (new MangaCreate())($nuevo_manga);
        $manga_encontrado = (new MangaFindOne())('20202020202');
        $this->assertSame($nuevo_manga, $manga_encontrado);
    }

}