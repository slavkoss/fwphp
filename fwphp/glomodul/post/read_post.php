<?php
// J:\awww\www\fwphp\glomodul\post\read_post.php
// http://dev1:8083/fwphp/glomodul/post/read_post.php
namespace b12phpfw ; //FUNCTIONAL, NOT POSITIONAL :

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;
use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;

//    1. S U B M I T E D  A C T I O N S
// mostly M O D E L  C O D E (why M-V data flow : if this code is in  c t r  we have fat c t r)
if(isset($_POST["Submit"])){
  Tbl_crud_post_comment::cc($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
  utl::Redirect_to($pp1->read_post."id/{$pp1->uriq->id}"); //$IdFromURL
} //Ending of Submit Button If-Condition




?>


<!--         2. G U I  to get user action -->

<!-- Page content CENTER-->
<div class="container mt-5">
<div class="row">
<div class="col-lg-8">
            <!-- Post content-->
  <article>
                <!-- Post header-->
    <header class="mb-4">

    <!-- Main Area Start  -  P A G E  T I T L E -->
    <!--div class="col-sm-8"-->

      <?php // $pgordno_ from_url $category_ from_url  $search_ from_submit
        $t1 = 'Blog' ;
        if ($category_from_url)  { $t1 .= ' category "'.$category_from_url .'"' ; }
        if ($search_from_submit) { $t1 .= ' found "'. $search_from_submit .'"' ; }
        if ($pgordno_from_url)   { $t1 .= ' page '. $pgordno_from_url ; }
        
        if ($t1 == 'Blog') { $t1 .= ' - all articles' ; }
        //if ($category_from_url) { echo ' - all ' . $category_from_url . ' articles' ;
        //} else {echo ' - all articles';} 

       echo utl::MsgErr();
       echo utl::MsgSuccess();


      // SQL query when Searh button is active
      if(isset($_POST["SearchButton"]))
      {
        $Search = $_POST["Search"];
        $cursor_posts = Tbl_crud_post::get_cursor($sellst='*', $qrywhere="
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
      else 
      {
        if (!isset($IdFromURL)) {
          $_SESSION["MsgErr"]="Bad Request !";
          utl::Redirect_to($pp1->filter_page."1/i/home/");
        }

        $cursor_posts = Tbl_crud_post::get_cursor($sellst='*', $qrywhere= "id=:IdFromURL"
          , $binds=[
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
        ) ;
      }
      ?>


      <!-- 1. p a g e  t i t l e -->


      <h1 class="lead"><b><?=$t1?></b> Responsive CMS Blog (PHP 7 or 8, PDO, Bootstrap 5, jQuery only for Bootstrap, no AJAX, MySQL or Oracle or...)</h1>

      <?php
      //echo $pgn_links['navbar'];

      $ordno = 0 ;
      // isset($rx->id)   Tbl_crud_post::...
      while ( $rx = Tbl_crud_post::rrnext( $cursor_posts
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
      { 
                      //echo '<pre>'.__DIR__ .DS.'Uploads'.DS.$rx->image.'</pre>';
        ++$ordno ;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '$rx='; print_r($rx) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }
        ?>


        <!-- Post title-->
        <h1 class="fw-bolder mb-1"><?=$rx->title?></h1>
        <!-- Post meta content
            Posted on January 1, 2021 by Start Bootstrap

              <span class="text-dark">
              </span>
        -->
        <div class="text-muted fst-italic mb-2">
           Category : <a class="badge bg-secondary text-decoration-none link-light"
              href="<?=$pp1->filter_postcateg?><?=self::escp($rx->category)?>"">
              <?=self::escp($rx->category)?>
           </a>
           <!--a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
           <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a-->

              Written by 
                <a href="<?=$pp1->read_user?>username/<?php echo self::escp($rx->author); ?>">
                   <?=self::escp($rx->author)?></a>

              On <span class="text-dark"><?php echo self::escp($rx->datetime); ?></span>
        </div>
        <!-- Post categories
             class="mb-5"
        -->
        <p>
                    <!--style="float:right;"   class="btn-primary"  btn btn-block btn-primary 
                         class="btn btn-info"
                      <small class="text-muted">Category:
                      </small>
                    -->
              <a href="<?=$pp1->edmkdpost?>flename/<?=$rx->title?>/id/<?=$rx->id?>" 
                 title = "Markdown edit text in FILE (not in database !)"
              > <span class="btn btn-light fw-bold" >Edit post in <?php echo self::escp($rx->title); ?> 
                  (We cre/del .txt in op.system. TODO: cre/del .txt here) &rang;&rang; </span>
              </a>

        </p>

             <p>
              <a class="btn btn-light" href="<?=$pp1->editpost?>id/<?=$rx->id?>" 
                 title = "Edit database table row"
              > <span>
                  Edit post data in database table row &rang;&rang; </span> </a>
             
              <!-- card-title   style="float:right;"
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-secondary">Secondary</button>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-warning">Warning</button>
                <button type="button" class="btn btn-info">Info</button>
                <button type="button" class="btn btn-light">Light</button>
                <button type="button" class="btn btn-dark">Dark</button>

                <button type="button" class="btn btn-link">Link</button>
                
                btn btn-success btn-block
                btn btn-info
              -->


            <hr>

              <?php
                 //echo nl2br($rx->summary); //echo nl2br($rx->post);
                echo str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                        nl2br(self::escp($rx->summary))
                     ));
              //means  i n c l u d e  here html :
              ?>

            </p>



                <!--  ***********************************
                           Preview image figure
                      ***********************************
                <figure class="mb-4"><img class="img-fluid rounded" 
                        src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." />
                </figure>
                -->
          <?php
          //J:/awww/www/fwphp/glomodul/blog/Uploads/mvc_M_V_data_flow.jpg
          // za img :  style="max-height:450px;" 
          $tmp_imgpath = str_replace('/',DS, __DIR__ .DS.'Uploads'.DS.self::escp($rx->image));
          $tmp_imgurlrel = 'Uploads/'.self::escp($rx->image) ;
          if (file_exists($tmp_imgpath)) { ?>
            <figure class="mb-4">
               <img class="img-fluid rounded" src="<?=$tmp_imgurlrel?>" alt="..." />
            </figure>
            <?php
          }
                        /*
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
                        }
                        */
          ?>


          <!-- ****************************************
               I m g  d e s c r i p t i o n
               ****************************************
          -->
          <section class="mb-5">
            <p class="fs-5 mb-4"><?php echo 
               str_replace('{{b}}','<b>', str_replace('{{/b}}','</b>', 
                  nl2br(self::escp($rx->img_desc))
                  .' $tmp_imgpath='.$tmp_imgpath
                  .'<br />'.' $tmp_imgurlrel='.$tmp_imgurlrel
               ));
               //echo '<br />('.__DIR__ .DS.'Uploads'.DS.$rx->image.')' ;
               ?>
            </p>



          <!-- ****************************************
               Post content
               ****************************************
          -->


              <br><br>
              <?php $this->readmkdpost($pp1, $rx->title, ''); ?>


                    <p class="fs-5 mb-4">Science is an enterprise that should be cherished as an activity of the free human mind... </p>
                    <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>
                    <p class="fs-5 mb-4">For me, ...</p>
                    <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. ... we're twiddling knobs here on Earth without knowing the consequences of it. Mars once had running water. Something bad happened there as well.</p>
          </section>



        <?php
      } endwhile;
      //echo $pgn_links['navbar'] ;
      ?>
    </header>

  </article>
      <br><br>



            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                        <!-- Comment with nested comments-->
                        <div class="d-flex mb-4">
                            <!-- Parent comment-->
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                <!-- Child comment 1-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                    </div>
                                </div>
                                <!-- Child comment 2-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When you put money directly to a problem, it makes a good headline.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single comment-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

       

      <?php echo '<small class="text-muted">'. __FILE__ .'</small>' ; ?>
      <br><br>
</div> <!-- end class="col-lg-8" -->

        <!-- SIDE WIDGETS  div class="col-lg-4" -->
        <!--   Categories widget-->
        <!--   Other side widget... -->
        <!--   Search widget-->
        <?php //include("home_side_area.php"); ?>
        <!-- end div class="col-lg-4" -->

</div> <!-- end class="row" -->
</div> <!-- end class="container mt-5" -->




/**
*  <!-- *****************************************************
* P o s t Part Start (DETAIL OF U S E R  AND  P O S T T Y P E) 
*  ****************************************************** --> 
*/
// $title = 'Full Post Page' ;
 //require_once($pp1->shares_path.'hdr.php');
// require_once("navbar.php");
?>

<?php
/* ?>
<!-- HEADER -->
<div class="container">
  <div class="row mt-4">
    <!-- Main Area Start-->
    <div class="col-sm-8 ">
      <!--h1>Responsive CMS Blog</h1>
      <h1 class="lead">...</h1-->
      <?php
       echo utl::MsgErr();
       echo utl::MsgSuccess();
       ?>
      <?php
      // SQL query when Searh button is active
      if(isset($_POST["SearchButton"]))
      {
        $Search = $_POST["Search"];
        $cursor_posts = Tbl_crud_post::get_cursor($sellst='*', $qrywhere="
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
      else 
      {
        if (!isset($IdFromURL)) {
          $_SESSION["MsgErr"]="Bad Request !";
          utl::Redirect_to($pp1->filter_page."1/i/home/");
        }

        $cursor_posts = Tbl_crud_post::get_cursor($sellst='*', $qrywhere= "id=:IdFromURL"
          , $binds=[
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
        ) ;
      }

      while ( $rx = Tbl_crud_post::rrnext( $cursor_posts
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
        $cursor_comments = Tbl_crud_post_comment::get_cursor($sellst='*' // or "SELECT ...
          , $qrywhere="post_id=:IdFromURL ORDER BY datetime desc"
          , $binds=[
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
        ) ;


    while ( $rcomment = utldb::rrnext( $cursor_comments
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
      </div> <!-- end div of form Comment -->
        <!-- Comment Part End -->
    </div> <!-- end div class="col-sm-8" -->
    <!-- Main Area End-->

     <?php require_once("home_side_area.php"); ?>

  </div> <!-- end div class="row mt-4" -->

</div> <!-- end div class="container" -->

<?php
*/ ?>
<!-- HEADER END -->
