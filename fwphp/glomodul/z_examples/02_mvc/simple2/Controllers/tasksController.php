<?php
class tasksController extends Controller
{
    //private $module_url ;
    //private $wsroot_url ;

    function _construct() {
      parent::__construct();
      //$this->m odule_url = $this->w sroot_url.'fwphp/glomodul/z_examples/02_MVC/simple2/Webroot'.'/';
      //$this->m odule_url = $this->w sroot_url.dirname($_SERVER['SCRIPT_NAME']).'/Webroot/';
      $this->module_url = $this->wsroot_url.dirname($_SERVER['SCRIPT_NAME']).'/';
      //$uri_arr = explode(QS, $_SERVER['REQUEST_URI']) ;
      //$m odule_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); 
      //$m odule_url = $w sroot_url.$module_relpath.'/';
    }

    function index()
    {
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            require(ROOT . 'Models/Task.php');

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/Task.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(ROOT . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>