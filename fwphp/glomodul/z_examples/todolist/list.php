<?php
/*
 * 
 */

namespace TodoList;

use \TodoList\Dao\TodoDao;
use \TodoList\Dao\TodoSearchCriteria;
use \TodoList\Util\Utils;
use \TodoList\Validation\TodoValidator;

$status = Utils::getUrlParam('status');
TodoValidator::validateStatus($status);

$dao = new TodoDao();
$search = (new TodoSearchCriteria())
        ->setStatus($status);

// data for template
$title = Utils::capitalize($status) . ' TODOs';
$todos = $dao->find($search);
