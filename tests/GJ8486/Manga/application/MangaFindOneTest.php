<?php

namespace Tests\GJ8486\Manga\application;

use Medine\GJ8486\Manga\Application\MangaFindOne;
use Medine\GJ8486\Manga\Domain\Manga;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use PHPUnit\Framework\TestCase;

class MangaFindOneTest extends TestCase
{

    /** @test */
    public function itShouldFindAndReturnAManga()
    {
        $DB = new MangaPersistenceText;
        $DB->save((Manga::create('20202020202', 'Vinland Saga', 'Makoto Yukimura')));
        $DB->save((Manga::create('20202020200', 'One Piece', 'Eiichirō Oda')));
        $DB->save((Manga::create('20202020201', 'Death Note', 'Tsugumi Ōba')));

        $findOne = new MangaFindOne($DB);

        $result = $findOne('20202020200');
        $this->assertEquals('One Piece', $result->nombre());
    }

}