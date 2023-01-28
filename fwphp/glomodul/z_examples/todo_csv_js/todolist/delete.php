<?php
/*
 * 
 */

namespace TodoList;

use \TodoList\Dao\TodoDao;
use \TodoList\Flash\Flash;
use \TodoList\Util\Utils;

$todo = Utils::getTodoByGetId();

$dao = new TodoDao();
$dao->delete($todo->getId());
Flash::addFlash('TODO deleted successfully.');

Utils::redirect('list', ['status' => $todo->getStatus()]);
