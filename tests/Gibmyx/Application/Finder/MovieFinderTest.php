<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application\Finder;

use Medine\Gibmyx\Application\Finder\MovieFinder;
use Medine\Gibmyx\Application\Finder\MovieFinderRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Gibmyx\Domain\MovieMother;

final class MovieFinderTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * @test
     */
    public function itShouldFinderMovie(): void
    {
        $movie = MovieMother::random();

        $repository = Mockery::mock(MovieRepository::class);
        $repository->shouldReceive('find')
            ->withArgs([$movie->id()])
            ->times()
            ->andReturn($movie);

        $finder = new MovieFinder($repository);

        $response = ($finder)(new MovieFinderRequest($movie->id()));

        $this->assertEquals($movie, $response);
    }
}
