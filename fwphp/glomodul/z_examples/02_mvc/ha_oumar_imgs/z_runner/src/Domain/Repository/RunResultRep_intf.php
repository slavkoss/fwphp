<?php

namespace Domain\Repository;

use Domain\Model\RunResult;

interface RunResultRep_intf
{
    public function save(RunResult $runResult): void;
}
