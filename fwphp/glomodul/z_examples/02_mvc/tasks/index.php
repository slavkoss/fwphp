<?php
include "hdr.php";
include "Database.php";
include "Tasks.php";
$task = new Tasks();
$id = $_SESSION['userid'];

if(isset($_GET['page']) && $_GET['page'] != "") {
    $task->pageno = $_GET['page'];
}else{
    $task->pageno = 1;
}


if(isset($_POST['addTask'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $err_log = "";
    if(!$task->addTasks($id,$title,$desc)){
        $err_log .= "<div class='alert alert-danger'>Something went wrong</div>";
    }else{
        $err_log .= "<div class='alert alert-success'>Task Added</div>";
    }
}

if(isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];
    if($task->markComplete($c_id)){
        header("Location: index.php");
    }
}

if(isset($_GET['d_id'])) {
    $d_id = $_GET['d_id'];
    if($task->deleteTask($d_id)){
        header("Location: index.php");
    }
}


include "home.php";
