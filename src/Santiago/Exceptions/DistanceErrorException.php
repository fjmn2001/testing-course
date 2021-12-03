<?php

declare(strict_types=1);

namespace Medine\Santiago\Exceptions;

use InvalidArgumentException;

final class DistanceErrorException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct("Error: Vectors have differences in number of items.");
    }
}
