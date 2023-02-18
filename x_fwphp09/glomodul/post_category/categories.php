<?php
declare(strict_types=1);
//J:\awww\www\fwphp\glomodul4\blog\categories.php

//namespace B12phpfw ; //FUNCTIONAL and POSITIONAL see below MODULE_&_ITS_DIR_NAME
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_category ;

use B12phpfw\core\b12phpfw\Config_allsites     as utl ;
use B12phpfw\core\b12phpfw\Db_allsites         as utldb ;
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;

//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
                if ('') { $tbl_o = new Tbl_crud ;
                    self::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                         .', line '. __LINE__ .' SAYS'=>'rr_last_id '
                   ,'$id'=>$tbl_o->rr_last_id($dm)
                ] ) ; }

//           1. S U B M I T E D  A C T I O N S
//$tbl_o = new Tbl_crud ; //Db_post_category
if(isset($_POST["Submit"])) {
  // returns string
  Tbl_crud_category::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  Submit Button If-Condition

//               2. R E A D  D B  T B L  R O W S
$cursor_category = Tbl_crud_category::rr_all( $sellst='*', $qrywhere="'1'='1'", $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__, 'filterfldval'=>''] );  //returns $cursor


//               3. G U I  (FRM) to get user action
    $title = 'MSG Categories';
    require_once $pp1->shares_path . 'hdr.php';  //require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");
?>

<main class="container">
  <div class="grid">

    <section>

      <div>
        <?php
         //echo utl::M sgErr();  echo utl::M sgSuccess();
         echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
         ?>

        <!--h4>Add Category</h4-->

        <form class="" action="<?=$pp1->categories?>" method="post">

            <div class="card-body bg-dark">
              <div>
                <label for="title"> <span class="FieldInfo"> Add Category Title: </span></label>
                 <input class="form-control" type="text" name="category_title" id="title"
                        placeholder="Type title here" value="">
              </div>

              <div>
                <div>
                  <a href="<?=$pp1->dashboard?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                </div>
                <div>
                  <button type="submit" name="Submit" class="btn btn-success btn-block">
                    <i class="fas fa-check"></i> Publish
                  </button>
                </div>
              </div>
            </div>

        </form>

      </div><!-- E N D  d i v  o f  f o r m-->

      <div style="min-height:400px;">
              <!-- ********************** -->
              <br /><h2 class="bg-dark">Existing Categories</h2>
              <!-- ********************** -->
        <table>
          <thead>
            <tr><th>No. </th><th>Date&amp;Time</th><th> Category Name</th><th>Creator Name</th><th>Action</th>
            </tr>
          </thead>
          <tbody>
        <?php

        $SrNo = 0;
        while ( $rx = utldb::rrnext( $cursor_category
           , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
        {
          $SrNo++;
          ?>
          <tr>
            <td><?=$SrNo?></td>
            <td><?php echo self::escp($rx->datetime); ?></td>
            <td><?php echo self::escp($rx->title); ?></td>
            <td><?php echo self::escp($rx->author); ?></td>
            <td>
             <!--  /*
                location.href= '<=$pp1->del_row>t/category/id/<=$rx->id>/'
                r/i|/
             */ -->
             <a id="erase_row" class="btn btn-danger"
                onclick="var yes ; yes = jsmsgyn('Erase row <?=$rx->id?>?','') ;
                if (yes == '1') { location.href= '<?=$pp1->ldd_category.$rx->id?>/'; }"
              >Del <?=$rx->id?></a>
            </td> <?php
        } endwhile; ?>
        </tbody>
        </table>

      </div><!-- E N D  d i v  o f  t b l-->

    </section>

  </div><!--  class="grid" -->

</main><!-- Main Area End -->


<?php require $pp1->shares_path . 'ftr.php'; ?>

<!-- End Main Area 
                          /*$sql = "INSERT INTO category(title,author,datetime)";
                          $sql .= "VALUES(:categoryName,:adminname,:dateTime)";
                          $dm->p repareSQL($sql); 
                          $dm->b indvalue(':categoryName', $Category, \PDO::PARAM_STR);
                          $dm->b indvalue(':adminname', $Admin, \PDO::PARAM_STR);
                          $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
                          $dm->b indvalue(':dateTime', $DateTime, \PDO::PARAM_STR);
                          $cursor = $dm->e xecute();*/
-->
