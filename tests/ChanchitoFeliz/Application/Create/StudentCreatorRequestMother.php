<?php

declare(strict_types=1);

namespace Tests\ChanchitoFeliz\Application\Create;

use Medine\ChanchitoFeliz\Application\Create\StudentCreatorRequest;

final class StudentCreatorRequestMother
{
    public static function random(): StudentCreatorRequest
    {
        return new StudentCreatorRequest(
            'custom-id',
            'custom-name'
        );
    }
}
