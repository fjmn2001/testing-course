<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Application;

use Medine\Daniel\Library\Application\BookCreator;
use Medine\Daniel\Library\Domain\Contracts\BookRepository;
use PHPUnit\Framework\TestCase;
use Tests\Daniel\Library\Domain\BookMother;
use Hamcrest\Core\IsIdentical;

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

        $repository->shouldReceive('save')
            ->once()
            ->andReturnNull();

        $creator    = new BookCreator($repository);

        ($creator)($request);
    }
}
