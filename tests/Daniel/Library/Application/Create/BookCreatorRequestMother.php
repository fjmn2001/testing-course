<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application\Create;

use Medine\Daniel\Library\Application\Create\BookCreatorRequest;

final class BookCreatorRequestMother
{
    public static function random(): BookCreatorRequest
    {
        return new BookCreatorRequest(
            'f5822bb1-1e1d-4d48-811e-c8cff189e185',
            'El principito',
            'Antoine de Saint-Exupéry',
            1943
        );
    }
}