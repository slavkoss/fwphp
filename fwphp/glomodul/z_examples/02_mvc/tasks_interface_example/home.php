<div class="container-fluid">
  <div class="row">
    <div class="col-md-5">
      <h3 class="text-center">Add Tasks</h3><?php
      if(isset($err_log)){ echo $err_log; } ?>

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

    </div><!-- class="col-md-5" -->

    <div class="col-md-7">
      <h3 class="text-center">Welcome to your Tasks <?php echo $_SESSION['username']; ?>
          <span class="small"><a href="logout.php?logout">Logout</a></span>
      </h3><?php

      if(!empty($task->showTasks())): 
      { ?>
        <form action="search.php" method="GET">
          <div class="form-group">
            <input class="form-control" type="text" name="keyword"
                   placeholder="Search by pressing enter key." />
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
            <tbody><?php
              foreach($task->showTasks() as $data):
              {
                if($data['status'] !== 'Pending'):
                { ?>
                      <tr>
                         <td><?php echo $data['title']; ?></td>
                         <td><?php echo $data['summary']; ?></td>
                         <td></td>
                         <td><a href="index.php?d_id=<?php echo $data['id']; ?>"
                                class="btn btn-danger">Delete</a></td>
                         <td></td>
                         <td><?php echo $data['datetime']; ?></td>
                         <td><?php echo $data['status']; ?></td>
                      </tr><?php
                } else:
                { ?>
                      <tr>
                        <td><?php echo $data['title']; ?></td>
                        <td><?php echo $data['summary']; ?></td>
                        <td><a href="edit.php?e_id=<?php echo $data['id']; ?>"
                               class="btn btn-primary">Edit</a></td>
                        <td><a href="index.php?c_id=<?php echo $data['id']; ?>"
                               class="btn btn-success">Mark as Complete</a></td>
                        <td><a href="index.php?d_id=<?php echo $data['id']; ?>"
                               class="btn btn-danger">Delete</a></td>
                        <td><?php echo $data['datetime']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                      </tr><?php
                } endif;
              } endforeach; ?>

              <ul class="pagination">
                <li><a href="?page=1">First</a></li>
                <li class="<?php if($task->pageno <= 1){echo 'disabled';} ?>">
                    &nbsp; | <a href="<?php
                      if($task->pageno <= 1) {echo '#';}
                      else {echo'?page='.($task->pageno-1);} ?>"> << </a>
                </li>

                <li class="<?php if($task->pageno >= $task->totalPages){echo 'disabled';} ?>">
                    &nbsp; | <a href="<?php
                    if($task->pageno >= $task->totalPages){echo '#';}
                    else{echo'?page='.($task->pageno+1);} ?>"> >> </a>
                </li>

                <li>&nbsp; | <a href="?page=<?php echo $task->totalPages;?>">Last </a></li>
              </ul>
            </tbody>
          </table>
        </div><!-- class="table-responsive" --><?php
      } else:
      { ?>
        <h4 class="text-center">No Task added yet! (home.php)</h4><?php
      } endif; ?>
    </div><!-- class="col-md-7" -->
  </div><!-- class="row" -->
</div><!-- class="container-fluid" -->
