<?php
// J:\awww\www\fwphp\glomodul\blog\Home.php  
//https://startbootstrap.com/template/blog-post  https://startbootstrap.com/previews/blog-post
//https://getbootstrap.com/docs/5.1/components/collapse/

declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');

namespace B12phpfw\module\blog ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
use B12phpfw\core\b12phpfw\Db_allsites        as utldb ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;

use B12phpfw\module\blog\Side_area            as Side_view;

class Home extends utl
{
  public function __construct(object $pp1) 
  {
  }

  static public function show( object $pp1, array $other ): string 
  {
    if (isset($pp1->category_from_url)) $category_from_url  = $pp1->category_from_url ;
    else $category_from_url  = '' ;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      //echo '<br />$ u r i q='; print_r($pp1->uriq) ;
                      echo '<br />$_POST='; print_r($_POST) ;
                      //echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                      //echo 'For pagination (not for c o u n t !!) $qrywhere='; print_r($qrywhere) ;
                      //echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    //exit(0) ;
                    echo '</pre>'; }

    if (isset($pp1->uriq->p) and null !== $pp1->uriq->p) {
      $_SESSION['filter_posts']['pgordno_from_url']  = (int)$pp1->uriq->p ;
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

                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                        echo 'For c o u n t !! $qrywhere='; print_r($qrywhere) ;
                        echo '<br />$binds='; print_r($binds) ;
                      //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                      echo '</pre>';
                      exit(0) ;
                    }
    $rcnt_filtered_posts = Tbl_crud_post::rrcount( $qrywhere, $binds, $other=
       ['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    $pgn_links = self::get_pgnnav($pp1->uriq, $rcnt_filtered_posts, '/i/home/', $pp1->rblk);
    $pgnnavbar        = $pgn_links['navbar'];
    $pgordno_from_url = (int)$pgn_links['pgordno_from_url'];
    $first_rinblock   = (int)$pgn_links['first_rinblock'];
    $last_rinblock    = (int)$pgn_links['last_rinblock'];

    if( $pgordno_from_url ) {
      $dbi = utldb::getdbi() ;
      switch ($dbi)
      {
        case 'oracle' : 
          $qrywhere .= " ORDER BY datetime desc" ; //LIMIT :first_rinblock, :last_rinblock
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>$row_ordno, 'tip'=>'int'];
          $binds[]=['placeh'=>':last_rinblock',  'valph'=>$last_rinblock, 'tip'=>'int'];
        break;
        case 'mysql' : 
          $qrywhere .= " ORDER BY datetime desc LIMIT :first_rinblock, :rblk" ;
          $binds[]=['placeh'=>':first_rinblock', 'valph'=>$row_ordno, 'tip'=>'int'];
          $binds[]=['placeh'=>':rblk', 'valph'=>$pp1->rblk, 'tip'=>'int'];
        break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                    .'D B I '. $dbi .' does not exist' . '</h3>';
          break;
        //default: utl::Redirect_to($pp1->filter_page) ; break;
      }
      
    }
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                      echo 'For pagination (not for c o u n t !!) $qrywhere='; print_r($qrywhere) ;
                      echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }

    utldb::setdo_pgntion('1') ; 
    $cursor_posts = Tbl_crud_post::get_cursor( $sellst='*', $qrywhere, $binds
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );  // , $qrywhere





    $title = 'MSG HOME';
    require_once $pp1->shares_path . '/hdr.php';  //require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");
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
             , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
          {
            ++$ordno ;
                          if ('') //if ($autoload_arr['dbg']) 
                          { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                            echo '<pre>' ; 
                              echo '$rx='; print_r($rx) ;
                            //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                            echo '</pre>'; 
                          }
            ?>

                  <!-- P o s t  c o n t e n t    class="text-muted fst-italic mb-2"-->
            <div>
              <?php
              self::show_post_ttle($pp1, $rx, $first_rinblock, $ordno) ;
              self::show_post_meta($pp1, $rx, $first_rinblock, $ordno) ;
              self::show_post_summary($pp1, $rx) ;
              self::show_post_img($pp1, $rx) ;
              ?>
            </div> <!-- e n d  P o s t  c o n t e n t -->
            <?php
          } endwhile;

          echo $pgn_links['navbar'] ;
          echo '<br><small class="text-muted">'. __FILE__ .'</small>' ;
          ?>
          <br>





        </section>






