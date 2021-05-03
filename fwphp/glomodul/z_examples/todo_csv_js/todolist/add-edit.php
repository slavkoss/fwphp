<?php
/*
 * 
 */

namespace TodoList;

use \DateTime;
use \TodoList\Dao\TodoDao;
use \TodoList\Flash\Flash;
use \TodoList\Mapping\TodoMapper;
use \TodoList\Model\Todo;
use \TodoList\Util\Utils;
use \TodoList\Validation\TodoValidator;

$errors = [];
$todo = null;
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $todo = Utils::getTodoByGetId();
} else {
    // set defaults
    $todo = new Todo();
    $todo->setPriority(Todo::PRIORITY_MEDIUM);
    $dueOn = new DateTime("+1 day");
    $dueOn->setTime(0, 0, 0);
    $todo->setDueOn($dueOn);
}

if (array_key_exists('cancel', $_POST)) {
    // redirect
    Utils::redirect('detail', ['id' => $todo->getId()]);
} elseif (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = [
        'title' => $_POST['todo']['title'],
        'due_on' => $_POST['todo']['due_on_date'] . ' ' . $_POST['todo']['due_on_hour'] . ':' . $_POST['todo']['due_on_minute'] . ':00',
        'priority' => $_POST['todo']['priority'],
        'description' => $_POST['todo']['description'],
        'comment' => $_POST['todo']['comment'],
    ];
        ;
    // map
    TodoMapper::map($todo, $data);
    // validate
    $errors = TodoValidator::validate($todo);
    // validate
    if (empty($errors)) {
        // save
        $dao = new TodoDao();
        $todo = $dao->save($todo);
        Flash::addFlash('TODO saved successfully.');
        // redirect
        Utils::redirect('detail', ['id' => $todo->getId()]);
    }
}
