<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application\CheckYear;

use Medine\Gibmyx\Application\CheckYear\CheckYearMore10Year;
use Medine\Gibmyx\Application\CheckYear\MovieRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use PHPUnit\Framework\TestCase;
use Tests\Gibmyx\Domain\MovieMother;

final class CheckYearTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldCheckMore10Year()
    {
        $movie = MovieMother::titanic();
        $now = new \DateTimeImmutable('2022/01/01');
        $repository = \Mockery::mock(MovieRepository::class);

        $repository->shouldReceive('now')
            ->once()
            ->andReturn($now);

        $check = new CheckYearMore10Year($repository);

        $result = ($check)(new MovieRequest(
            $movie->id(),
            $movie->name(),
            $movie->duration(),
            $movie->category(),
            $movie->releaseDate()
        ));

        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldCheckMini10Year()
    {
        $movie = MovieMother::frozen();
        $now = new \DateTimeImmutable('2022/01/01');
        $repository = \Mockery::mock(MovieRepository::class);

        $repository->shouldReceive('now')
            ->once()
            ->andReturn($now);

        $check = new CheckYearMore10Year($repository);

        $result = ($check)(new MovieRequest(
            $movie->id(),
            $movie->name(),
            $movie->duration(),
            $movie->category(),
            $movie->releaseDate()
        ));
        self::assertFalse($result);
    }
}
