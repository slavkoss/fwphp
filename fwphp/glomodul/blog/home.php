<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//J:\awww\www\fwphp\glomodul4\blog\home.php
use B12phpfw\core\zinc\Db_allsites ;

use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '<br />$ u r i q='; print_r($uriq) ;
                      //echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                      //echo 'For pagination (not for c o u n t !!) $qrywhere='; print_r($qrywhere) ;
                      //echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    //exit(0) ;
                    echo '</pre>'; }

if (isset($uriq->p) and null !== $uriq->p) {
  $_SESSION['filter_posts']['pgordno_from_url']  = $uriq->p ;
} else {
  if (!isset($_SESSION['filter_posts']['pgordno_from_url'])) {
    $_SESSION['filter_posts']['pgordno_from_url']  = 1 ;
  }
}

if (isset($uriq->c) and null !== $uriq->c) {
   $_SESSION['filter_posts']['category_from_url'] = $uriq->c ;
   $_SESSION['filter_posts']['pgordno_from_url'] = 1 ;
} else {
  if (!isset($_SESSION['filter_posts']['category_from_url'])) {
    $_SESSION['filter_posts']['category_from_url']  = '' ;
  }
}

if ( isset($_POST["SearchButton"]) and isset($_POST["Search"]) //and $_POST["Search"] 
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
} else{ $row_ordno = ($pgordno_from_url * $rblk) - $rblk; }

$qrywhere = "'1'='1'" ;
$binds = [] ;
if( $search_from_submit ) {
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
                    echo '</pre>'; }
