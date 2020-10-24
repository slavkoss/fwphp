<?php
// J:\awww\www\fwphp\glomodul\post\read_post.php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\core\zinc\Db_allsites ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;
use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;

//    1. S U B M I T E D  A C T I O N S
// mostly M O D E L  C O D E (why M-V data flow : if this code is in  c t r  we have fat c t r)
if(isset($_POST["Submit"])){
  Tbl_crud_post_comment::cc($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
  Config_allsites::Redirect_to($pp1->read_post."id/{$pp1->uriq->id}"); //$IdFromURL
} //Ending of Submit Button If-Condition



//        2. G U I  to get user action
/**
*  <!-- *****************************************************
* P o s t Part Start (DETAIL OF U S E R  AND  P O S T T Y P E) 
*  ****************************************************** --> 
*/
// $title = 'Full Post Page' ;
 //require_once($pp1->shares_path.'hdr.php');
// require_once("navbar.php");
?>
<!-- HEADER -->
<div class="container">
  <div class="row mt-4">
    <!-- Main Area Start-->
    <div class="col-sm-8 ">
      <!--h1>Responsive CMS Blog</h1>
      <h1 class="lead">...</h1-->
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       ?>
      <?php
      // SQL query when Searh button is active
      if(isset($_POST["SearchButton"]))
      {
        $Search = $_POST["Search"];
        $cursor_posts = Tbl_crud_post::rr($sellst='*', $qrywhere="
              title LIKE :search1
              OR category LIKE :search2
              OR datetime LIKE :search3
              OR img_desc LIKE :search4
              OR summary LIKE :search5
              ORDER BY datetime" 
          , $binds=[
             ['placeh'=>':search1', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
            ,['placeh'=>':search2', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
            ,['placeh'=>':search3', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
            ,['placeh'=>':search4', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
            ,['placeh'=>':search5', 'valph'=>'%'.$Search_from_submit.'%', 'tip'=>'str']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
       ) ;
      }
      // default SQL query
      else{
        if (!isset($IdFromURL)) {
          $_SESSION["ErrorMessage"]="Bad Request !";
          Config_allsites::Redirect_to($pp1->filter_page."1/i/home/");
        }

        $cursor_posts = Tbl_crud_post::rr($sellst='*', $qrywhere= "id=:IdFromURL"
          , $binds=[
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
        ) ;
      }

      while ( $rx = Db_allsites::rrnext( $cursor_posts
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
      { //echo '<pre>'.__DIR__ .DS.'Uploads'.DS.$rx->image.'</pre>';
        ?>
        <div class="card">


          <?php
          //J://awww//www//fwphp//glomodul//blog//Uploads//mvc_M_V_data_flow.jpg
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp($rx->image));
          $tmp_imgurlrel = 'Uploads/'.self::escp($rx->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <img src="<?=$tmp_imgurlrel?>" class="img-fluid card-img-top"
                 style="max-height:450px;" 
                 alt="" />
            <?php
          } 

          $tmp_imgpath = str_replace('/',DS, $pp1->shares_path)
               . 'img'.DS.'img_big'.DS.self::escp($rx->image) ;
          $tmp_imgurlrel = '/zinc/img/img_big/'.self::escp($rx->image) ;
                        if ('') {self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE img '
                           ,'$tmp_imgurlrel'=>$tmp_imgurlrel
                           ] ) ; }
          if ($rx->image and file_exists($tmp_imgpath)) { ?>
              <img src="<?=$tmp_imgurlrel?>" style="max-height:450px;" 
                   class="img-fluid card-img-top" />
              <?php
          } ?>



          <div class="card-body">
            <p><?php echo 
               str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                  nl2br(self::escp($rx->img_desc))
                  .' $tmp_imgpath='.$tmp_imgpath
                  .'<br />'.' $tmp_imgurlrel='.$tmp_imgurlrel
               ));
               //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$rx->image.')' ;
               ?>
              <!--style="float:right;" -->
              <a href="<?=$pp1->editpost?>id/<?=$rx->id?>" 
                 class="btn btn-primary btn-block"  
                 title = "Edit database table row"
              > <span class="btn btn-info">
                  Edit post data in database table row &rang;&rang; </span> </a>
            </p>

            <div><p class="card-title">
              <!--style="float:right;" -->
              <a href="<?=$pp1->edmkdpost?>flename/<?=$rx->title?>/id/<?=$rx->id?>" 
                 class="btn btn-success btn-block" 
                 title = "Markdown edit text in FILE (not in database !)"
              > <span class="btn btn-info">Edit post in <?php echo self::escp($rx->title); ?> 
                  (We cre/del .txt in op.system. TODO: cre/del .txt here) &rang;&rang; </span>
              </a>
            </p></div>


            <small class="text-muted">Category:

              <span class="text-dark">
                <a href="<?=$pp1->filter_postcateg?><?=self::escp($rx->category)?>"> 
                   <?=self::escp($rx->category)?> </a>
              </span> & Written by 

              <span class="text-dark">
                <a href="<?=$pp1->read_user?>username/<?php echo self::escp($rx->author); ?>">
                   <?=self::escp($rx->author)?></a>
              </span> On <span class="text-dark"><?php echo self::escp($rx->datetime); ?></span>

            </small>


            <hr>
            <p class="card-text">
              <?php
                 //echo nl2br($rx->summary); //echo nl2br($rx->post);
                echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                        nl2br(self::escp($rx->summary))
                     ));
              ?>
            </p>
              //means  i n c l u d e  here html :
              <?php $this->readmkdpost($pp1, $rx->title, ''); ?>
            </p>

          </div>
        </div>
        <br><?php
      } endwhile; ?>







      <!-- *****************************************************
           Comment Part Start (DETAIL OF DETAIL) 
      ****************************************************** -->
      <!-- Fetching existing comment START  -->
      <span class="FieldInfo">Comments</span>
      <br><br>
    <?php
        $qrywhere = "post_id=:IdFromURL" ;
        $cursor_comments = Tbl_crud_post_comment::rr($sellst='*' // or "SELECT ...
          , $qrywhere="post_id=:IdFromURL ORDER BY datetime desc"
          , $binds=[
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
        ) ;


    while ( $rcomment = Db_allsites::rrnext( $cursor_comments
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rcomment->rexists ):
    { ?>
      <div>
        <div class="media CommentBlock">
          <img class="d-block img-fluid align-self-start" src="Uploads/comment.png" alt="">
          <div class="media-body ml-2">
            <h6 class="lead"><?php echo $rcomment->name; ?></h6>
            <p class="small"><?php echo $rcomment->datetime; ?></p>
            <p><?php echo $rcomment->comment; ?></p>
          </div>
        </div>
      </div>
      <hr>
    <?php
  } endwhile; ?>

    <!--  Fetching existing comment END -->

      <div>
        <form class="" action="<?=$pp1->read_post?>id/<?php echo $IdFromURL ?>" method="post">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="FieldInfo">Share your thoughts about this post</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                <input class="form-control" type="text" name="CommenterEmail" placeholder="Email" value="">
                </div>
              </div>
              <div class="form-group">
                <textarea name="CommenterThoughts" class="form-control" rows="6" cols="80"></textarea>
              </div>
              <div class="">
                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
        <!-- Comment Part End -->
    </div>
    <!-- Main Area End-->

     <?php require_once("home_side_area.php"); ?>

  </div>

</div>

<!-- HEADER END -->
