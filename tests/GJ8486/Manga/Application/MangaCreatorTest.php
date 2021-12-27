<?php

namespace Tests\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Application\MangaCreator;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use PHPUnit\Framework\TestCase;

class MangaCreatorTest extends TestCase
{

    /** @test */
    public function itShouldCreateANewManga()
    {
        $repository = new MangaPersistenceText;
        $aplication = new MangaCreator($repository);
        $nuevo_manga = [ 'id' => '20202020202', 'nombre' => 'Vinland Saga', 'autor' => 'Makoto Yukimura', 'estado' => 'En emisión'];
        $aplication($nuevo_manga);

        $this->assertEquals(1, count($repository->getDB()));
    }
}
