<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application\Create;

use Medine\Gibmyx\Application\Create\MovieCreate;
use Medine\Gibmyx\Application\Create\MovieCreateRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Gibmyx\Domain\MovieMother;

final class MovieCreateTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * @test
     */
    public function itShouldCreateMovie(): void
    {
        $movie = MovieMother::random();

        $repository = Mockery::mock(MovieRepository::class);
        $repository
            ->shouldReceive('save1')
            ->once()
            ->andReturnNull();

        $create = new MovieCreate($repository);
        ($create)(new MovieCreateRequest(
            $movie->id(),
            $movie->name(),
            $movie->duration(),
            $movie->category()
        ));
    }
}
