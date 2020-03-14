<?php
//J:\awww\www\fwphp\glomodul4\blog\comments.php
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\dbadapter\post_comment ;
//use B12phpfw\module\blog\Home_ctr ;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];

?>
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-comments" style="color:#27aae1;"></i> Manage Comments</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->
    <!-- Main Area Start -->
    <section class="container py-2 mb-4">
      <div class="row" style="min-height:30px;">
        <div class="col-lg-12" style="min-height:400px;">
          <?php
           echo $this->ErrorMessage();
           echo $this->SuccessMessage();
           ?>

                     <h2>Un-Approved Comments</h2>

          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
   <th>No. </th><th>Date&Time</th><th>Name</th><th>Comment</th><th>Aprove</th><th>Action</th><th>Details</th>
              </tr>
            </thead>
          <?php
      $SrNo = 0;
            //http://www.mysqltutorial.org/mysql-null/
            $cursor = $this->rr("SELECT * FROM comments WHERE status='OFF' or status < '0' ORDER BY datetime desc", [], __FILE__ .' '.', ln '. __LINE__ ) ;
        while ($r = $this->rrnext($cursor))
        {
            $SrNo++;
          //all row fld names lowercase
          switch (self::getdbi())
          {
            case 'oracle' : $r = $this->rlows($r) ; break; 
            default: break;
          }
          ?>
          <tbody>
            <tr>
              <td><?php echo self::escp($SrNo); ?></td>
              <td><?php echo self::escp($r->datetime); ?></td>
              <td><?php echo self::escp($r->name); ?></td>
              <td><?php 
                switch (self::getdbi()) { case 'oracle' : echo self::escp($r->commenttxt); break; 
                  default: echo self::escp($r->comment); break; }
                ?>
              </td>

              <td>
              <a title="Set status=ON" 
                 href="<?=$pp1->upd_comment_stat?>id/<?=$r->id?>/stat/ON/"
                 class="btn btn-success">Approve</a>
              </td>

              <td>
                <a id="erase_row" class="btn btn-danger"
                   title = "Delete row id <?=$r->id?>"
                   onclick="var yes ; yes = jsmsgyn('Erase row <?=$r->id?>?','') ;
                    if (yes == '1') { location.href= '<?=$pp1->del_row?>t/comments/id/<?=$r->id?>/'; }"
                ><?=$r->id?></a>
              </td>

              <td style="min-width:140px;"> <a class="btn btn-primary"
                  title = "Show post id <?=$r->post_id?>"
                  href="<?=$pp1->read_post?>id/<?=$r->post_id?>" target="_blank">
                Post id <?=$r->post_id?></a>
              </td>
            </tr>
          </tbody>
          <?php
        } ?>





          </table>

                           <h2>Approved Comments</h2>

          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
           <th>No. </th><th>Date&Time</th><th>Name</th><th>Comment</th><th>Approved by</th><th>Revert</th>
                <th>Action</th>
                <th>Details</th>
              </tr>
            </thead>
          <?php
          $SrNo = 0;
            $cursor = $this->rr("SELECT * FROM comments WHERE status='ON' ORDER BY datetime desc", [], __FILE__ .' '.', ln '. __LINE__ ) ;
          while ($r = $this->rrnext($cursor))
          {
            $SrNo++;
            //all row fld names lowercase
            switch (self::getdbi())
            {
              case 'oracle' : $r = $this->rlows($r) ; break; 
              default: break;
            }
            ?>
            <tbody>
            <tr>
              <td><?php echo self::escp($SrNo); ?></td>
              <td><?php echo self::escp($r->datetime); ?></td>
              <td><?php echo self::escp($r->name); ?></td>
              <td><?php 
                switch (self::getdbi()) { case 'oracle' : echo self::escp($r->commenttxt); break; 
                  default: echo self::escp($r->comment); break; }
                ?>
              </td>
              <td><?php echo self::escp($r->approvedby); ?></td>
              <td style="min-width:140px;"> 
                 <a title="Set status=OFF" 
                    href="<?=$pp1->upd_comment_stat?>id/<?=$r->id?>/stat/OFF/"
                    class="btn btn-warning">
                    Dis-Appr. <?=$r->id?> </a>
              </td>
              <td>

              </td>
              <td style="min-width:140px;"> <a class="btn btn-primary"
                 href="<?=$pp1->read_post?>id/<?=$r->post_id?>" target="_blank">
                 Post <?=$r->post_id?></a> </td>
            </tr>
            </tbody>
          <?php
        } ?>
          </table>
        </div>
      </div>
    </section>
<!--  Main Area End 
                          //$sql = "S ELECT * FROM comments WHERE s tatus='ON' ORDER BY datetime desc";
                          //$this->p repareSQL($sql); $this->e xecute();;
                          //while ($r = $this->f etchNext()) 

                        //$sql = "S ELECT * FROM comments WHERE s tatus='O FF' or s tatus < '0' ORDER BY datetime desc";
                        //$this->p repareSQL($sql); $this->e xecute();;
                        //while ($r = $this->f etchNext()) 
-->
