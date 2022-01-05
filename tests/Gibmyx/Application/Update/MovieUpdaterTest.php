<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application\Update;

use Medine\Gibmyx\Application\Updater\MovieUpdater;
use Medine\Gibmyx\Application\Updater\MovieUpdaterRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Gibmyx\Domain\MovieMother;

final class MovieUpdaterTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * @test
     */
    public function itShouldUpdateMovie(): void
    {
        $movie = MovieMother::random();
        $request = new MovieUpdaterRequest(
            $movie->id(),
            $movie->name(),
            $movie->duration(),
            "fantasy",
            $movie->releaseDate()
        );
        $repository = Mockery::mock(MovieRepository::class);

        $repository
            ->shouldReceive('find')
            ->with($request->id())
            ->once()
            ->andReturn($movie);

        $repository
            ->shouldReceive('update')
            ->once()
            ->andReturn();

        $update = new MovieUpdater($repository);

        ($update)($request);
    }
}
