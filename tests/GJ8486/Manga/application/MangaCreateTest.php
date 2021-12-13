<?php

namespace Tests\GJ8486\Manga\application;

use Medine\GJ8486\Manga\Application\MangaCreate;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use PHPUnit\Framework\TestCase;

class MangaCreateTest extends TestCase
{

    /** @test */
    public function itShouldCreateANewManga()
    {
        $aplication = new MangaCreate(new MangaPersistenceText);
        $nuevo_manga = [ 'id' => '20202020202', 'nombre' => 'Vinland Saga', 'autor' => 'Makoto Yukimura'];
        $aplication($nuevo_manga);

        $this->assertEquals(1, count($aplication->getDB()));
    }
}
