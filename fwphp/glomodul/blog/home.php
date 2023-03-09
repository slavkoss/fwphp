<?php
// J:\awww\www\fwphp\glomodul\blog\Home.php 
// caled from Home_ ctr so : Home::displ($pp1) ; 
//https://startbootstrap.com/template/blog-post  https://startbootstrap.com/previews/blog-post
//https://getbootstrap.com/docs/5.1/components/collapse/

declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');

namespace B12phpfw\module\blog ;

//use B12phpfw\core\b12phpfw\Db_allsites_Intf ;
//use B12phpfw\core\b12phpfw\Db_allsites as utldb ; //(NOT HARD CODED) SHARED DBADAPTER

use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;

use B12phpfw\module\blog\Home                 as Home_view;
use B12phpfw\module\blog\Side_area            as Side_view;

class Home extends utl
{
  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER






  //self is used to access static or class variables or methods
  //this is used to access non-static or object variables or methods
  public function __construct(object &$pp1) { //, Db_allsites_Intf $utldb
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
  }



  static public function navbar_top( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
  <div class="hero" data-theme="dark">

    <nav class="container-fluid">
        <ul>
          <li><a href="<?=$pp1->sitehome?>" class="contrast"><strong>Sitehome</strong></a></li>
        </ul>

        <ul>
          <?php //if(empty($_SESSION['username'])) { ?>
          <li><a title="Paginated posts with summary" class="contrast" href="index.php">Home</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->kalendar?>">Calendar</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->about?>">About</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->features?>">Module</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->contact?>">Contact</a></li>
          <?php  //} ?>



          <?php if(!empty($_SESSION['username'])){ ?>
             &nbsp; 
             <li><a title="Posts" class="contrast" 
                    href="<?=$pp1->posts?>">Dashboard</a></li>
             <li><a class="contrast" href="<?=$pp1->logout?>">Logout</a></li>

          <?php }else{  ?>
             <li><a class="contrast" href="<?=$pp1->login?>">Login</a></li>
          <?php  } ?>



        </ul>
    </nav>


  </div><!-- ./ Hero -->

<!-- N AVBAR END -->

    <?php
    return('1') ;
  } //e n d  f n  n a v b a r






  static public function displ_tbl( object &$pp1, array $other ): string 
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
    
