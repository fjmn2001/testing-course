<?php

declare(strict_types=1);

namespace Tests\ChanchitoFeliz\Application\Search;

use Medine\ChanchitoFeliz\Application\Search\StudentSearcher;
use Medine\ChanchitoFeliz\Domain\StudentRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\ChanchitoFeliz\Domain\StudentMother;

final class StudentSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldSearchAllExistingStudents(): void
    {
        $student = StudentMother::random();
        $anotherStudent = StudentMother::random();
        $repository = Mockery::mock(StudentRepository::class);
        $allStudents = [$student, $anotherStudent];
        $repository
            ->shouldReceive('all')
            ->withNoArgs()
            ->once()
            ->andReturn($allStudents);

        $searcher = new StudentSearcher($repository);
        $response = ($searcher)();

        $this->assertEquals($allStudents, $response);
    }
}
