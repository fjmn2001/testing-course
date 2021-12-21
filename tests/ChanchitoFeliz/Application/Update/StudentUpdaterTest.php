<?php

namespace Tests\ChanchitoFeliz\Application\Update;

use Medine\ChanchitoFeliz\Application\Update\StudentUpdater;
use Medine\ChanchitoFeliz\Application\Update\StudentUpdaterRequest;
use Medine\ChanchitoFeliz\Domain\Student;
use Medine\ChanchitoFeliz\Domain\StudentRepository;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\ChanchitoFeliz\Domain\StudentMother;

class StudentUpdaterTest extends TestCase
{
    private StudentRepository|Mockery\LegacyMockInterface|Mockery\MockInterface $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->updater = new StudentUpdater($this->repository());
    }

    /**
     * @test
     */
    public function itShouldUpdateAValidStudent(): void
    {
        $student = StudentMother::random();
        $request = StudentUpdaterRequestMother::random();

        $this->shouldFind($request, $student);
        $this->shouldSave();

        ($this->updater)($request);
    }

    private function shouldFind(StudentUpdaterRequest $request, Student $student): void
    {
        $this->repository
            ->shouldReceive('find')
            ->with($request->id())
            ->once()
            ->andReturn($student);
    }

    private function shouldSave(): void
    {
        $this->repository
            ->shouldReceive('save')
            ->once()
            ->andReturnNull();
    }

    private function repository()
    {
        return $this->repository = $this->repository ?? Mockery::mock(StudentRepository::class);
    }
}
