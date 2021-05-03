<?php
/*
 * 
 */

namespace TodoList;

use \DateTime;
use \TodoList\Model\Todo;
use \TodoList\Util\Utils;

// data for template
$todo = Utils::getTodoByGetId();
$tooLate = $todo->getStatus() == Todo::STATUS_PENDING
        && $todo->getDueOn() < new DateTime();
