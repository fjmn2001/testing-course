<?php

namespace Tests\GJ8486\Manga\application;

use Medine\GJ8486\Manga\domain\Manga;
use Medine\GJ8486\Manga\infrastructure\MangaPersistenceText;
use PHPUnit\Framework\TestCase;

class MangaCreateTest extends TestCase
{

    /** @test */
    public function itShouldCreateANewManga()
    {
        $DB = new MangaPersistenceText;

        $nuevo_manga = Manga::create('20202020202', 'Vinland Saga', 'Makoto Yukimura');
        $DB->save($nuevo_manga);

        $this->assertEquals(1, count($DB->getDB()));
    }

    /** @test */
    public function itShouldFindAndReturndAManga()
    {
        $DB = new MangaPersistenceText;
        $DB->save((Manga::create('20202020202', 'Vinland Saga', 'Makoto Yukimura')));
        $DB->save((Manga::create('20202020200', 'One Piece', 'Eiichirō Oda')));
        $DB->save((Manga::create('20202020201', 'Death Note', 'Tsugumi Ōba')));

        $result = $DB->findOne('20202020200');

        $this->assertEquals('One Piece', $result->nombre());
    }
}
