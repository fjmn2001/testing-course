<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Domain;

use Medine\Gibmyx\Domain\Entity\Movie;

final class MovieMother
{
    public static function random(): Movie
    {
        return Movie::create(
            'custom-id',
            'custom-name',
            'custom-duration',
            'custom-category',
        );
    }

    public static function titanic(): Movie
    {
        return Movie::create(
            "670b9562-b30d-52d5-b827-655787665500",
            "Titanic",
            "03:14",
            "Drama, Romance",
        );
    }

    public static function elSeniorDeLosAnillos(): Movie
    {
        return Movie::create(
            "670b9562-b30d-djaq-b827-655987665900",
            "El Señor De Los Anillos",
            "02:58",
            "Guerra",
        );
    }

    public static function armageddon(): Movie
    {
        return Movie::create(
            "670b9562-dd50-52d5-b827-123456789123",
            "armageddon",
            "02:30",
            "Drama, Romance",
        );
    }
}
