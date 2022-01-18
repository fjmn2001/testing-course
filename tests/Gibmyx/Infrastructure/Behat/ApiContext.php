<?php

declare(strict_types=1);

namespace Tests\Gibmyx\Infrastructure\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Medine\Gibmyx\Application\Create\MovieCreater;
use Medine\Gibmyx\Application\Create\MovieCreaterRequest;
use Medine\Gibmyx\Application\Finder\MovieFinder;
use Medine\Gibmyx\Application\Finder\MovieFinderRequest;
use Medine\Gibmyx\Infrastructure\Persistence\MoviePersistenceRepository;
use PHPUnit\Framework\Assert;

final class ApiContext implements Context
{
    private MoviePersistenceRepository $repository;

    public function __construct()
    {
        $this->repository = new MoviePersistenceRepository();
    }

    /**
     * @Given /^It Should Create Movie With Request Value:$/
     */
    public function itShouldCreateMovieWithRequestValue(PyStringNode $string)
    {
        $request = json_decode($string->getRaw(), true, 512, JSON_THROW_ON_ERROR);
        $creator = new MovieCreater($this->repository);
        ($creator)(new MovieCreaterRequest(
            $request['id'],
            $request['name'],
            $request['duration'],
            $request['category'],
            $request['releaseDate'],
        ));
    }

    /**
     * @Then I find a movie with id :arg1
     */
    public function iFindAMovieWithId($id)
    {
        $finder = new MovieFinder($this->repository);
        $response = ($finder)(new MovieFinderRequest($id));

        Assert::assertSame(
            $id,
            $response->id()
        );
    }
}
