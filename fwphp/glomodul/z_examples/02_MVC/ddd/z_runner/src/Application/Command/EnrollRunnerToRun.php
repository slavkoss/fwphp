<?php
/**
*   app layer    07. RUNNER’S ENROLMENT EXAMPLE
* we’ll use a command bus, so for every application action, there is class responsible for it. In this pattern, we have a very simple Command class containing data introduced by a system actor. Then, it is handled by a Handler that executes specific logic with domain layer’s help.
*/
declare(strict_types = 1);

namespace Application\Command;

use Common\Id;

final class EnrollRunnerToRun //app layer 07. RUNNER’S ENROLMENT EXAMPLE
{
    private $runnerId;

    private $runId;

    public function __construct(Id $runnerId, Id $runId)
    {
        $this->runnerId = $runnerId;
        $this->runId = $runId;
    }

    public function getRunnerId(): Id
    {
        return $this->runnerId;
    }

    public function getRunId(): Id
    {
        return $this->runId;
    }
}
