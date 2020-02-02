<?php
//J:\awww\www\fwphp\glomodul4\blog\dashboard.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//use PDO;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
?>
<!-- HEADER -->
<header class="bg-dark text-white py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <h1><i class="fas fa-cog" style="color:#27aae1;"></i> Dashboard</h1>
      </div>
          <?php require('navbar_admin2.php'); ?>
    </div>
  </div>
</header>
<!-- HEADER END -->



<!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">


     <!-- Left Side Area Start -->
    <div class="col-lg-2 d-none d-md-block">
      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Posts</h1>
          <h4 class="display-5"><i class="fab fa-readme"></i>
            <?php 
              echo $this->rrcount('posts') ; //read1_ or_get_c('1', $this, 'posts')->COUNT_ROWS
              //or : $c_r = $this->R_ get_crs('1', $this, 'posts') ; //->COUNT_ROWS
              //while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
              //echo $r->COUNT_ROWS ;
            ?>
          </h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Comments</h1>
          <h4 class="display-5"><i class="fas fa-comments"></i>
          <?=$this->rrcount('comments')?></h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Categories</h1>
          <h4 class="display-5"><i class="fas fa-folder"></i>
              <?=$this->rrcount('category')?>
          </h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Admins</h1>
          <!-- $this->R_ get_crs('1', $this, 'admins')->COUNT_ROWS -->
          <h4 class="display-5"><i class="fas fa-users"></i>
               <?=$this->rrcount('admins')?></h4>
        </div>
      </div>


    </div>
    <!-- Left Side Area End -->


    <!-- Right Side Area Start -->
    <div class="col-lg-10">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>
      <h1>Latest posts</h1>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
          <th>No.</th><th>Title</th><th>Date&Time</th><th>Category</th><th>Author</th><th>Comments</th><th>Details</th>
          </tr>
        </thead>
        <tbody>
        <?php

        $SrNo = 0;
      switch (self::$dbi)
      {
        case 'oracle' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
          self::$do_pgntion = '1';
          //$cursor = $this->r r('', $this, 'posts', "'1'='1' ORDER BY datetime desc", '*',$binds, __FILE__ .', line '. __LINE__  ) ; 
          $cursor = $this->rr("SELECT * FROM posts ORDER BY datetime desc", $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
        break;
        case 'mysql' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':rblk', 'valph'=>6, 'tip'=>'int'];
          self::$do_pgntion = '1';
          $cursor = $this->rr("SELECT * FROM posts ORDER BY datetime desc LIMIT :first_rinblock, :rblk", $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
      }
      while ($r = $this->rrnext($cursor))
        { //all row fld names lowercase
          switch (self::$dbi) { case 'oracle' : $r = self::rlows($r) ; break; 
          default: break; } //echo '<h2>'. self::$dbi .' d oes not exist' . '</h2>';
          $SrNo++;
          //$c_r   = $this->r r('1', $this, 'comments', "post_id=$r->id AND status='ON'",) ; //c=cursor
          $c_r = $this->rr("SELECT count(*) COUNT_ROWS FROM comments WHERE post_id=$r->id AND status='ON'", [], __FILE__ .' '.', ln '. __LINE__ ) ;
          while ($row = $this->rrnext($c_r)): {$rcnt = $row ;} endwhile; //c_, R_, U_, D_
          $Total_approved = $rcnt->COUNT_ROWS ;
          //$c_r   = $this->r r('1', $this, 'comments', "post_id=$r->id AND (status='OFF' or status < '0')",) ; //c=cursor
          $c_r = $this->rr("SELECT count(*) COUNT_ROWS FROM comments WHERE post_id=$r->id AND status='OFF'", [], __FILE__ .' '.', ln '. __LINE__ ) ;
          while ($row = $this->rrnext($c_r)): {$rcnt = $row ;} endwhile; //c_, R_, U_, D_
          $Total_disapproved = $rcnt->COUNT_ROWS ;
          ?>
            <tr>
              <td><?=$SrNo?></td><td><?=$r->title?></td><td><?=$r->datetime?></td>
              <td><?=$r->category?></td><td><?=$r->author?></td>
              <td>
                <?php
                if ($Total_approved > 0) { ?>
                   <span class="badge badge-success"><?=$Total_approved?></span><?php }
                ?>
                <?php
                if ($Total_disapproved > 0) { ?>
                   <span class="badge badge-danger"><?=$Total_disapproved?></span><?php }
                ?>
              </td>
              <td> 
                 <a target="_blank" href="<?=$this->pp1->read_post?>id/<?=$r->id?>">
                    <span class="btn btn-info">Preview <?=$r->id?></span>
                   </a>
              </td>
            </tr>
          <?php 
        } ?>
        </tbody>
      </table>

    </div>
    <!-- Right Side Area End -->

  </div>
</section>
<!-- Main Area End
                        //$sql = "S ELECT * FROM posts ORDER BY datetime desc LIMIT 0,6";
                        //$this->p repareSQL($sql); $this->e xecute();;
                        //while ($r = $this->f etchNext()) 
 -->


<?php //require_once($this->pp1->wsroot_path.'zinc/ftr.php'); ?>

