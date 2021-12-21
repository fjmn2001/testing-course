<?php

namespace Tests\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Application\MangaCreate;
use Medine\GJ8486\Manga\Application\MangaUpdate;
use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use Mockery;
use PHPUnit\Framework\TestCase;

class MangaUpdateTest extends TestCase
{
    /** @test */
    public function itShuldUpdateAManga(){

        $repository = Mockery::mock(MangaPersistenceText::class);

        $repository->shouldReceive('findOne')
            ->withArgs(['20202020200'])
            ->andReturn(Manga::create('20202020200', 'One Piece', 'Eiichirō Oda', 'En emisión'));

        $repository->shouldReceive('update')
            ->andReturn(Manga::create('20202020200', 'One Piece', 'Eiichirō Oda', 'Pausado'));

        $magaUpdate = new MangaUpdate($repository);
        $resuld = $magaUpdate([ 'id' => '20202020200', 'nombre' => 'One Piece', 'autor' => 'Eiichirō Oda', 'estado' => 'Pausado']);

        $this->assertEquals($resuld->estado(), 'Pausado');
    }

}