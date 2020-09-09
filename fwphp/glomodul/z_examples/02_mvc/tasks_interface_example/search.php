<?php
include "hdr.php";
include "Database.php";
include "Tasks.php";
$task = new Tasks();
$id = $_SESSION['userid'];

if(isset($_POST['addTask'])) {
    $title = $_POST['title'];
    $desc = $_POST['summary'];
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

if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-5">
        <h3 class="text-center">Add Tasks</h3>
        <?php
        if(isset($err_log)){
            echo $err_log;
        }

        ?>
        <form action="index.php" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Task Title"/>
            </div>
            <div class="form-group">
                <textarea name="description" rows="10" class="form-control" placeholder="Task Description"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="addTask" class="btn btn-success btn-block" value="Add Task"/>
            </div>
        </form>
    </div>

    <div class="col-md-7">
        <h3 class="text-center">Welcome to your Tasks <?php echo $_SESSION['username']; ?>  <span class="small"><a
                    href="logout.php?logout">Logout</a></span></h3>
      

                <?php
                if(!empty($task->searchTasks($keyword))):
                    ?>
        <form action="search.php" method="GET">
            <div class="form-group">
                <input class="form-control" placeholder="Search by pressing enter key." type="text" name="keyword"/>
            </div>
        </form>
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
                foreach($task->searchTasks($keyword) as $data):
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
                        ?>    <form action="search.php" method="GET">
                            <div class="form-group">
                                <input class="form-control" placeholder="Search by pressing enter key." type="text" name="keyword"/>
                            </div>
                        </form>
                            <h4 class="text-center">No Result found for keyword: <?php echo $keyword;?></h4>
                        <?php
                    endif;
                ?>


                </tbody>
                </table>
                </div>

    </div>
</div>
</div>






