<?php

namespace Tests\GJ8486\Manga\Application;

use Medine\GJ8486\Manga\Application\MangaFindOne;
use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\GJ8486\Manga\domain\MangaMother;

class MangaFindOneTest extends TestCase
{

    /** @test */
    public function itShouldFindAndReturnAManga()
    {
        $repository = Mockery::mock(MangaPersistenceText::class);
        $manga = MangaMother::random();

        $repository->shouldReceive('findOne')
            ->andReturn($manga);

        $findOne = new MangaFindOne($repository);

        $result = $findOne('20202020200');
        $this->assertEquals($manga->nombre(), $result->nombre());
    }

}