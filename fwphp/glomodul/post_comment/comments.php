<?php
//J:\awww\www\fwphp\glomodul4\blog\comments.php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_comment ;

use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;
//use B12phpfw\module\blog\Home_ctr ;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

//           1. S U B M I T E D  A C T I O N S


//               2. R E A D  D B T B L R O W S see below
//http://www.mysqltutorial.org/mysql-null/



//               3. G U I  (FRM) to get user action
?>
    <!-- HEADER -->
    <!--header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-comments" style="color:#27aae1;"></i> Manage Comments</h1>
          </div>
        </div>
      </div>
    </header-->
    <!-- HEADER END -->


    <!-- Main Area Start -->
<section class="container py-2 mb-4">
  <div class="row" style="min-height:30px;">


    <div class="bg-light col-lg-12" style="min-height:400px;">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
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
      $cursor_comments = Tbl_crud_post_comment::rr($sellst='*' 
        , $qrywhere="status='OFF' or status < '0' ORDER BY datetime desc"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
      ) ;
      $SrNo = 0;
      while ( $rcomment_disappr = Db_allsites::rrnext( $cursor_comments
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rcomment_disappr->rexists ):
      {
        $SrNo++; ?>
      <tbody>
        <tr>
          <td><?php echo self::escp($SrNo); ?></td>
          <td><?php echo self::escp($rcomment_disappr->datetime); ?></td>
          <td><?php echo self::escp($rcomment_disappr->name); ?></td>
          <td><?php 
            switch (Db_allsites::getdbi()) { 
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
      $cursor_comments = Tbl_crud_post_comment::rr($sellst='*' 
        , $qrywhere="status='ON' or status < '0' ORDER BY datetime desc"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
      ) ;
      $SrNo = 0;
      while ( $rcomment_appr = Db_allsites::rrnext( $cursor_comments
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
            switch (Db_allsites::getdbi()) {
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


    </div><!-- E N D  d i v  o f  t b l-->


  </div>

</section>
<!--  Main Area End 
                          //$sql = "S ELECT * FROM comments WHERE s tatus='ON' ORDER BY datetime desc";
                          //$this->p repareSQL($sql); $this->e xecute();;
                          //w hile ($rcom_approved = $this->f etchNext()) 

                        //$sql = "S ELECT * FROM comments WHERE s tatus='O FF' or s tatus < '0' ORDER BY datetime desc";
                        //$this->p repareSQL($sql); $this->e xecute();;
                        //while ($rcom_approved = $this->f etchNext()) 
-->
