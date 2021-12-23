<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application\Update;

use Medine\Daniel\Library\Domain\Contracts\BookRepository;
use PHPUnit\Framework\TestCase;
use Tests\Daniel\Library\Domain\BookMother;

final class BookUpdaterTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldUpdateAValidBook(): void
    {
        $book       = BookMother::random();
        $repository = \Mockery::mock(BookRepository::class);

        $repository->shouldReceive('find')
            ->with($book->id())
            ->once()
            ->andReturn($book);

        $repository->shouldReceive('save')
            ->once()
            ->andReturnNull();


    }
}