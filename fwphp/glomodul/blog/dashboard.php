<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//J:\awww\www\fwphp\glomodul4\blog\dashboard.php
//FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//namespace B12phpfw ;
//namespace B12phpfw\dbadapter\user ;
use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_comment ;
use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
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
              echo Db_allsites::rrcount('posts') ; 
            ?>
          </h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Comments</h1>
          <h4 class="display-5"><i class="fas fa-comments"></i>
          <?=Db_allsites::rrcount('comments')?></h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Categories</h1>
          <h4 class="display-5"><i class="fas fa-folder"></i>
              <?=Db_allsites::rrcount('category')?>
          </h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Admins</h1>
          <!--  -->
          <h4 class="display-5"><i class="fas fa-users"></i>
               <?=Db_allsites::rrcount('admins')?></h4>
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
          <th>No.</th><th>Title</th><th>Date&Time</th><th>Category</th><th>Author</th><th>Comments</th><th>Show</th>
          </tr>
        </thead>
        <tbody>
        <?php

        $SrNo = 0;
      switch (Db_allsites::getdbi())
      {
        case 'oracle' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
          Db_allsites::setdo_pgntion('1') ;
          $cursor = Db_allsites::rr("SELECT * FROM posts ORDER BY datetime desc"
            , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
        break;
        case 'mysql' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':rblk', 'valph'=>6, 'tip'=>'int'];
          Db_allsites::setdo_pgntion('1') ;
          //$cursor = Db_ allsites::r r("SELECT * FROM posts ORDER BY datetime desc LIMIT :first_rinblock, :rblk", $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
          $cursor_posts = Tbl_crud_post::rr($sellst='*'
             , $qrywhere= "'1'='1' ORDER BY datetime desc LIMIT :first_rinblock, :rblk"
             , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
          ) ;
      }
      //while ($r = Db_ allsites::r rn ext($c ursor) and isset($r->id)):
      while ( $r = Tbl_crud_post::rrnext($cursor_posts) and isset($r->id) ): 
      { //all row fld names lowercase
          switch (Db_allsites::getdbi()) { case 'oracle' : $r = self::rlows($r) ; break; 
          default: break; } //echo '<h2>'.Db_allsites::getdbi(). d oes not exist'.'</h2>';
          $SrNo++;

          //c_, R_, U_, D_
          $cursor_rowcnt_comments = Tbl_crud_comment::rr($sellst='count(*) COUNT_ROWS'
            , $qrywhere="post_id=$r->id AND status='ON'"
            , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
          ) ;
          $Total_approved = Tbl_crud_comment::rrnext($cursor_rowcnt_comments)->COUNT_ROWS ;

          $cursor_rowcnt_comments = Tbl_crud_comment::rr($sellst='count(*) COUNT_ROWS'
            , $qrywhere="post_id=$r->id AND status='OFF'"
            , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
          ) ;
          $Total_disapproved = Tbl_crud_comment::rrnext($cursor_rowcnt_comments)->COUNT_ROWS ;
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
                 <a target="_blank" href="<?=$pp1->read_post?>id/<?=$r->id?>"
                    title="Preview post id <?=$r->id?>"
                 ><span class="btn btn-info"><?=$r->id?></span>
                   </a>
              </td>
            </tr>
          <?php 
        } endwhile; ?>
        </tbody>
      </table>

    </div>
    <!-- Right Side Area End -->

  </div>
</section>
<!-- Main Area End
                        //$sql = "S ELECT * FROM posts ORDER BY datetime desc LIMIT 0,6";
                        //Db_allsites::p repareSQL($sql); Db_allsites::e xecute();;
                        //while ($r = Db_allsites::f etchNext()) 
 -->


<?php //require_once($this->p p1->wsroot_path.'zinc/ftr.php'); ?>

