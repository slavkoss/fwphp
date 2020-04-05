<?php

declare(strict_types = 1);

namespace Domain\Model;

use Common\Id;
use Domain\Exception\RunAlreadyParticipated;
use Domain\Exception\RunAlreadyStarted;
use Domain\Exception\RunNotParticipated;
use Domain\Exception\RunResultAlreadySaved;
use Domain\Exception\RunResultExpired;
use Domain\Exception\TimeLimitReached;

//User contains simple properties like email or password
final class Runner extends User //domain layer 02. RUNNER MODEL
{
    const RUN_RESULT_EXPIRY_DAYS = 5;

    /**
     * @var RunParticipation[]
     */
    private $participations;

    /**
     * @var RunResult[]
     */
    private $results;

    public function __construct(
        Id $id,
        string $email,
        string $password,

        array $participations = [],
        array $results = []
    ) {
        $this->participations = $participations;
        $this->results = $results;

        parent::__construct(
            $id,
            $email,
            $password
        );
    }

    /**
     * @return RunParticipation[]
     */
    public function getParticipations(): array
    {
        return $this->participations;
    }

    /**
     * @return RunResult[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @return RunParticipation
     * @throws RunAlreadyParticipated
     * @throws RunAlreadyStarted
     */
    public function participate(Run $run): RunParticipation
    {
        if (isset($this->participations[(string)$run->getId()])) {
            throw RunAlreadyParticipated::forRun($run, $this);
        }

        if ($run->getStartAt() < new \DateTime()) {
            throw RunAlreadyStarted::forRun($run);
        }

        $runParticipation = new RunParticipation($run, $this->getId());
        $this->participations[] = $runParticipation;

        return $runParticipation;
    }

    /**
     * @throws RunNotParticipated
     * @throws RunResultAlreadySaved
     * @throws RunResultExpired
     * @throws TimeLimitReached
     */
    public function result(Run $run, int $time): RunResult
    {
        if (!isset($this->participations[(string)$run->getId()])) {
            throw RunNotParticipated::forRun($run, $this);
        }

        if ($run->getStartAt()->diff(new \DateTime())->d > self::RUN_RESULT_EXPIRY_DAYS) {
            throw RunResultExpired::forRun($run, $this);
        }

        if ($time > $run->getTimeLimit()) {
            throw TimeLimitReached::forRun($run, $this);
        }

        if (isset($this->results[(string)$run->getId()])) {
            throw RunResultAlreadySaved::forRun($run, $this);
        }

        $runResult = new RunResult($run, $this->getId(), $time);
        $this->results[(string)$run->getId()] = $runResult;

        return $runResult;
    }
}

/**
*        domain layer   02. RUNNER MODEL
* Runner model uses User which contains simple properties like email or password.
* We have RunParticipation and RunResult classes here that connect our runner with runs and its results in them. I’ll show you one of these classes later.
* I decided to keep the relation between Runner and Run in the first one (you’re free to do the other way, that’s just my design decision).
* We have two juicy business methods here: participate and result. They’re a core of our system and they’re responsible for almost all business logic in this example.
    - They contain a simple set of conditions (which are described by our business rules) 
    - and throw exceptions if they’re not met
    - They create a new instance of specific relation class, 
    - add it to the collection 
    - and return for easier processing by other parts of app
*/