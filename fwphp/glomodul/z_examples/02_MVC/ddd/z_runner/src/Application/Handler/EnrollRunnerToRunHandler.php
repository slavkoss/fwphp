<?php
/**
*   app layer    08. RUNNER’S ENROLMENT EXAMPLE
*  It’s just a use case for our app. Handler uses domain repositories to fetch required models, execute the specified business logic task and saves its result back to storage. 
* What’s worth noticing? A relation between layers: domain doesn’t know anything about app, but app uses  domain to perform its tasks. Also, app is still third-party-tools-agnostic. We didn’t have to choose a framework or storage!
*
* With step 08. we have a fully working app. There are only a few small obstacles: 
*   - it can’t handle HTTP/cli requests
*   - doesn’t have storage, so we have no real data to work with
*   - it’s also missing some other things indispensable for frameworks and third-party libraries to make our life easier.
*
* Now it’s time to connect  framework-agnostic part of our app with a framework and storage.
* We can use tools: Laravel 5.7, Eloquent (MySQL 5.7) and Tactician (command bus implementation). They are a part of our infrastructure – they are external services we want to use because they will make certain things easier for us. However, business logic shouldn’t care much about them. Instead, we use repository contracts and application layer concepts.
*/
declare(strict_types = 1);

namespace Application\Handler;

use Application\Command\EnrollRunnerToRun;
use Domain\Repository\RunnerRep_intf;
use Domain\Repository\RunParticiRep_intf;
use Domain\Repository\RunRep_intf;

final class EnrollRunnerToRunHandler //app layer 08. RUNNER’S ENROLMENT EXAMPLE
{
    private $RunnerRep_intf;

    private $RunRep_intf;

    private $RunParticiRep_intf;

    public function __construct(
        RunnerRep_intf $RunnerRep_intf,
        RunRep_intf $RunRep_intf,
        RunParticiRep_intf $RunParticiRep_intf
    ) {
        $this->RunnerRep_intf = $RunnerRep_intf;
        $this->RunRep_intf = $RunRep_intf;
        $this->RunParticiRep_intf = $RunParticiRep_intf;
    }

    /**
     * @throws \Domain\Exception\RunAlreadyParticipated
     * @throws \Domain\Exception\RunAlreadyStarted
     * @throws \Domain\Exception\RunNotFound
     * @throws \Domain\Exception\RunnerNotFound
     */
    public function handle(EnrollRunnerToRun $command): void
    {
        $run = $this->RunRep_intf->getById($command->getRunId());
        $runner = $this->RunnerRep_intf->getById($command->getRunnerId());

        $runParticipation = $runner->participate($run);

        $this->RunParticiRep_intf->save($runParticipation);
    }
}
