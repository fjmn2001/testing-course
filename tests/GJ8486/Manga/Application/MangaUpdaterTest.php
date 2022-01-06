<?php

namespace Tests\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Application\MangaUpdater;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\GJ8486\Manga\domain\MangaMother;

class MangaUpdaterTest extends TestCase
{
    /** @test */
    public function itShouldUpdateAManga()
    {
        $repository = Mockery::mock(MangaPersistenceText::class);
        $manga = MangaMother::random();

        $repository
            ->shouldReceive('findOne')
            ->andReturn($manga)
            ->shouldReceive('update')
            ->andReturn($manga);

        $magaUpdate = new MangaUpdater($repository);

        $magaUpdate([
            'id' => $manga->id(),
            'nombre' => $manga->nombre(),
            'autor' => $manga->autor(),
            'estado' => 'Pausado'
        ]);

        $this->assertEquals($manga->estado(), 'Pausado');
    }
}
