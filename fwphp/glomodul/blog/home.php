<?php
//J:\awww\www\fwphp\glomodul4\blog\home.php
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

$rblk = 10;

//if (isset($uriq->p)) { //Fatal error: Cannot use isset() on the result of an expression
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
  $binds[]=['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str'];
}

                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                      echo 'For c o u n t !! $qrywhere='; print_r($qrywhere) ;
                      echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }

$c_rcnt = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM posts WHERE $qrywhere", $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
while ($row_cnt = $this->rrnext($c_rcnt)): {$rcnt = $row_cnt ;} endwhile;
$rcnt =  $rcnt->COUNT_ROWS ;



$pgn_links = self::get_pgnnav($rcnt, '/i/home/', $uriq, $rblk);
$pgnnavbar        = $pgn_links['navbar'];
$pgordno_from_url = $pgn_links['pgordno_from_url'];
$first_rinblock   = $pgn_links['first_rinblock'];
$last_rinblock    = $pgn_links['last_rinblock'];

if( $pgordno_from_url ) {
  switch (self::$dbi)
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
                .'D B I '. self::$dbi .' does not exist' . '</h3>';
      break;
    //default: $this->Redirect_to($pp1->filter_page) ; break;
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

//command for all tables global read fn "rr" to read paginated ee to read rows block (recordset) :
self::$do_pgntion = '1'; 
$c_posts = $this->rr( "SELECT * FROM posts WHERE $qrywhere", $binds
   , __FILE__ .' '.', ln '. __LINE__ ) ;
?>




<!-- HEADER -->
<div class="container">
  <div class="row mt-4">

    <!-- Main Area Start  -  P A G E  T I T L E -->
    <div class="col-sm-8 ">

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
      <h1 class="lead"><b><?=$t1?></b> Responsive CMS Blog (PHP, PDO, Bootstrap 5, jQuery only for Bootstrap, no AJAX)</h1>
      <!--h4><=$t1></h4-->


      <?php
      echo $pgn_links['navbar']; //P G N  L I N K S

      $ordno = 0 ;
      while ($r = $this->rrnext($c_posts)): //r e a d  r o w  n e x t
      { 
        ++$ordno ; //all row fld names lowercase
            switch (self::$dbi) 
            { 
              case 'oracle' : $r = self::rlows($r) ; break; 
              default: 
                //echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                //    .'D B I '. self::$dbi .' does not exist' . '</h3>';
              break; 
            } //default: $this->Redirect_to($pp1->filter_page) ; break;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '$r='; print_r($r) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }
        ?>

        <br />
        <div class="card">




            <!-- 2. a r t i c l e  c a t e g o r y    small class="text-muted"-->
            <div class="card-body">Category 
                <a href="<?=$pp1->filter_postcateg?><?=self::escp($r->category)?>/p/1">
                 <?=self::escp($r->category)?> </a>

              Written by <span class="text-dark"> 
              <a href="<?=$pp1->read_user?>username/<?=self::escp($r->author)?>">
                  <?=self::escp($r->author)?></a>
                </span>

              On <a href="<?=$pp1->kalendar?>mm/<?=self::escp(substr($r->datetime,0,7))?>"
                 title="Show all posts in post month"><?=self::escp($r->datetime)?></a>


              <span style="float:right;" class="badge badge-dark text-light">Comments:
                <?php
                $c_r = $this->rr("SELECT count(*) COUNT_ROWS FROM comments WHERE post_id='$r->id' AND status='ON'", [], __FILE__ .' '.', ln '. __LINE__ ) ;
                while ($row = $this->rrnext($c_r)): {$rcnt = $row ;} endwhile; //c_, R_, U_, D_
                echo $rcnt->COUNT_ROWS ; ?>
              </span>

            </div><!-- e n d  2. a r t i c l e  c a t e g o r y -->



            <!-- 1. a r t i c l e  O S  f i l e  n a m e Read OS txt article &rang;&rang;-->
            <h3 class="card-title" style="color:darkblue;">
                <?php echo ''
                  //. ($category_from_url?$ordno.'. ':'')
                  . str_replace('!', "&nbsp;", str_pad(
                        $first_rinblock + $ordno - 1
                    , 6, '!', STR_PAD_LEFT) ) .'. '
                  . self::escp($r->title); ?>

            <a href="<?=$pp1->read_post?>id/<?=$r->id?>" style="float:right;">
              <span class="btn btn-info">More</span>
            </a>
            </h3><!-- e n d  1. a r t i c l e  O S  f i l e  n a m e -->



            <!-- 3. a r t i c l e  s u m m a r y -->
            <div class="card-body">
            <h4>
              <?php
              if ($r->summary) {

                       echo '<h5>Article summary</h5>' ;

              //echo nl2br(self::escp($r->summary));
              echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                      nl2br(self::escp($r->summary))
                   ));
              } else {
                $this->readmkdpost($pp1, '','only_help'); //means  i n c l u d e  here html 
              }
              ?>
            </h4>
            </div><!-- e n d  3. a r t i c l e  s u m m a r y -->



          <!-- 4. a r t i c l e  i m a g e -->
          <?php
          //J://awww//www//fwphp//glomodul//blog//Uploads//mvc_M_V_data_flow.jpg
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp(
             (null == $r->image ? 'NON EXISTENT' : $r->image)
          ));
          $tmp_imgurlrel = 'Uploads/'.self::escp($r->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <img src="<?=$tmp_imgurlrel?>" class="img-fluid card-img-top"
                 title = "<?='$r->image='. $r->image .', $tmp_imgpath='
                             .$tmp_imgpath .', $tmp_imgurlrel='. $tmp_imgurlrel?>"
                 style="max-height:450px;" 
                 alt="" />
            <?php
          } 

          $tmp_imgpath = str_replace('/',DS, $pp1->wsroot_path
               . 'zinc'.DS.'img'.DS.'img_big'.DS.self::escp(
               (null == $r->image ? 'NON EXISTENT' : $r->image)
          ) ) ;
          $tmp_imgurlrel = '/zinc/img/img_big/'.self::escp($r->image) ;
                        if ('') {self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE img '
                           ,'$tmp_imgurlrel'=>$tmp_imgurlrel
                           ] ) ; }
          if ($r->image and file_exists($tmp_imgpath)) { ?>
              <img src="<?=$tmp_imgurlrel?>"
                   title = "<?='$r->image='. $r->image .', $tmp_imgpath='.$tmp_imgpath .', $tmp_imgurlrel='. $tmp_imgurlrel?>"
                   class="img-fluid card-img-top"
                   style="max-height:450px;" 
              /><?php
          } ?><!-- e n d  4. a r t i c l e  i m a g e -->


          <!-- 5. i m a g e  d e s c r i p t i on -->
          <div class="card-body">
            <p><?php

                       echo '<h5>Image description</h5>' ;

               $tmptxt = self::escp($r->img_desc) ; //$tmptxt = $r->img_desc ;
               //$lnklabel = substr(strstr(self::escp($r->img_desc), '{{lnktxt}}'), 10,9) ;
               echo 
               str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
               //str_replace('{{href}}','<a href="', str_replace('{{/href}}','">'.$lnklabel.'</a>',
                      nl2br($tmptxt)
               ));
                     //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$r->image.')' ; ?>
            </p>
          </div><!-- e n d  5. i m a g e  d e s c r i p t i on -->


        </div>
        <br /><br> <?php
      } endwhile;


      echo '<br />'. $pgn_links['navbar'] ;  //P G N  L I N K S


      echo '<small class="text-muted">'. __FILE__ .'</small>' ;
      ?>
    </div>
    <!-- Main Area End-->



     <?php require_once("home_side_area.php"); ?>

  </div>

</div>

<!-- HEADER END 

<?php
          /*
          $q rywhere = "'1'='1'" ;
          $binds = [
                  ['placeh'=>':first_rinblock', 'valph'=>$first_rinblock, 'tip'=>'int']
                , ['placeh'=>':last_rinblock',  'valph'=>$last_rinblock, 'tip'=>'int']
          ] ;
          $c_limitedSQL = $this->r r('', $this, $tbl //c= cursor
              , $qrywhere, '*', $binds, 'do_ora_pgn', $pp1->dbi_obj
              //, "$q rywhere O RDER BY ... L IMIT :first_rinblock,5", '*' //mysql
            ) ;
          $numcols = $c_limitedSQL->columnCount(); //$numcols = ocinumcols($c_col_info);
          */