$rcnt_filtered_posts = Tbl_crud_post::rrcount( //$sellst='COUNT(*) COUNT_ROWS'
   $qrywhere, $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

$pgn_links = self::get_pgnnav($rcnt_filtered_posts, '/i/home/', $uriq, $rblk);
$pgnnavbar        = $pgn_links['navbar'];
$pgordno_from_url = $pgn_links['pgordno_from_url'];
$first_rinblock   = $pgn_links['first_rinblock'];
$last_rinblock    = $pgn_links['last_rinblock'];

if( $pgordno_from_url ) {
  $dbi = Db_allsites::getdbi() ;
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
      $binds[]=['placeh'=>':rblk', 'valph'=>$rblk, 'tip'=>'int'];
    break;
    default: 
      echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                .'D B I '. $dbi .' does not exist' . '</h3>';
      break;
    //default: Config_allsites::Redirect_to($pp1->filter_page) ; break;
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

Db_allsites::setdo_pgntion('1') ; 
$cursor_posts = Tbl_crud_post::rr( $sellst='*', $qrywhere, $binds
  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );

?>




<!-- CENTER -->
<div class="container">
  <div class="row mt-4">

    <!-- Main Area Start  -  P A G E  T I T L E -->
    <div class="col-sm-8">

      <?php // $pgordno_ from_url $category_ from_url  $search_ from_submit
        $t1 = 'Blog' ;
        if ($category_from_url)  { $t1 .= ' category "'.$category_from_url .'"' ; }
        if ($search_from_submit) { $t1 .= ' found "'. $search_from_submit .'"' ; }
        if ($pgordno_from_url)   { $t1 .= ' page '. $pgordno_from_url ; }
        
        if ($t1 == 'Blog') { $t1 .= ' - all articles' ; }

        //if ($category_from_url) { echo ' - all ' . $category_from_url . ' articles' ;
        //} else {echo ' - all articles';} 

       echo $this->ErrorMessage();
       echo $this->SuccessMessage(); ?>


      <!-- 1. p a g e  t i t l e -->
      <h1 class="lead"><b><?=$t1?></b> Responsive CMS Blog (PHP, PDO, Bootstrap 4, jQuery only for Bootstrap, no AJAX)</h1>
      <!--h4><=$t1></h4-->


      <?php
      echo $pgn_links['navbar']; //P G N  L I N K S

      $ordno = 0 ;
      // isset($rx->id)   Tbl_crud_post::...
      while ( $rx = Db_allsites::rrnext( $cursor_posts
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
      { 
        ++$ordno ;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '$rx='; print_r($rx) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }
        ?>




        <br />
        <div class="card">

            <!-- 2. a r t i c l e  c a t e g o r y    small class="text-muted"
               what is $ p p 1->filter_ postcateg - see Home_ctr :
                   urlqrystring_name: => urlqrystring_value:
                  'filter_ postcateg' => QS.'i/filter_ postcateg/c/'
                  and private function filter_postcateg(object $pp1) 
            -->
            <div class="card-body">Category 
                <a href="<?=$pp1->filter_postcateg?><?=self::escp($rx->category)?>/p/1">
                 <?=self::escp($rx->category)?> </a>

              Written by <span class="text-dark"> 
              <a href="<?=$pp1->read_user?>username/<?=self::escp($rx->author)?>">
                  <?=self::escp($rx->author)?></a>
                </span>

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
              <span style="float:right;" class="badge badge-dark text-light">
                Comments: <?=$rcnt_post_comments?>
              </span>

              <!--br />Click txt name below to see summary.-->
            </div><!-- e n d  2. a r t i c l e  c a t e g o r y -->





        <!-- *********exp_collapse Open/close summary, img...********** -->
        <button type="button" class="collapsible">
            <!-- 1. a r t i c l e  O S  f i l e  n a m e Read OS txt article &rang;&rang;
                h3 class="xxcard-title"
            -->
            <h5 style="color:gray;">
                <?php echo ''
                  //. ($category_from_url?$ordno.'. ':'')
                  . str_replace('!', "&nbsp;", 
                      str_pad( (string)($first_rinblock + $ordno - 1), 6, '!', STR_PAD_LEFT)
                    ) .'. '
                  . self::escp($rx->title) . ' (click: summary)'; ?>

            <a href="<?=$pp1->read_post?>id/<?=$rx->id?>" style="float:right;">
              <span class="btn btn-info">More</span>
            </a>
            </h5><!-- e n d  1. a r t i c l e  O S  f i l e  n a m e -->

        </button><!-- type="button" class="collapsible" -->
        <!-- *********exp_collapse Open/close summary, img...********** -->
        <div class="content" style="display:none;" >

            <!-- 3. a r t i c l e  s u m m a r y -->
            <div class="card-body">
            <h4>
              <?php
              if ($rx->summary) {

                       echo '<h5>Article summary</h5>' ;

                //echo nl2br(self::escp($rx->summary));
                echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                      nl2br(self::escp($rx->summary))
                   ));
              } else {
                //Db_allsites::readmkdpost($pp1, '','only_help'); //means  i n c  here html 
              }
              ?>
            </h4>
            </div><!-- e n d  3. a r t i c l e  s u m m a r y -->



            <!-- 4. a r t i c l e  i m a g e -->
            <?php
            //J://awww//www//fwphp//glomodul//blog//Uploads//mvc_M_V_data_flow.jpg
            $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp(
               (null == $rx->image ? 'NON EXISTENT' : $rx->image)
            ));
            $tmp_imgurlrel = 'Uploads/'.self::escp($rx->image) ;
            if (file_exists($tmp_imgpath)) { ?>
              <img src="<?=$tmp_imgurlrel?>" class="img-fluid card-img-top"
                   title = "<?='$rx->image='. $rx->image .', $tmp_imgpath='
                               .$tmp_imgpath .', $tmp_imgurlrel='. $tmp_imgurlrel?>"
                   style="max-height:450px;" 
                   alt="" />
              <?php
            } 

            $tmp_imgpath = str_replace('/',DS, $pp1->shares_path
                 . 'img'.DS.'img_big'.DS.self::escp(
                 (null == $rx->image ? 'NON EXISTENT' : $rx->image)
            ) ) ;
            $tmp_imgurlrel = '/zinc/img/img_big/'.self::escp($rx->image) ;
                          if ('') {self::jsmsg( [ //b asename(__FILE__).
                             __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE img '
                             ,'$tmp_imgurlrel'=>$tmp_imgurlrel
                             ] ) ; }
            if ($rx->image and file_exists($tmp_imgpath)) { ?>
                <img src="<?=$tmp_imgurlrel?>"
                     title = "<?='$rx->image='. $rx->image 
                     .', $tmp_imgpath='.$tmp_imgpath .', $tmp_imgurlrel='. $tmp_imgurlrel?>"
                     class="img-fluid card-img-top"
                     style="max-height:450px;" 
                /><?php
            } ?><!-- e n d  4. a r t i c l e  i m a g e -->


          <!-- 5. i m a g e  d e s c r i p t i on -->
            <div class="card-body">
              <p><?php

                         echo '<h5>Image description</h5>' ;

                 $tmptxt = self::escp($rx->img_desc) ; //$tmptxt = $rx->img_desc ;
                 //$lnklabel = substr(strstr(self::escp($rx->img_desc), '{{lnktxt}}'), 10,9) ;
                 echo 
                 str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                 //str_replace('{{href}}','<a href="', str_replace('{{/href}}','">'.$lnklabel.'</a>',
                        nl2br($tmptxt)
                 ));
                       //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$rx->image.')' ; ?>
              </p>
            </div><!-- e n d  5. i m a g e  d e s c r i p t i on -->

        </div> <!-- class="content" (Collapsible) Summary, img...-->
        <!-- ******************** E N D Open/close summary, img... **************** -->


      </div><!-- class="card"-->
        <br /><br> <?php
      } endwhile;


      echo '<br />'. $pgn_links['navbar'] ;  //P G N  L I N K S


      echo '<small class="text-muted">'. __FILE__ .'</small>' ;
      ?>
    </div><!-- Main (left) Area E n d--><!-- E N D class="col-sm-8"-->



     <?php require_once("home_side_area.php"); ?>

  </div><!-- class="row mt-4"-->

</div><!-- class="container"-->

<!-- CENTER END -->


<!--see ftr.php script src="<=$pp1->wsroot_url?>zinc/exp_collapse.js" 
        language='JScript' type='text/javascript'>
</script-->
