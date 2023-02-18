<?php
class tasksController extends Controller
{
    function index()
    {
        require(MODULEDIR . 'Models/Task.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            require(MODULEDIR . 'Models/Task.php');

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . MODULEDIR . "Views/Tasks/index.php");
                //header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(MODULEDIR . 'Models/Task.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . MODULEDIR . "Views/Tasks/index.php");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(MODULEDIR . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . MODULEDIR . "Views/Tasks/index.php");
        }
    }
}
?>