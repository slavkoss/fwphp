<?php
//J:\awww\www\fwphp\glomodul4\blog\home.php
$rblk = 5;

if (isset($this->uriq->p)) {
  $_SESSION['filter_posts']['pgordno_from_url']  = $this->uriq->p ;
} else {
  if (!isset($_SESSION['filter_posts']['pgordno_from_url'])) {
    $_SESSION['filter_posts']['pgordno_from_url']  = 1 ;
  }
}

if (isset($this->uriq->c)) {
   $_SESSION['filter_posts']['category_from_url'] = $this->uriq->c ;
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



$pgn_links = self::get_pgnnav($rcnt, '/i/home/', $this->uriq, $rblk);
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
    //default: $this->Redirect_to($this->pp1->filter_page) ; break;
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
       ?>
      <h1>
                <?=$t1?>
      </h1>
      <h1 class="lead">Responsive CMS Blog (PHP, PDO, Bootstrap 5, jQuery only for Bootstrap, no AJAX)</h1>
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();

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
            } //default: $this->Redirect_to($this->pp1->filter_page) ; break;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '$r='; print_r($r) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }
        ?>
        <div class="card">




            <h4>
              <?php
              if ($r->summary) {
              //echo nl2br(self::escp($r->summary));
              echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                      nl2br(self::escp($r->summary))
                   ));
              } else {
                $this->readmkdpost('','only_help'); //means  i n c l u d e  here html 
              }
              ?>
            </h4>




          <?php
          //J://awww//www//fwphp//glomodul//blog//Uploads//mvc_M_V_data_flow.jpg
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp($r->image));
          $tmp_imgurlrel = 'Uploads/'.self::escp($r->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <img src="<?=$tmp_imgurlrel?>" class="img-fluid card-img-top"
                 style="max-height:450px;" 
                 alt="" />
            <?php
          } 

          $tmp_imgpath = str_replace('/',DS, $this->pp1->wsroot_path)
               . 'zinc'.DS.'img'.DS.'img_big'.DS.self::escp($r->image) ;
          $tmp_imgurlrel = '/zinc/img/img_big/'.self::escp($r->image) ;
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE img '
                           ,'$tmp_imgurlrel'=>$tmp_imgurlrel
                           ] ) ; }
          if ($r->image and file_exists($tmp_imgpath)) { ?>
              <img src="<?=$tmp_imgurlrel?>" style="max-height:450px;" class="img-fluid card-img-top" />
              <?php
          } ?>



          <div class="card-body">
            <p><?php
               $tmptxt = self::escp($r->img_desc) ; //$tmptxt = $r->img_desc ;
               //$lnklabel = substr(strstr(self::escp($r->img_desc), '{{lnktxt}}'), 10,9) ;
               echo 
               str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
               //str_replace('{{href}}','<a href="', str_replace('{{/href}}','">'.$lnklabel.'</a>',
                      nl2br($tmptxt)
               ));
                     //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$r->image.')' ;
            ?></p>



            <small class="text-muted">Category: <span class="text-dark">
              <a href="<?=$this->pp1->filter_postcateg?><?=self::escp($r->category)?>/p/1">
                     <?=self::escp($r->category)?> </a></span> & Written by <span class="text-dark"> 
              
              <a href="<?=$this->pp1->read_user?>username/<?=self::escp($r->author)?>">
                  <?=self::escp($r->author)?></a>
                </span> On 
                <!--<span class="text-dark"><php echo self::escp($r->datetime); ></span-->
              <span class="text-dark">
              <a href="<?=$this->pp1->kalendar?>mm/<?=self::escp(substr($r->datetime,0,7))?>"
                 title="Show all posts in post month"><?=self::escp($r->datetime)?></a>
                </span>
            </small>

            <span style="float:right;" class="badge badge-dark text-light">Comments:
              <?php //echo $this->ApproveCommentsAccordingtoPost($db, $r->id);
                //$rcnt = $this->r rc ount('c omments') ;
                //$c_r = $this->r r('1', $this, 'comments', "post_id='$r->id' AND status='ON'"); //->C OUNT_ R OWS
                $c_r = $this->rr("SELECT count(*) COUNT_ROWS FROM comments WHERE post_id='$r->id' AND status='ON'", [], __FILE__ .' '.', ln '. __LINE__ ) ;
                while ($row = $this->rrnext($c_r)): {$rcnt = $row ;} endwhile; //c_, R_, U_, D_
               echo $rcnt->COUNT_ROWS ;
              ?>
            </span>




            <hr>

            <h5 class="card-title"><?php echo ''
                  //. ($category_from_url?$ordno.'. ':'')
                  . str_replace('!', "&nbsp;", str_pad(
                        $first_rinblock + $ordno - 1
                    , 6, '!', STR_PAD_LEFT) ) .'. '
                  . self::escp($r->title);
                  ?>

            <a href="<?=$this->pp1->read_post?>id/<?=$r->id?>" style="float:right;">
              <span class="btn btn-info">Read More &rang;&rang; </span>
            </a>
            </h5>


          </div>
        </div>
        <br> <?php
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
              , $qrywhere, '*', $binds, 'do_ora_pgn', $this->pp1->dbi_obj
              //, "$q rywhere ORDER BY ... L IMIT :first_rinblock,5", '*' //mysql
            ) ;
          $numcols = $c_limitedSQL->columnCount(); //$numcols = ocinumcols($c_col_info);
          */