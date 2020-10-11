<?php
/**
*    domain layer   04. RELATION CLASS
* We will use it from the Runner model’s perspective, so it contains Run. Runner id is needed only for easier integration with other layers of the app. It also holds a time result which runner achieved during the competition.
*
* RunParticipation model is very similar. It doesn’t contain additional properties.

* RunParticipation and RunResult are still a part of the domain, and they have nothing to do with how it will be implemented in the infrastructure layer with a real storage implementation.
*
* These models don’t know anything about the framework, storage or third party libraries. They are pure PHP classes containing the essence of our application.
*/
declare(strict_types = 1);

namespace Domain\Model;

use Common\Id;

final class RunResult //domain layer 04. RELATION CLASS
{
    private $run;
    private $runnerId;
    /**
     * Time in seconds
     */
    private $time;


    public function __construct(Run $run, Id $runnerId, int $time)
    {
        $this->run = $run;
        $this->runnerId = $runnerId;
        $this->time = $time;
    }



    public function getRun(): Run
    {
        return $this->run;
    }

    public function getRunnerId(): Id
    {
        return $this->runnerId;
    }

    public function getTime(): int
    {
        return $this->time;
    }
}
