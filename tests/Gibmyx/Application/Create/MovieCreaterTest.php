<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application\Create;

use Medine\Gibmyx\Application\Create\MovieCreater;
use Medine\Gibmyx\Application\Create\MovieCreaterRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Gibmyx\Domain\MovieMother;

final class MovieCreaterTest extends TestCase
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
            ->shouldReceive('save')
            ->once()
            ->andReturnNull();

        $create = new MovieCreater($repository);
        ($create)(new MovieCreaterRequest(
            $movie->id(),
            $movie->name(),
            $movie->duration(),
            $movie->category()
        ));
    }
}
