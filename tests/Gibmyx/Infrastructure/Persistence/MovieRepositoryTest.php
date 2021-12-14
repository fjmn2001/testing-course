<?php

namespace Tests\Gibmyx\Infrastructure\Persistence;

use Medine\Gibmyx\Domain\Entity\Movie;
use Medine\Gibmyx\Infrastructure\Persistence\MoviePersistenceRepository;
use PHPUnit\Framework\TestCase;

class MovieRepositoryTest extends TestCase
{
    public $repository;

    public function setUp(): void
    {
        $this->repository = new MoviePersistenceRepository();
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @test
     */
    public function itShouldSaveMovie()
    {
        $movie = $this->movieTitanic();

        $this->repository->save($movie);
        self::assertSame(1, count($this->repository->getDb()));
    }

    /**
     * @test
     */
    public function itShouldFindMovie()
    {
        $movie2 = $this->movieTitanic();
        $movie1 = $this->movieArmageddon();
        $movie3 = $this->movieElSeniorDeLosAnillos();

        $this->repository->save($movie1);
        $this->repository->save($movie2);
        $this->repository->save($movie3);

        $movieResult = $this->repository->find($movie2->id());

        self::assertSame(
            [
                'id' => $movie2->id(),
                'name' => $movie2->name(),
                'duration' => $movie2->duration(),
                'category' => $movie2->category()
            ],
            [
                'id' => $movieResult->id(),
                'name' => $movieResult->name(),
                'duration' => $movieResult->duration(),
                'category' => $movieResult->category()
            ]
        );
    }

    /**
     * @test
     */
    public function itShouldDeleteMovie()
    {
        $movie2 = $this->movieTitanic();
        $movie1 = $this->movieArmageddon();
        $movie3 = $this->movieElSeniorDeLosAnillos();

        $this->repository->save($movie1);
        $this->repository->save($movie2);
        $this->repository->save($movie3);

        $this->repository->delete($movie2->id());

        $movieResult = $this->repository->find($movie2->id());

        self::assertSame(null, $movieResult);
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