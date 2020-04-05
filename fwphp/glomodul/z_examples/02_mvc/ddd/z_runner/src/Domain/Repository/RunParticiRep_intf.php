<?php
/**
*   domain layer    06. REPOSITORY PATTERN - Example repository contract
*           saves runner participation
*/
namespace Domain\Repository;

use Domain\Model\RunParticipation;

interface RunParticiRep_intf //domain layer 06. REPOSITORY PATTERN - Example repository contract
{
    public function save(RunParticipation $runParticipation): void;
}
