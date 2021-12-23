<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Application;

use Medine\Gibmyx\Application\MovieFinder;
use Medine\Gibmyx\Application\MovieFinderRequest;
use Medine\Gibmyx\Domain\Contract\MovieRepository;
use Medine\Gibmyx\Domain\Entity\Movie;
use Mockery;
use PHPUnit\Framework\TestCase;

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
        $movieArmageddon = $this->movieArmageddon();

        $repository = Mockery::mock(MovieRepository::class);
        $repository->shouldReceive('find')
            ->withArgs([$movieArmageddon->id()])
            ->times()
            ->andReturn($movieArmageddon);

        $finder = new MovieFinder($repository);

        $response = ($finder)(new MovieFinderRequest($movieArmageddon->id()));

        $this->assertEquals($movieArmageddon, $response);
    }

    private function movieTitanic(): Movie
    {
        return Movie::create(
            "670b9562-b30d-52d5-b827-655787665500",
            "Titanic",
            "03:14",
            "Drama, Romance",
        );
    }

    private function movieElSeniorDeLosAnillos(): Movie
    {
        return Movie::create(
            "670b9562-b30d-djaq-b827-655987665900",
            "El Señor De Los Anillos",
            "02:58",
            "Guerra",
        );
    }

    private function movieArmageddon(): Movie
    {
        return Movie::create(
            "670b9562-dd50-52d5-b827-123456789123",
            "armageddon",
            "02:30",
            "Drama, Romance",
        );
    }
}