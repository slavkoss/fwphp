<?php

declare(strict_types = 1);

namespace Application\Handler;

use Application\Command\SaveRunnerResult;
use Domain\Repository\RunnerRep_intf;
use Domain\Repository\RunRep_intf;
use Domain\Repository\RunResultRep_intf;

final class SaveRunnerResultHandler
{
    private $RunRep_intf;

    private $RunnerRep_intf;

    private $RunResultRep_intf;

    public function __construct(
        RunRep_intf $RunRep_intf,
        RunnerRep_intf $RunnerRep_intf,
        RunResultRep_intf $RunResultRep_intf
    ) {
        $this->RunRep_intf = $RunRep_intf;
        $this->RunnerRep_intf = $RunnerRep_intf;
        $this->RunResultRep_intf = $RunResultRep_intf;
    }

    /**
     * @throws \Domain\Exception\RunNotFound
     * @throws \Domain\Exception\RunNotParticipated
     * @throws \Domain\Exception\RunResultAlreadySaved
     * @throws \Domain\Exception\RunResultExpired
     * @throws \Domain\Exception\RunnerNotFound
     * @throws \Domain\Exception\TimeLimitReached
     */
    public function handle(SaveRunnerResult $command): void
    {
        $run = $this->RunRep_intf->getById($command->getRunId());
        $runner = $this->RunnerRep_intf->getById($command->getRunnerId());

        $runResult = $runner->result($run, $command->getTime());

        $this->RunResultRep_intf->save($runResult);
    }
}
