<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application\Update;

use Medine\Gibmyx\Application\Updater\MovieUpdate;
use Medine\Gibmyx\Application\Updater\MovieUpdateRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Gibmyx\Domain\MovieMother;

final class MovieUpdateTest extends TestCase
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
        $request = new MovieUpdateRequest(
            $movie->id(),
            $movie->name(),
            $movie->duration(),
            "fantasy"
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

        $update = new MovieUpdate($repository);

        ($update)($request);
    }
}
