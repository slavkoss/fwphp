<?php
// included in  class Controller fn render
?>
<h1>Tasks</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/MVC_todo/tasks/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
        <tr>
            <th>ID</th><th>Task</th><th>Description</th><th class="text-center">Action</th>
        </tr>
        </thead>

        <?php
        foreach ($tasks as $task)
        {
            ?>
            <tr>
            <td><?=$task['id']?></td>
            <td><?=$task['title']?></td>
            <td><?=$task['summary']?></td>
            <td class='text-center'>
            <a class='btn btn-info btn-xs' href='<?=$this->module_url?>tasks/edit/<?=$task["id"]?>'>
            <span class='glyphicon glyphicon-edit'></span> Edit <?=$task["id"]?></a>

            <a href='<?=$this->module_url?>tasks/delete/<?=$task["id"]?>' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>