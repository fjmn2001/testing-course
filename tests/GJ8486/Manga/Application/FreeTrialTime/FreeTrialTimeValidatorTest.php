<?php

namespace Tests\GJ8486\Manga\Application\FreeTrialTime;

use Medine\GJ8486\Manga\Application\FreeTrialTime\FreeTrialTimeValidator;
use Medine\GJ8486\Manga\Domain\Clock\Clock;
use PHPUnit\Framework\TestCase;

class FreeTrialTimeValidatorTest extends TestCase
{
    /** @test */
    public function itShouldCheckFreeTrialTimeIsValid()
    {
        $repository      = \Mockery::mock(Clock::class);

        $currentDate = new \DateTimeImmutable('2021/11/20 12:30:00');
        $limitDate = new \DateTimeImmutable('2021/12/01 00:00:00');

        $repository
            ->shouldReceive('currentDate')
            ->andReturn($currentDate)
            ->shouldReceive('limitDate')
            ->andReturn($limitDate);

        $validation = new FreeTrialTimeValidator($repository);
        $result = ($validation)();

        $this->assertTrue($result);
    }

    /** @test */
    public function itShouldCheckFreeTrialTimeIsNotValid()
    {
        $repository      = \Mockery::mock(Clock::class);

        $currentDate = new \DateTimeImmutable('2021/12/02 12:30:00');
        $limitDate = new \DateTimeImmutable('2021/12/01 00:00:00');

        $repository
            ->shouldReceive('currentDate')
            ->andReturn($currentDate)
            ->shouldReceive('limitDate')
            ->andReturn($limitDate);

        $validation = new FreeTrialTimeValidator($repository);
        $result = ($validation)();

        $this->assertFalse($result);
    }
}
