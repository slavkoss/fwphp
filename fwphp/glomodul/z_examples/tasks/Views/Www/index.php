<h1>Tasks</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead> <!-- /MVC_todo/tasks/create/ -->

        <a href= "<?=QS?>create/" 
           class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>

        <tr>
          <th>ID</th><th>Task</th><th>Description</th><th class="text-center">Action</th>
        </tr>

        </thead>
        <?php
        ///MVC_todo/tasks/edit/
        foreach ($tasks as $task)
        {
            ?><tr>
            <td><?=$task['event_id']?></td>
            <td><?=$task['event_title']?></td>
            <td><?=$task['event_desc']?></td>

            <td class='text-center'>
            
            <a class='btn btn-info btn-xs' href="<?=QS?>edit/<?=$task["event_id"]?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>

            <a href="<?=QS?>delete/<?=$task['event_id']?> "
               class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>