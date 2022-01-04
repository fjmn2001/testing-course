<?php

namespace Tests\GJ8486\Manga\domain;

use Medine\GJ8486\Manga\Domain\Manga;

class MangaMother
{
    public static function random()
    {
        return Manga::create(
            (string)mt_rand(),
            (string)mt_rand(),
            (string)mt_rand(),
            'En emisión'
        );
    }
}