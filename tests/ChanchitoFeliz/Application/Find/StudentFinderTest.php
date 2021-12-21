<?php

namespace Tests\ChanchitoFeliz\Application\Find;

use Medine\ChanchitoFeliz\Application\Find\StudentFinder;
use Medine\ChanchitoFeliz\Application\Find\StudentFinderRequest;
use Medine\ChanchitoFeliz\Application\Find\StudentFinderResponse;
use Medine\ChanchitoFeliz\Domain\StudentRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\ChanchitoFeliz\Domain\StudentMother;

class StudentFinderTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldFindAValidStudent(): void
    {
        $student = StudentMother::random();
        $request = new StudentFinderRequest($student->id());
        $repository = Mockery::mock(StudentRepository::class);
        $response = new StudentFinderResponse(
            $student->id(),
            $student->name()
        );
        $repository
            ->shouldReceive('find')
            ->with($request->id())
            ->once()
            ->andReturn($student);

        $finder = new StudentFinder($repository);
        $this->assertEquals($response, ($finder)($request));
    }
}
