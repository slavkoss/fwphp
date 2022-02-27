<?php
//J:\awww\www\fwphp\glomodul\post\Posts.php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');

//FUNCTIONAL, NOT POSITIONAL :
namespace B12phpfw\module\post ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
use B12phpfw\core\b12phpfw\Db_allsites        as utldb ;

use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_pcomment ;
use B12phpfw\dbadapter\post_category\Tbl_crud as Tbl_crud_pcategory ;
use B12phpfw\dbadapter\user\Tbl_crud          as Tbl_crud_user ;
//use PDO;
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];


class Posts extends utl
{
  public function __construct(object $pp1) 
  {
  }

  static public function show( object $pp1, array $other ): string 
  {
    $title = 'MSG Dashboard';
    require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");  //require_once("navbar_admin.php");
  ?>

  <!-- HEADER -->
  <!-- HEADER END -->


  <!-- Main Area -->
  <main class="container">
    <div class="grid">

      <section>
         <h4>Posts table (dashboard), order by recent</h4>


          <!-- S U M S  &  L I N K S -->
          <a title="Create post" class="contrast" href="<?=$pp1->addnewpost?>">Posts : 
              <?php echo Tbl_crud_post::rrcount( $qrywhere="'1'='1'"
                 , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ; //'posts'
          ?></a>

          &nbsp; &nbsp; &nbsp;
          <a title="Create comment" class="contrast" href="<?=$pp1->comments?>">Comments : 
              <?php echo Tbl_crud_pcomment::rrcount( $qrywhere="'1'='1'"
                 , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ); //'comments'
          ?></a>

          &nbsp; &nbsp; &nbsp;
          <a title="Create category" class="contrast" href="<?=$pp1->categories?>">Categories : 
              <?php echo Tbl_crud_pcategory::rrcount( $qrywhere="'1'='1'"
                  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ); //'category'
          ?></a>
          &nbsp; &nbsp; &nbsp
          <a title="Create admin" class="contrast" href="<?=$pp1->admins?>">Admins : 
              <?php echo Tbl_crud_user::rrcount( $qrywhere="'1'='1'"
                    , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ; //'admins'
          ?></a>
          <!-- E n d  s u m s -->



        <!-- T B L -->
        <div>
          <?php
          echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
           ?>
          <table>
            <thead><tr><th>No.</th><th>Title</th><th>Date&Time</th><th>Category</th><th>Author</th>
                  <th>Comments</th><th>Show</th></tr></thead>
            <tbody>
            <?php

            $SrNo = 0;
            $dbi = utldb::getdbi() ;
            switch ($dbi)
            {
              case 'oracle' :
                //$binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
                //$binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
                utldb::setdo_pgntion('1') ;

                $cursor_posts = Tbl_crud_post::get_cursor("SELECT * FROM posts ORDER BY datetime desc"
                  , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
              break;

              case 'mysql' :
                //$binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
                //$binds[]=['placeh'=>':rblk', 'valph'=>6, 'tip'=>'int'];
                utldb::setdo_pgntion('1') ;

                // LIMIT :first_rinblock, :rblk
                $cursor_posts = Tbl_crud_post::get_cursor($sellst='*'
                   , $qrywhere= "'1'='1' ORDER BY datetime desc"
                   , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
                ) ;
            }

          // isset($rx->id)   Tbl_crud_post::...
          while ( $rx = Tbl_crud_post::rrnext( $cursor_posts
             , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
          { //all row fld names lowercase
              $SrNo++;

              $rcnt_approved = Tbl_crud_pcomment::rrcount( 
                  $qrywhere="post_id=:id AND status=:status"
                , $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                         , ['placeh'=>':status', 'valph'=>'ON', 'tip'=>'str']
                ]
                , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

              $rcnt_disapproved = Tbl_crud_pcomment::rrcount( 
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
        </div><!-- E n d  T B L -->

      </section>

    </div><!--  class="grid" -->

  </main><!-- Main Area End -->


   <?php 
   require $pp1->shares_path . 'ftr.php';

    return('1') ;
  } //e n d  f n  s h o w
}  //e n d  c l s
