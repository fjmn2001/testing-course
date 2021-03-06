<?php

namespace Tests\Santiago;

use Medine\Santiago\Domain\Pet;
use Medine\Santiago\Infrastructure\Persistence\PetPersistenceRepository;
use PHPUnit\Framework\TestCase;

class PetRepositoryTest extends TestCase
{
    public $repository;

    public function setUp(): void
    {
        $this->repository = new PetPersistenceRepository();
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @test
     */
    public function itShouldSaveAPet()
    {
        $pet = $this->balto();

        $this->repository->save($pet);
        self::assertSame(1, count($this->repository->getDb()));
    }

    /**
     * @test
     */
    public function itShouldFindAPet()
    {
        $pet2 = $this->balto();
        $pet = $this->princess();

        $this->repository->save($pet);
        $this->repository->save($pet2);

        $petResult = $this->repository->find($pet2->id());

        self::assertSame(
            [
                'id' => $pet2->id(),
                'name' => $pet2->name(),
                'age' => $pet2->age()
            ],
            [
                'id' => $petResult->id(),
                'name' => $petResult->name(),
                'age' => $petResult->age()
            ]
        );
    }


    private function balto(): Pet
    {
        return Pet::create(
            "7f8e1776-5faa-46db-b133-3ef73cd791d0",
            "Balto",
            "3"
        );
    }

    private function princess(): Pet
    {
        return Pet::create(
            "84e25864-fb8e-4646-9702-1e1e86a15089",
            "Princess",
            "2"
        );
    }
}
