<?php

declare(strict_types=1);

namespace Tests\ChanchitoFeliz\Application\Update;

use Medine\ChanchitoFeliz\Application\Update\StudentUpdaterRequest;

final class StudentUpdaterRequestMother
{

    public static function random(): StudentUpdaterRequest
    {
        return new StudentUpdaterRequest(
            'custom-id',
            'custom-name'
        );
    }
}
