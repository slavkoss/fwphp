<?php
declare(strict_types=1);
//J:\awww\www\fwphp\glomodul4\blog\categories.php


//namespace B12phpfw ; //FUNCTIONAL and POSITIONAL see below MODULE_&_ITS_DIR_NAME
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\post_category ;

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
if(isset($_POST["Submit"])) {
  //Tbl_crud_category::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
  Tbl_crud_category::cc( $pp1
    , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 


} //E n d  Submit Button If-Condition
//http://dev1:8083/fwphp/glomodul/post_category/categories.php#tbl
   //Fatal error: Uncaught Error: Class "B12phpfw\core\b12phpfw\Config_allsites" not found
   //utl::Redirect_to( dirname($pp1->module_url) .'/post_category/categories.php' ) ; 
// http://dev1:8083/fwphp/glomodul/blog/?i/categories/


//               2. R E A D  D B  T B L  R O W S
$cursor_category = Tbl_crud_category::rr_all( $pp1, $dmlrr='*', $qrywhere="'1'='1'", $binds=[]
   , $other=['caller' => __FILE__ .', ln '. __LINE__, 'filterfldval'=>''] );  //returns $cursor


//               3. G U I  (FRM) to get user action
    //$title = 'MSG Categories';
    //require $pp1->shares_path . '/hdr.php';  //require

                         //require("navbar.php");


?>








<main class="container">
  <!--div class="grid"-->



    <!-- Header 
    <header class="container">
    -->
        <?php
         //echo utl::M sgErr();  echo utl::M sgSuccess();
         echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
         ?>

      <!--hgroup>
        <h1>Pico</h1>
        <h2>A starter example with all elements and components used in Pico design system.</h2>
      </hgroup-->


      <details>
        <summary>Add Category</summary>
      <!--div-->

        <!--h4>Add C ategory</h4-->
        <form class="" action="<?=$pp1->categories?>" method="post">

            <div class="card-body bg-dark">
              <div>
                <label for="title"> <span class="FieldInfo"> Add Category Title: </span></label>
                 <input class="form-control" type="text" name="category_title" id="title"
                        placeholder="Type title here" value="">
              </div>

              <div>
                <div>
                  <a href="<?=$pp1->posts?>" class="btn btn-warning btn-block">
                  <i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                </div>
                <div>
                  <button type="submit" name="Submit" class="btn btn-success btn-block">
                    <i class="fas fa-check"></i> Publish
                  </button>
                </div>
              </div>
            </div>

        </form>

      <!--/div--><!-- E N D    Accordion 1 closed  d i v  o f  f o r m-->
      </details>

      <!--details open>
        <summary>Accordion 2</summary>
        <ul>
          <li>…</li>
          <li>…</li>
        </ul>
      </details-->

    <!-- ./ Header 
    </header>
    -->







  <!--div style="min-height:400px;"-->
    <section id="tables">
              <!-- ********************** -->
              <h2 class="bg-dark">Posts Categories</h2>
              <a name="tbl"></a>
              <!-- ********************** -->
    <figure>
        <table role="grid">
          <thead>
            <tr>
              <th scope="col">No. </th>
              <th scope="col">Date&amp;Time</th><th> Category Name</th>
              <th scope="col">Creator Name</th>
              <th scope="col">Action</th>
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

    </figure>
    </section>
  <!--/div--><!-- E N D  d i v  o f  t b l-->





      <details>
        <summary></summary>


  <!-- Tables &gt; -->
  <section id="tables">
    <h4>Tables tags : section id="tables, h4, figure, table role="grid", thead,
                  <br>tr, th scope="col" or th scope="row", td
    </h4>
    <figure>
      <table role="grid">
        <thead>
          <tr>
            <th scope="col"># th scope="col"</th>
            <th scope="col">Heading th scope="col"</th><th scope="col">H2</th><th scope="col">H3</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1 th scope="row"</th>
            <td>td Cell</td><td>td Cell</td><td>td Cell</td>
          </tr>
          <tr>
            <th scope="row">2 th scope="row"</th>
            <td>td Cell</td><td>td Cell</td><td>td Cell</td>
          </tr>
          <tr>
            <th scope="row">3 th scope="row"</th>
            <td>td Cell</td><td>td Cell</td><td>td Cell</td>
          </tr>
        </tbody>
      </table>
    </figure>
  </section><!-- ./ Tables -->


      </details>



  <!--/div--><!--  class="grid" -->

</main><!-- Main Area End -->


<?php //require $pp1->shares_path . '/ftr.php'; ?>

<!-- End Main Area 

-->
