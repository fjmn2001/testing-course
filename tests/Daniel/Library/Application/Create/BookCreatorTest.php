<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application\Create;

use Medine\Daniel\Library\Application\Create\BookCreator;
use Medine\Daniel\Library\Domain\Contracts\BookRepository;
use PHPUnit\Framework\TestCase;

final class BookCreatorTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }

    /**
     * @test
     */
    public function itShouldCreateAValidBook()
    {
        $request    = BookCreatorRequestMother::random();
        $repository = \Mockery::mock(BookRepository::class);

        $repository->shouldReceive('create')
            ->once()
            ->andReturnNull();

        $creator    = new BookCreator($repository);

        ($creator)($request);
    }
}
