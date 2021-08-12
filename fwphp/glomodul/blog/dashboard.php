<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//J:\awww\www\fwphp\glomodul4\blog\dashboard.php
//FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//namespace B12phpfw ;
//namespace B12phpfw\dbadapter\user ;
use B12phpfw\core\zinc\Db_allsites as utldb ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;
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


     <!-- S U M S  - Left Side Area Start -->
    <div class="col-lg-2 d-none d-md-block">
      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Posts</h1>
          <h4 class="display-5"><i class="fab fa-readme"></i>
            <?php 
              echo utldb::rrcount('posts') ; 
            ?>
          </h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Comments</h1>
          <h4 class="display-5"><i class="fas fa-comments"></i>
          <?=utldb::rrcount('comments')?></h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Categories</h1>
          <h4 class="display-5"><i class="fas fa-folder"></i>
              <?=utldb::rrcount('category')?>
          </h4>
        </div>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h1 class="lead">Admins</h1>
          <!--  -->
          <h4 class="display-5"><i class="fas fa-users"></i>
               <?=utldb::rrcount('admins')?></h4>
        </div>
      </div>


    </div>
    <!-- Left Side Area E n d  s u m s-->



    <!-- T B L  - Right Side Area Start -->
    <div class="bg-light col-lg-10">
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
      $dbi = utldb::getdbi() ;
      switch ($dbi)
      {
        case 'oracle' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
          utldb::setdo_pgntion('1') ;

          $cursor = utldb::rr("SELECT * FROM posts ORDER BY datetime desc"
            , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
        break;

        case 'mysql' :
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
          $binds[]=['placeh'=>':rblk', 'valph'=>6, 'tip'=>'int'];
          utldb::setdo_pgntion('1') ;

          $cursor_posts = Tbl_crud_post::rr($sellst='*'
             , $qrywhere= "'1'='1' ORDER BY datetime desc LIMIT :first_rinblock, :rblk"
             , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
          ) ;
      }

      // isset($rx->id)   Tbl_crud_post::...
      while ( $rx = utldb::rrnext( $cursor_posts
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
      { //all row fld names lowercase
          $SrNo++;

          $rcnt_approved = Tbl_crud_post_comment::rrcount( 
              $qrywhere="post_id=:id AND status=:status"
            , $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                     , ['placeh'=>':status', 'valph'=>'ON', 'tip'=>'str']
            ]
            , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

          $rcnt_disapproved = Tbl_crud_post_comment::rrcount( 
              $qrywhere="post_id=:id AND status=:status"
            , $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                     , ['placeh'=>':status', 'valph'=>'OFF', 'tip'=>'str']
            ]
            , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

          ?>

            <tr>
              <td><?=$SrNo?></td><td><?=$rx->title?></td><td><?=$rx->datetime?></td>
              <td><?=$rx->category?></td><td><?=$rx->author?></td>
              <td>
                <?php
                if ($rcnt_approved > 0) { ?>
                   <span class="badge badge-success"><?=$rcnt_approved?></span><?php }
                ?>
                <?php
                if ($rcnt_disapproved > 0) { ?>
                   <span class="badge badge-danger"><?=$rcnt_disapproved?></span><?php }
                ?>
              </td>
              <td> 1
                 <a target="_blank" href="<?=$pp1->read_post?>id/<?=$rx->id?>"
                    title="Preview post id <?=$rx->id?>"
                 ><span class="btn btn-info"><?=$rx->id?></span>
                   </a>
              </td>
            </tr>
          <?php 
        } endwhile; ?>
        </tbody>
      </table>

    </div><!-- Right Side Area E n d  t b l -->

  </div>
</section>
<!-- Main Area End
                        //$sql = "S ELECT * FROM posts ORDER BY datetime desc LIMIT 0,6";
                        //utldb::p repareSQL($sql); utldb::e xecute();;
                        //while ($rx = utldb::f etchNext()) 
 -->


<?php //require_once($this->p p1->shares_path.'ftr.php'); ?>

