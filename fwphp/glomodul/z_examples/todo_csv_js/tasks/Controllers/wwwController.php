<?php
//J:\awww\www\fwphp\glomodul\z_examples\tasks\Controllers\Controller.php
class wwwController extends Controller
{
    function index()
    {
        require(MODULE_PATH . 'Models/Task.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            require(MODULE_PATH . 'Models/Task.php');

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . MODULE_RELPATH . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(MODULE_PATH . 'Models/Task.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . MODULE_RELPATH . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(MODULE_PATH . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . MODULE_RELPATH . "tasks/index");
        }
    }
}
?>