        <aside>
            <?php
               Side_view::show(  $pp1  //, $fltr_sort
                  , $category_from_url, $search_from_submit, $pgordno_from_url
                  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
            ?>
        </aside>

      </div><!-- grid -->
    </main><!-- Main -->


    <!--no more : ftr.php script src="<=$pp1->wsroot_url?>zinc/exp_collapse.js" 
            language='JScript' type='text/javascript'>
    </script-->

    <?php
    require_once $pp1->shares_path . '/ftr.php';

    return('1') ;
  } //e n d  f n  s h o w
  //<!-- CENTER END -->









  /** *****************************
  * V I E W  S N I P P E T S
  ******************************* */
  /*static private function xxx(object $pp1, object $rx): string
  { ?>
    <?php
    return('1') ;
  } //e n d  f n  xxx
  */

  static private function show_pge_hdr( object $pp1
         //, string $category_from_url, string $search_from_submit, int $pgordno_from_url
    , array $pgn_links
  ) 
  { ?>
                <!-- P a g e   h e a d e r  header  -->
    <div>
      <?php
       //echo utl::M sgErr();  echo utl::M sgSuccess();
       echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
       ?>

      <!-- 1. p a g e  s u m m a r y -->

      <?php
      echo $pgn_links['navbar'];
      ?>
    </div>


    <?php
    return('1') ;
  } //e n d  f n  show_ pge_ hdr







  static private function show_post_ttle(
     object $pp1, object $rx, int $first_rinblock, int $ordno
  ): string
  { ?>
    <br><br><br>
        <!-- Post title-->
        <!-- *********exp_collapse Open/close summary, img...********** 
        <button type="button" class="collapsible">
        <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
        -->
            <!-- 1. a r t i c l e  O S  f i l e  n a m e Read OS txt article &rang;&rang;
                h3 class="xxcard-title"
            -->
            <hr>
            <h3 style="color:lightblue;">
                <?php echo '' //. ($category_from_url?$ordno.'. ':'')
                   . self::escp($rx->title) . ''; ?>
            </h3>
            <!-- e n d  1. a r t i c l e  O S  f i l e  n a m e -->
        <!-- </button> -->
    <?php
    return('1') ;
  } //e n d  f n  xxx
  

  static private function show_post_meta(
     object $pp1, object $rx, int $first_rinblock, int $ordno
  ): string
  { 
    //<!-- 2. P o s t  m e t a  c o n t e n t-->

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
          $rcnt_post_comments = Tbl_crud_post_comment::rrcount( 
              $qrywhere="post_id=:id AND status=:status"
            , $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                     , ['placeh'=>':status', 'valph'=>'ON', 'tip'=>'str']
            ]
            , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
          ?>
          <!-- Post categories or...-->
          &nbsp;
          <!--a class="badge bg-secondary text-decoration-none link-light" href="#!"-->
            <span> <!-- style="float:right;" class="badge badge-dark text-light" -->
             Comments: <?=$rcnt_post_comments?>
            </span>

         &nbsp; <a href="<?=$pp1->read_post?>id/<?=$rx->id?>" >More</a>
         <!-- e n d  2. P o s t  m e t a  c o n t e n t-->
    <?php
    return('1') ;
  } //e n d  f n  show_ post_ meta


  static private function show_post_img(object $pp1, object $rx): string
  { ?>
    <!-- ********* c o l l a p s e  (Open/close txt) ********** 
      <a class="btn btn-primary" 
    &nbsp; <a class="badge bg-secondary text-decoration-none link-light" 
    -->


    <div id="clpsedTxt">
      <div>
        <!-- 3. a r t i c l e  i m a g e -->
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
                      if ('') {self::jsmsg( [ //b asename(__FILE__).
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


    <?php
    return('1') ;
  } //e n d  f n  show_ post_ img



  static private function show_post_summary(object $pp1, object $rx): string
  { ?>
    <div>
    <!-- 5. a r t i c l e  s u m m a r y
    <section class="mb-5">  <div class="card-body">
    -->


      <?php
      if ($rx->summary and $rx->summary > '') {
        //echo '<h5>Article summary</h5>' ;
        echo '<b>'. str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
              nl2br(self::escp($rx->summary))
           )) .'</b>';
      } else {

      }
      ?>


    </div>
    <!-- e n d  5. a r t i c l e  s u m m a r y 
    </section>
    -->
    <?php
    return('1') ;
  } //e n d  f n  show_ post_ summary



}  //e n d  c l s
