<?php

namespace Tests\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Application\MangaFindOne;
use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use Mockery;
use PHPUnit\Framework\TestCase;

class MangaFindOneTest extends TestCase
{

    /** @test */
    public function itShouldFindAndReturnAManga()
    {
        $repository = Mockery::mock(MangaPersistenceText::class);
        $repository->shouldReceive('findOne')
            ->withArgs(['20202020200'])
            ->andReturn(Manga::create('20202020200', 'One Piece', 'Eiichirō Oda'));

        $findOne = new MangaFindOne($repository);

        $result = $findOne('20202020200');
        $this->assertEquals('One Piece', $result->nombre());
    }
}
