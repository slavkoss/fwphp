<?php
use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;
use B12phpfw\dbadapter\post\Tbl_crud           as Tbl_crud_post ;

//$pp1  = $this->getp('pp1') ;
$cursor_categ = Tbl_crud_category::rr($sellst='*', $qrywhere="'1'='1' ORDER BY title", $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

$dbi = Db_allsites::getdbi() ;
switch ($dbi)
{
  case 'oracle' :
    $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
    $binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
    Db_allsites::setdo_pgntion('1') ;

    $cursor_recent_posts = Tbl_crud_post::rr($sellst='*', $qrywhere="'1'='1' ORDER BY datetime desc", $binds  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
  break;
  case 'mysql' :
    $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
    $binds[]=['placeh'=>':rblk', 'valph'=>5, 'tip'=>'int'];
    Db_allsites::setdo_pgntion('1') ;
    $cursor_recent_posts = Tbl_crud_post::rr($sellst='*', $qrywhere="'1'='1' ORDER BY datetime desc", $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
  break;
  default:
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
              .'D B I '. $dbi .' does not exist' . '</h3>';
    //Db_ allsites::Redirect_to($pp1->filter_page) ;
    break;
}
?>




<!-- Side Area Start -->
<div class="col-sm-4">
  <div class="card mt-4">
    <div class="card-body">
      <div>
        <img src="Uploads/twitter.jpg" class="d-block img-fluid mb-3" alt="">
        <!--div class="text-center">  </div-->
        <span style="display: inline;">
          Real life site code examples.
        </span>
      </div>
    </div>
  </div>




  <br>
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h2 class="lead"> 1. Teme (posts categories filter)</h2>
    </div>
    <div class="card-body">
      <a href="<?=$pp1->filter_postcateg?>">ALL</a>&nbsp;&nbsp;&nbsp;
        <?php
        while ( $rx = Db_allsites::rrnext( $cursor_categ
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
        {
            ?>
            <a href="<?=$pp1->filter_postcateg?><?=$rx->title?>/p/1">
             <span class="heading"> <?=$rx->title?></span> </a>&nbsp;&nbsp;&nbsp;
            <?php 
        } endwhile; ?>
    </div>
  </div>




  <br>
  <div class="card">
    <div class="card-header bg-info text-white">
       <h2 class="lead"> 2. Recent posts (date filter)</h2>
    </div>
    <div class="card-body">
      <?php
      $ii=0 ;
      while ( $rx = Db_allsites::rrnext( $cursor_recent_posts
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
      {
        if ($ii>9) break ;
        ?>
        <a href="<?=$pp1->filter_postcateg?><?=$rx->category?>">
         <span class="heading"> <?=$rx->category?></span> </a>&nbsp;&nbsp;&nbsp;

        <div class="media">
          <?php
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp($rx->image));
          $tmp_imgurlrel = 'Uploads/'.self::escp($rx->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <img src="<?=$tmp_imgurlrel?>" class="d-block img-fluid
                 align-self-start" width="90" height="94" alt="">
            <?php
          } ?>


          <div class="media-body ml-2">
            <a style="text-decoration:none;" 
               href="<?=$pp1->read_post?>id/<?php echo self::escp($rx->id) ; ?>" 
               target="_blank">
                 <span class="lead"><?php echo self::escp($rx->title); ?></span> </a>
            <p class="small"><?php echo self::escp($rx->datetime); ?></p>
          </div>

        </div>

        <hr>
        <?php
        $ii++ ;
      } endwhile; ?>
    </div> <!--e n d <div class="card-body"-->
  </div> <!--e n d <div class="card"-->




  <br>
  <div class="card">
    <!--div class="card-header bg-dark text-light">
      <h2 class="lead">Sign Up !</h2>
    </div-->
    <div class="card-body">
      <button type="button" class="btn btn-success btn-block text-center text-white mb-4" 
              name="button">3. Join the Forum (todo)</button>
      <!--button type="button" class="btn btn-danger btn-block text-center text-white mb-4" 
              name="button">Log in</button-->
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="" placeholder="Enter your email" value="">
        <div class="input-group-append">
          <button type="button" class="btn btn-primary btn-sm text-center text-white" name="button">Subscribe Now</button>
        </div>
      </div>
    </div>
  </div>


    <?php echo "<pre>
      _.-'''''-._
    .'  _     _  '.
   /   (o)   (o)   \
  |   &copy; phporacle   |
  | Slavko Srakočić |
   \  '. Zagreb.'  /
    '.  ''---''  .'
      '-._____.-' 
    </pre>"; ?>
    <?='<small class="text-muted">'. __FILE__ .'</small>'?>

</div>
<!-- Side Area End -->