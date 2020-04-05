<?php
  // J:\awww\www\fwphp\glomodul\z_examples\tasks\Views\Layouts\default.php

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\tasks ;
use B12phpfw\module\dbadapter\tasks\Tbl_crud as Tbl_crud_post;
//use B12phpfw\module\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment;

//               2. R E A D  D B T B L R O W S
//no sense to put this in controller (Home_ctr) because details cursor can not be there ! :
$tbl_o_post = new Tbl_crud_post ;
$c_posts = $tbl_o_post->rr_all($this, ''); //$dm, $category_from_url
?>
    <style>
        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">MVC Todo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">






        <?php //echo $content_for_layout; ?>
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
        ///MVC_todo/tasks/edit/       //foreach ($tasks as $task) {
        while ($r = $this->rrnext($c_posts)): 
        {
            ?><tr>
            <td><?=$r->id?></td>

            <td>
              <a href="<?=QS?>edit/<?=$r->id?>">
                 <span class="glyphicon glyphicon-edit"></span><?=$r->title?></a>
            </td>

            <td><?=$r->summary?></td>

            <td class='text-center'>
            <!--a class='btn btn-info btn-xs' href="<?=QS?>edit/<?=$r->id?>">
               <span class="glyphicon glyphicon-edit"></span> Edit</a-->

            <a href="<?=QS?>delete/<?=$r->id?>"
               class="btn btn-danger btn-xs">
               <span class="glyphicon glyphicon-remove"></span> Del <?=$r->id?></a>
            </td>

            </tr>
            <?php
        } endwhile; //c_, R_, U_, D_
        ?>  <!--  Ending of  W h i l e  l o o p -->
    </table>
</div>






    </div>

</main>

