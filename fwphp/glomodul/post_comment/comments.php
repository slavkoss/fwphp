<?php
//J:\awww\www\fwphp\glomodul4\blog\comments.php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_comment ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ;
use B12phpfw\core\b12phpfw\Db_allsites        as utldb ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_pcomment ;
//use B12phpfw\module\blog\Home_ctr ;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

//           1. S U B M I T E D  A C T I O N S


//               2. R E A D  D B T B L R O W S see below
//http://www.mysqltutorial.org/mysql-null/



//               3. G U I  (FRM) to get user action
    $title = 'Comments';
    require_once $pp1->shares_path . 'hdr.php';  //require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");
?>
    <!-- HEADER -->
    <!-- HEADER END -->

     <!-- Main Area -->
<main class="container">
  <div class="grid">

    <section>
      <!--h4>Manage Comments</h4-->
      <?php
       echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
       ?>

            <!-- ********************** -->
            <br /><h2 class="bg-dark">Un-Approved Comments</h2>
            <!-- ********************** -->

      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No. </th><th>Date&Time</th><th>Name</th><th>Comment</th><th>Appr</th><th>Del</th><th>Post</th>
          </tr>
        </thead>
      <?php
      $cursor_comments = Tbl_crud_pcomment::get_cursor($sellst='*' 
        , $qrywhere="status='OFF' or status < '0' ORDER BY datetime desc"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
      ) ;
      $SrNo = 0;
      while ( $rcomment_disappr = utldb::rrnext( $cursor_comments
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rcomment_disappr->rexists ):
      {
        $SrNo++; ?>
      <tbody>
        <tr>
          <td><?php echo self::escp($SrNo); ?></td>
          <td><?php echo self::escp($rcomment_disappr->datetime); ?></td>
          <td><?php echo self::escp($rcomment_disappr->name); ?></td>
          <td><?php 
            switch (utldb::getdbi()) { 
              case 'oracle' : echo self::escp($rcomment_disappr->commenttxt); break; 
              default: echo self::escp($rcomment_disappr->comment); break; 
            }
            ?>
          </td>

          <!-- Approve -->
          <td>
          <a title="Set status=ON" 
             href="<?=$pp1->upd_comment_stat?>id/<?=$rcomment_disappr->id?>/stat/ON/"
             class="btn btn-success"><?=$rcomment_disappr->id?></a>
          </td>

          <td>
            <a id="erase_row" class="btn btn-danger"
               title = "Delete row id <?=$rcomment_disappr->id?>"
               onclick="var yes ; yes = jsmsgyn('Erase row <?=$rcomment_disappr->id?>?','') ;
                if (yes == '1') { location.href= '<?=$pp1->ldd_comments.$rcomment_disappr->id?>/'; }"
            ><?=$rcomment_disappr->id?></a>
          </td>
          <!-- See Post -->
          <td style="min-width:140px;"> <a class="btn btn-primary"
              title = "Show post id <?=$rcomment_disappr->post_id?>"
              href="<?=$pp1->read_post?>id/<?=$rcomment_disappr->post_id?>" target="_blank">
                    <?=$rcomment_disappr->post_id?></a>
          </td>
        </tr>
      </tbody>
      <?php
      } endwhile; ?>

      </table>




            <!-- ********************** -->
             <h2 class="bg-dark">Approved Comments</h2>
            <!-- ********************** -->

      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
       <th>No. </th><th>Date&Time</th><th>Name</th><th>Comment</th><th>ApprBy</th><th>Disapp</th><th></th><th>Post</th>
          </tr>
        </thead>
      <?php
      $cursor_comments = Tbl_crud_pcomment::get_cursor($sellst='*' 
        , $qrywhere="status='ON' or status < '0' ORDER BY datetime desc"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
      ) ;
      $SrNo = 0;
      while ( $rcomment_appr = utldb::rrnext( $cursor_comments
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rcomment_appr->rexists ):
      {
        $SrNo++;
        ?>
        <tbody>
        <tr>
          <td><?php echo self::escp($SrNo); ?></td>
          <td><?php echo self::escp($rcomment_appr->datetime); ?></td>
          <td><?php echo self::escp($rcomment_appr->name); ?></td>
          <td><?php 
            switch (utldb::getdbi()) {
              case 'oracle' : echo self::escp($rcomment_appr->commenttxt); break; 
              default: echo self::escp($rcomment_appr->comment); break; 
            }
            ?>
          </td>
          <td><?php echo self::escp($rcomment_appr->approvedby); ?></td>
          <!-- DisAprove -->
          <td style="min-width:140px;"> 
             <a title="Set status=OFF" 
                href="<?=$pp1->upd_comment_stat?>id/<?=$rcomment_appr->id?>/stat/OFF/"
                class="btn btn-warning"> <?=$rcomment_appr->id?> </a>
          </td>

          <td>

          </td>
          <!-- go to Post page -->
          <td style="min-width:140px;"> <a class="btn btn-primary"
             href="<?=$pp1->read_post?>id/<?=$rcomment_appr->post_id?>" target="_blank">
                 <?=$rcomment_appr->post_id?></a> </td>
        </tr>
        </tbody>
      <?php
      } endwhile; ?>
      </table>


    </section>

  </div><!--  class="grid" -->

</main><!-- Main Area End -->


<?php require $pp1->shares_path . 'ftr.php'; ?>


<!--
                          //$sql = "S ELECT * FROM comments WHERE s tatus='ON' ORDER BY datetime desc";
                          //$this->p repareSQL($sql); $this->e xecute();;
                          //w hile ($rcom_approved = $this->f etchNext()) 

                        //$sql = "S ELECT * FROM comments WHERE s tatus='O FF' or s tatus < '0' ORDER BY datetime desc";
                        //$this->p repareSQL($sql); $this->e xecute();;
                        //while ($rcom_approved = $this->f etchNext()) 
-->
