<?php
    $QueryTotal=get_cursor("SELECT COUNT(*) FROM comments WHERE status='OFF'");
    $RowsTotal=$QueryTotal->fetch(PDO::FETCH_ASSOC);
    $Total_comments=array_shift($RowsTotal);

                       //echo '<pre><b>mnuitms=</b>='; print_r($active); echo '</pre>';
?>


  <div class="col-sm-2">
  <br><br>

  <ul id="Side_Menu" class="nav nav-pills nav-stacked">


  <li class="<?=$active === 'dashboard' ? 'active' : '' ?>">
  <a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span> &nbsp;Dashboard</a></li>

  <li class="<?=$active === 'addnewpost' ? 'active' : '' ?>">
  <a href="AddNewPost.php"> <span class="glyphicon glyphicon-list-alt"></span> &nbsp;Add New Post</a></li>

  <li class="<?=$active === 'comments' ? 'active' : '' ?>">
  <a href="Comments.php"><span class="glyphicon glyphicon-comment"></span> &nbsp;Comments
        <?php
        if($Total_comments>0){ ?>
          <span class="label pull-right label-warning"><?=$Total_comments?></span>
        <?php } ?>
      </a>  
  </li>

  <li class="<?=$active === 'categories' ? 'active' : '' ?>">
  <a href="Categories.php"><span class="glyphicon glyphicon-tags"></span> &nbsp;Categories   </a></li>

  <li class="<?=$active === 'admins' ? 'active' : '' ?>">
  <a href="Admins.php"><span class="glyphicon glyphicon-user"></span> &nbsp;Admins</a></li>




  <hr>
  <li><a href="index.php?Page=1" target="_Blank"><span class="glyphicon glyphicon-equalizer"></span> &nbsp;Live Blog</a></li>

  <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>
      &nbsp;Logout</a></li>  


       
  </ul>
  
  
  </div> <!-- Ending of Side area -->