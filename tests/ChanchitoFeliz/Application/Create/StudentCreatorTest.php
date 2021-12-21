<?php

namespace Tests\ChanchitoFeliz\Application\Create;

use Medine\ChanchitoFeliz\Application\Create\StudentCreator;
use Medine\ChanchitoFeliz\Domain\StudentRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class StudentCreatorTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldCreateAValidStudents(): void
    {
        $repository = Mockery::mock(StudentRepository::class);
        $repository
            ->shouldReceive('save')
            ->once()
            ->andReturnNull();

        $creator = new StudentCreator($repository);
        $request = StudentCreatorRequestMother::random();
        ($creator)($request);
    }
}
