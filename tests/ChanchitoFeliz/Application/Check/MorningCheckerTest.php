<?php

namespace Tests\ChanchitoFeliz\Application\Check;

use DateTimeImmutable;
use Medine\ChanchitoFeliz\Application\Check\MorningChecker;
use Medine\ChanchitoFeliz\Domain\ClockRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class MorningCheckerTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldCheckAValidMorningTime(): void
    {
        $repository = Mockery::mock(ClockRepository::class);
        $repository
            ->shouldReceive('now')
            ->once()
            ->andReturn(new DateTimeImmutable('2021-12-12 09:00:00'));

        $checker = new MorningChecker($repository);

        $this->assertTrue(($checker)());
    }

    /**
     * @test
     */
    public function itShouldCheckAnInvalidMorningTime(): void
    {
        $repository = Mockery::mock(ClockRepository::class);
        $repository
            ->shouldReceive('now')
            ->once()
            ->andReturn(new DateTimeImmutable('2021-12-12 19:00:00'));

        $checker = new MorningChecker($repository);

        $this->assertFalse(($checker)());
    }
}
