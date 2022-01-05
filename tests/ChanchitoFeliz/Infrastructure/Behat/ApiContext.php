<?php

declare(strict_types=1);

namespace Tests\ChanchitoFeliz\Infrastructure\Behat;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Medine\ChanchitoFeliz\Application\Create\StudentCreator;
use Medine\ChanchitoFeliz\Application\Create\StudentCreatorRequest;
use Medine\ChanchitoFeliz\Application\Find\StudentFinder;
use Medine\ChanchitoFeliz\Application\Find\StudentFinderRequest;
use Medine\ChanchitoFeliz\Infrastructure\Persistence\InMemoryStudentRepository;
use PHPUnit\Framework\Assert;

final class ApiContext implements Context
{
    private InMemoryStudentRepository $repository;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->repository = new InMemoryStudentRepository();
    }

    /**
     * @Given I send a request to StudentCreator with values:
     */
    public function iSendARequestToStudentcreatorWithValues(PyStringNode $string)
    {
        $request = json_decode($string->getRaw(), true, 512, JSON_THROW_ON_ERROR);
        $creator = new StudentCreator($this->repository);
        ($creator)(new StudentCreatorRequest(
            $request['id'],
            $request['name']
        ));
    }

    /**
     * @Then I must find and stutend with id :arg1
     */
    public function iMustFindAndStutendWithId($id)
    {
        $finder = new StudentFinder($this->repository);
        $response = ($finder)(new StudentFinderRequest($id));

        Assert::assertSame(
            $id,
            $response->id()
        );
    }
}
