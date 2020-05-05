<?php
include "hdr.php";
include "Database.php";
include "Tasks.php";
$task = new Tasks();
$id = $_SESSION['userid'];

if(isset($_GET['e_id']) && $_GET['e_id'] !== "") {
    $e_id = (int) $_GET['e_id'];
    $list = $task->singleTasks($e_id);
                          echo '<pre>$list='; print_r($list);  echo '</pre>';
    $title = $list['title'];
    $desc = $list['summary'];
}

if(isset($_GET['e_id'])) {
    $edit_id = (int) $_GET['e_id'] ;
    if(isset($_POST['updateTask'])) {
        $task_title = $_POST['title'];
        $description = $_POST['summary'];
        if(!$task->updateTask($edit_id,$task_title,$description)) {
            die("Failed");
        } else{
            header("Location: index.php");
        }
    }
}

if(isset($_GET['c_id'])) {
    $c_id = (int) $_GET['c_id'] ;
    if($task->markComplete($c_id)){
        header("Location: index.php");
    }
}

if(isset($_GET['d_id'])) {
    $d_id = (int) $_GET['d_id'] ;
    if($task->deleteTask($d_id)){
        header("Location: index.php");
    }
}
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-5">
        <h3 class="text-center">Edit Tasks</h3>
        <form action="edit.php?e_id=<?php echo $_GET['e_id']; ?>" method="post"
              autocomplete="off">
            <div class="form-group">
                <input type="text" value="<?php echo $title; ?>" name="title" 
                       class="form-control" placeholder="Task Title"/>
            </div>
            <div class="form-group">
                <textarea name="description" rows="10" class="form-control"
                          placeholder="Task Description"><?php echo $desc; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="updateTask" class="btn btn-success btn-block"
                       value="Update Task"/>
            </div>
        </form>
    </div>

    <div class="col-md-7">
        <h3 class="text-center">Welcome to your Tasks <?php echo $_SESSION['username']; ?>  <span class="small"><a
                    href="logout.php?logout">Logout</a></span></h3>
      

                <?php
                if(!empty($task->showTasks($e_id))):
                    ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th colspan="3" class="text-center">Action</th>
                    <th>Date Added</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                foreach($task->showTasks($e_id) as $data):
                    if($data['status'] !== 'Pending'):
                ?>
                     <tr>
                         <td><?php echo $data['title']; ?></td>
                         <td><?php echo $data['summary']; ?></td>
                         <td></td>
                         <td><a href="index.php?d_id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
                         <td></td>
                         <td><?php echo $data['datetime']; ?></td>
                         <td><?php echo $data['status']; ?></td>
                     </tr>
                <?php
                    else:
                        ?>
                        <tr>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['summary']; ?></td>
                            <td><a href="edit.php?e_id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="index.php?c_id=<?php echo $data['id']; ?>" class="btn btn-success">Mark as Complete</a></td>
                            <td><a href="index.php?d_id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
                            <td><?php echo $data['datetime']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                        </tr>
                <?php
                    endif;
                    endforeach;
                        else:
                        ?>
                            <h4 class="text-center">No Task added yet! (edit.php)</h4>
                        <?php
                    endif;
                ?>


                </tbody>
                </table>
                </div>

    </div>
</div>
</div>






