<?php

declare(strict_types=1);

namespace Tests\Daniel\Library\Infrastructure\Behat;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Medine\Daniel\Library\Application\Create\BookCreator;
use Medine\Daniel\Library\Application\Create\BookCreatorRequest;
use Medine\Daniel\Library\Application\Find\BookFinder;
use Medine\Daniel\Library\Application\Find\BookFinderRequest;
use Medine\Daniel\Library\Infrastructure\InMemoryBookRepository;
use PHPUnit\Framework\Assert;

final class ApiContext implements Context
{
    private InMemoryBookRepository $repository;

    public function __construct()
    {
        $this->repository = new InMemoryBookRepository();
    }

    /**
     * @Given /^It should create a book:$/
     */
    public function itShouldCreateABook(PyStringNode $string)
    {
        $request = json_decode($string->getRaw(), true, 512, JSON_THROW_ON_ERROR);
        $creator = new BookCreator($this->repository);
        ($creator)(new BookCreatorRequest(
            $request['id'],
            $request['name'],
            $request['author'],
            $request['year'],
        ));
    }

    /**
     * @Then I find a book with id :arg1
     */
    public function iFindABookWithId($id)
    {
        $finder = new BookFinder($this->repository);
        $response = ($finder)(new BookFinderRequest($id));

        Assert::assertSame(
            $id,
            $response->id()
        );
    }
}