    if (isset($pp1->category_from_url)) $category_from_url  = $pp1->category_from_url ;
    else $category_from_url  = '' ;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      //echo '<br />$ u r i q='; print_r($pp1->uriq) ;
                      //echo '<br />$_POST='; print_r($_POST) ;
                      echo '<br />$pp1='; print_r($pp1) ;
                      //echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                      //echo 'For pagination (not for c o u n t !!) $qrywhere='; print_r($qrywhere) ;
                      //echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    //exit(0) ;
                    echo '</pre>'; }
    //P A G I N A T O R  step 2. is click page in n avbar, read page  (step 1. Create navigation bar)
    //if (isset($pp1->uriq->p) and null !== $pp1->uriq->p) {
    if (isset($pp1->urlqry_parts[3]) and null !== $pp1->urlqry_parts[3]) {
      $_SESSION['filter_posts']['pgordno_from_url']  = (int)$pp1->urlqry_parts[3] ;
    } else {
      if (!isset($_SESSION['filter_posts']['pgordno_from_url'])) {
        $_SESSION['filter_posts']['pgordno_from_url']  = 1 ;
      }
    }

    if (isset($pp1->uriq->c) and null !== $pp1->uriq->c) {
       $_SESSION['filter_posts']['category_from_url'] = $pp1->uriq->c ;
       $_SESSION['filter_posts']['pgordno_from_url'] = 1 ;
    } else {
      if (!isset($_SESSION['filter_posts']['category_from_url'])) {
        $_SESSION['filter_posts']['category_from_url']  = '' ;
      }
    }

    if ( isset($_POST["SearchButton"]) and isset($_POST["Search"]) 
    ) {
       $_SESSION['filter_posts']['search_from_submit'] = $_POST["Search"] ;
       $_SESSION['filter_posts']['pgordno_from_url'] = 1 ;
    } else {
      if (!isset($_SESSION['filter_posts']['search_from_submit'])) {
        $_SESSION['filter_posts']['search_from_submit']  = '' ;
      }
    } 


    // 3 types of filter :
    $pgordno_from_url   = $_SESSION['filter_posts']['pgordno_from_url'] ;
    $category_from_url  = $_SESSION['filter_posts']['category_from_url'] ;
    $search_from_submit = $_SESSION['filter_posts']['search_from_submit'] ; //from $_POST

    if($pgordno_from_url == 0 or $pgordno_from_url < 1){ $row_ordno = 0;
    } else{ $row_ordno = ($pgordno_from_url * $pp1->rblk) - $pp1->rblk; }

    $qrywhere = "'1'='1'" ;
    $binds = [] ;
    if( $search_from_submit ) 
    {
      $qrywhere .= " and (title LIKE :search1
            OR category LIKE :search2
            OR datetime LIKE :search3
            OR img_desc LIKE :search4
            OR summary LIKE :search5
            )" ; //OR post LIKE :search
      $binds[]=['placeh'=>':search1', 'valph'=>'%'.$search_from_submit.'%', 'tip'=>'str'];
      $binds[]=['placeh'=>':search2', 'valph'=>'%'.$search_from_submit.'%', 'tip'=>'str'];
      $binds[]=['placeh'=>':search3', 'valph'=>'%'.$search_from_submit.'%', 'tip'=>'str'];
      $binds[]=['placeh'=>':search4', 'valph'=>'%'.$search_from_submit.'%', 'tip'=>'str'];
      $binds[]=['placeh'=>':search5', 'valph'=>'%'.$search_from_submit.'%', 'tip'=>'str'];
    }

    if( $category_from_url ) {
      $qrywhere .= ' and category = :category_from_url' ;
      $binds[]  =['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str'];
    }

                    if ('') 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                        echo 'For c o u n t !! $qrywhere='; print_r($qrywhere) ;
                        echo '<br />$binds='; print_r($binds) ;
                      //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                      echo '</pre>';
                      exit(0) ;
                    }
    $rcnt_filtered_posts = Tbl_crud_post::rrcount( $pp1, $qrywhere, $binds, $other=
       ['caller' => __METHOD__ .' '.', ln '. __LINE__ ] ) ;



    //P A G I N A T O R  step 1. Create navigation bar (step 2. is click page in n avbar, read page)
    $pgn_links = self::get_pgnnav($pp1->urlqry_parts, $rcnt_filtered_posts, 'i/home/', $pp1->rblk);
                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$pgn_links ='; print_r($pgn_links) ;
                      echo '</pre>';
                      exit(0) ;
                    }
    //echo $pgn_links['navbar'];
    $pgnnavbar        = $pgn_links['navbar'];
    $pgordno_from_url = (int)$pgn_links['pgordno_from_url'];
    $first_rinblock   = (int)$pgn_links['first_rinblock'];
    $last_rinblock    = (int)$pgn_links['last_rinblock'];

    if( $pgordno_from_url ) {
          $qrywhere .= " ORDER BY datetime desc LIMIT :first_rinblock, :rblk" ;
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>$row_ordno, 'tip'=>'int'];
          $binds[]=['placeh'=>':rblk', 'valph'=>$pp1->rblk, 'tip'=>'int'];

      
    }

                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      //shared_dbadapter_obj = B12phpfw\core\b12phpfw\Db_allsites Object
                      echo '$pp1 ='; print_r($pp1) ; 
                      echo 'self::$utldb ='; print_r(self::$utldb) ; 
                      echo '$pgn_links ='; print_r($pgn_links) ; 
                      //echo 'ses filter_ posts ='; print_r($_SESSION['filter_posts']) ;
                      //echo 'For pagination (not for c o u n t !!) $qrywhere='; print_r($qrywhere) ;
                      //echo '<br />$binds='; print_r($binds) ;
                          ////echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }

    self::$utldb::setdo_pgntion('1') ; 
    $cursor_posts = Tbl_crud_post::get_cursor( $pp1 // new in ver. 10.0.3.0
      , $dmlrr='*'
      , $qrywhere //="'1'='1'"
      , $binds //=[]
      , $other=['caller' => __METHOD__ .' '.', ln '. __LINE__ ] );





    //$title = 'MSG HOME';
    //require_once $pp1->shares_path . '/hdr.php';  //require $pp1->shares_path . '/hdr.php';
    //Home_view::navbar_top($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]); 
                                       //require_once("n avbar.php");
    ?>


  <!-- Page content CENTER-->
    <!-- Main -->
    <main class="container">
      <div class="grid">

        <section>
          <!-- Left pge content-->

          <?php
          self::show_pge_hdr( $pp1, $pgn_links ) ;
                              //, $category_from_url, $search_from_submit, $pgordno_from_url



          $ordno = 0 ;
  while ( $rx = Tbl_crud_post::rrnext( $cursor_posts // u tldb::r rnext
             , $other=['caller' => __METHOD__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
  {
            ++$ordno ;
                          if ('') //if ($autoload_arr['dbg']) 
                          { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                            echo '<pre>' ; 
                              echo '$rx='; print_r($rx) ;
                            //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                            echo '</pre>'; 
                          }
            ?>





    <!-- P o s t  c o n t e n t    class="text-muted fst-italic mb-2"-->
              <?php
              /*self::show_post_ttle($pp1, $rx, $first_rinblock, $ordno) ;
              self::show_post_meta($pp1, $rx, $first_rinblock, $ordno) ;
              self::show_post_summary($pp1, $rx) ;
              self::show_post_img($pp1, $rx) ; */
              ?>
    <div style="border: 1px solid rgb(51, 51, 51); padding: 12px 12px 0px; margin: 40px 0px 20px;">
       <!-- ======================================
       1. P o s t  t i t l e 
             h3 style="margin: 0px;  background: rgb(230, 243, 255) ; width: 100%; "
              #93ACC8 #9394C8 #AFB7C8   lightblue lightgray, darkblue
       =========================================== -->
       <h5 style="margin: 0px;  color: rgb(40, 109, 193);  background: #93ACC8 ;
       =========================================== -->; 
                 width: 100%; ">
           <?=self::escp($rx->title)?></h5>


        <?php
        //<!-- ======================================
        //<!-- 2. P o s t  m e t a  c o n t e n t-->
        // =========================================== -->

        echo //'<br><br><br>'. 
          str_replace('!', "&nbsp;", 
          //str_pad( 
             (string) ($first_rinblock + $ordno - 1)
          //   , 6, '!', STR_PAD_LEFT
          //) 
        ) .'. ' ;
        ?>
          &nbsp; 
          <!-- eg: Posted on January 1, 2021 by Start Bootstrap -->
        <a href="<?=$pp1->filter_postcateg?><?=self::escp($rx->category)?>/p/1">
           <?=self::escp($rx->category)?> </a>

        Written by 
                <a href="<?=$pp1->read_user?>username/<?=self::escp($rx->author)?>">
                   <?=self::escp($rx->author)?></a>


        On <a href="<?=$pp1->kalendar?>mm/<?=self::escp(substr($rx->datetime,0,7))?>"
               title="Show all posts in post month"><?=self::escp($rx->datetime)?></a>


              <?php
              $qrywhere="post_id=:id AND status=:status" ;
              $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                         , ['placeh'=>':status', 'valph'=>'ON', 'tip'=>'str']
              ] ;
              $rcnt_post_comments = Tbl_crud_post_comment::rrcount( $pp1, $qrywhere, $binds
                 , $other = ['caller' => __METHOD__ .' '.', ln '. __LINE__ ] ) ;


              ?>
              <!-- Post categories or...-->
              &nbsp;
              <!--a class="badge bg-secondary text-decoration-none link-light" href="#!"-->
                <span> <!-- style="float:right;" class="badge badge-dark text-light" -->
                 Comments: <?=$rcnt_post_comments?>
                </span>

             &nbsp; <a href="<?=$pp1->read_post?>id/<?=$rx->id?>" >More</a>
             <!-- e n d  2. P o s t  m e t a  c o n t e n t-->

           <!-- ======================================
           3. P o s t  s u m m a r y
           =========================================== -->
        <div>
          <?php
          if ($rx->summary and $rx->summary > '') {
            //echo '<h5>Article summary</h5>' ; // SUMMARY : 
            echo '<b>'. str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                  nl2br(self::escp($rx->summary))
               )) .'</b>';
          } else {

          }
          ?>
        </div>
        <!-- e n d  3. a r t i c l e  s u m m a r y 


           <!-- ======================================
           4. P o s t  i m a g e
           =========================================== -->
          <div id="clpsedTxt">
          <div>
            <br>
            <?php
            //J://awww//www//fwphp//glomodul//blog//Uploads//mvc_M_V_data_flow.jpg
            //src="https://dummyimage.com/900x400/ced4da/6c757d.jpg"
            $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp(
               (null == $rx->image ? 'NON EXISTENT' : $rx->image)
            ));
            //$tmp_imgurlrel = 'Uploads/'.self::escp($rx->image) ;
            $tmp_imgurlrel = '/vendor/b12phpfw/img/'.self::escp($rx->image) ;
            //if (file_exists($tmp_imgpath)) 
            { ?>
              <figure class="mb-4">
                <img src="<?=$tmp_imgurlrel?>" class="img-fluid card-img-top"
                     title = "<?='$rx->image='. $rx->image .', $tmp_imgpath='
                               .$tmp_imgpath .', $tmp_imgurlrel='. $tmp_imgurlrel?>"
                     style="max-height:450px;" 
                   alt="<?=$tmp_imgurlrel?>" />
              </figure>
              <?php
            } 

            $tmp_imgpath = str_replace('/',DS, $pp1->shares_path
                 . 'img'.DS.'img_big'.DS.self::escp(
                 (null == $rx->image ? 'NON EXISTENT' : $rx->image)
            ) ) ;
            $tmp_imgurlrel = '/vendor/b12phpfw/img/img_big/'.self::escp($rx->image) ;
                          if ('') {self::jsmsg( [ //b asename(__METHOD__).
                             __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE img '
                             ,'$tmp_imgurlrel'=>$tmp_imgurlrel
                             ] ) ; }
            if ($rx->image and file_exists($tmp_imgpath)) { ?>
                <img src="<?=$tmp_imgurlrel?>"
                     title = "<?='$rx->image='. $rx->image 
                     .', $tmp_imgpath='.$tmp_imgpath .', $tmp_imgurlrel='. $tmp_imgurlrel?>"
                     style="width:100%;" 
                /><?php


            } //<!-- e n d  3. a r t i c l e  i m a g e -->


            //<!-- 4. i m a g e  d e s c r i p t i on -->
            $tmptxt = self::escp($rx->img_desc) ; 
            //if ($rx->image and file_exists($tmp_imgpath)) 
            if ($tmptxt > '') 
            { 
              //$lnklabel = substr(strstr(self::escp($rx->img_desc), '{{lnktxt}}'), 10,9) ;
                 ?>
              <div class="card-body">
                         <h5>Image description</h5>
                <p><?php
                 echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                 //str_replace('{{href}}','<a href="', str_replace('{{/href}}','">'.$lnklabel.'</a>',
                        nl2br($tmptxt)
                 ));
                       //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$rx->image.')' ; ?>
              </p>
            </div><!-- e n d  4. i m a g e  d e s c r i p t i on -->
              <?php
            } ?>



           </div><!-- ***** e n d Content for collapse component ********** -->
         </div> <!-- e n d  c o l l a p s e -->


    </div> <!-- e n d  P o s t  c o n t e n t -->
            <?php
  } endwhile;

          echo $pgn_links['navbar'] ;
          echo '<br><small class="text-muted">'. __METHOD__ .'</small>' ;
          ?>
          <br>





        </section>






        <aside>
            <?php
               Side_view::displ_tbl(  $pp1  //, $fltr_sort
                  , $category_from_url, $search_from_submit, $pgordno_from_url
                  , $other=['caller' => __METHOD__ .' '.', ln '. __LINE__ ]);
            ?>
        </aside>

      </div><!-- grid -->
    </main><!-- Main -->


    <!--no m ore : ftr.php script src="<=$pp1->wsroot_url?>zinc/exp_collapse.js" 
            language='JScript' type='text/javascript'>
    </script-->

    <?php
    //require_once $pp1->shares_path . '/ftr.php';

    return('1') ;
  } //e n d  f n  s h o w
  //<!-- CENTER END -->









  /** *****************************
  * V I E W  S N I P P E T S
  ******************************* */


  static private function show_pge_hdr( object $pp1
         //, string $category_from_url, string $search_from_submit, int $pgordno_from_url
    , array $pgn_links
  ) 
  { ?>
                <!-- P a g e   h e a d e r  header  -->
    <div>
      <?php
       //echo utl::M sgErr();  echo utl::M sgSuccess();
       echo utl::msg_err_succ(__METHOD__ .' '.', ln '. __LINE__);
       ?>

      <!-- 1. p a g e  s u m m a r y -->

      <?php
      echo $pgn_links['navbar'];
      ?>
    </div>


    <?php
    return('1') ;
  } //e n d  f n  show_ pge_ hdr




}  //e n d  c l s
