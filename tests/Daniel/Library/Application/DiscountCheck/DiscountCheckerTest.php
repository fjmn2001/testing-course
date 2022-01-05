<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application\DiscountCheck;

use Medine\Daniel\Library\Application\DiscountCheck\DiscountChecker;
use Medine\Daniel\Library\Domain\Contracts\Clock;
use PHPUnit\Framework\TestCase;

final class DiscountCheckerTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldApplyDiscount(): void
    {
        $now             = new \DateTimeImmutable('2022/01/01 08:00:00');
        $repository      = \Mockery::mock(Clock::class);
        $discountChecker = new DiscountChecker($repository);

        $repository->shouldReceive('now')
            ->once()
            ->andReturn($now);

        $this->assertTrue(($discountChecker)());
    }

    /**
     * @test
     */
    public function itShouldNotApplyDiscount(): void
    {
        $now             = new \DateTimeImmutable('2022/01/01 10:01:00');
        $repository      = \Mockery::mock(Clock::class);
        $discountChecker = new DiscountChecker($repository);

        $repository->shouldReceive('now')
            ->once()
            ->andReturn($now);

        $this->assertfalse(($discountChecker)());
    }
}
