<?php

declare(strict_types=1);

namespace Tests\GJ8486\Manga\Infrastructure\ATDD;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Medine\GJ8486\Manga\Application\MangaCreator;
use Medine\GJ8486\Manga\Application\MangaFindOne;
use Medine\GJ8486\Manga\Infrastructure\MangaPersistenceText;
use PHPUnit\Framework\Assert;

final class ApiContext implements Context
{
    private $repository;

    public function __construct()
    {
        $this->repository = new MangaPersistenceText();
    }

    /**
     * @Given I send a request to MangaCreator with values:
     */
    public function iSendARequestToMangaCreatorWithValues(PyStringNode $string)
    {
        $request = json_decode($string->getRaw(), true, 512, JSON_THROW_ON_ERROR);

        $application = new MangaCreator($this->repository);
        ($application)($request);
    }

    /**
     * @Then I must find and manga with id :arg1
     */
    public function iMustFindAndMangaWithId($id)
    {
        $finder = new MangaFindOne($this->repository);
        $response = ($finder)($id);

        Assert::assertSame($id, $response->id());
    }
}
