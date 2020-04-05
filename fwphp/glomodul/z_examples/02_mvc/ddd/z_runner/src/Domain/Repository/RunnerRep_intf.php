<?php
/**
*    domain layer   05. REPOSITORY PATTERN - Example repository contract
*           it’s only possible to retrieve runner from the storage
* In the domain, we have not only models, but we also need a way of getting our models from the storage. Example repository contracts, that are still part of our domain, are presented below.
*/
namespace Domain\Repository;

use Common\Id;
use Domain\Exception\RunnerNotFound;
use Domain\Model\Runner;

interface RunnerRep_intf //domain layer 05. REPOSITORY PATTERN
{
    /**
     * @throws RunnerNotFound
     */
    public function getById(Id $runnerId): Runner;
}
