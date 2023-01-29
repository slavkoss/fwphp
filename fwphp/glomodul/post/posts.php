<?php
//J:\awww\www\fwphp\glomodul\post\Posts.php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');

//FUNCTIONAL, NOT POSITIONAL :
namespace B12phpfw\module\post ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
//use B12phpfw\core\b12phpfw\Db_allsites        as utldb ;

use B12phpfw\dbadapter\post\Tbl_crud          as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_post_comment ;
use B12phpfw\dbadapter\post_category\Tbl_crud as Tbl_crud_post_category ;
use B12phpfw\dbadapter\user\Tbl_crud          as Tbl_crud_user ;

use B12phpfw\module\blog\Home_ctr             as Home_ctr;

//use PDO;
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];


// view cls :
class Posts extends utl
{

  static protected $pp1 ; 
  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER

  public function __construct(object $pp1) 
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
  }

  static public function show( object $pp1, array $other ): string 
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    $title = 'MSG Dashboard';
    require $pp1->shares_path . '/hdr.php';
    require_once("navbar.php");  //require_once("navbar_admin.php");
  ?>

  <!-- HEADER -->
  <!-- HEADER END -->


  <!-- Main Area -->
  <main class="container">
    <div class="grid">

      <section>
         <h4>Posts table (dashboard), order by recent</h4>

          <!-- S U M S  &  L I N K S -->
          <a title="Create post" class="contrast" href="<?=$pp1->addnewpost?>">Posts : 
              <?php echo Tbl_crud_post::rrcnt($pp1, 'posts') ; // rrcount
                //echo Tbl_crud_post::rr count( $pp1, $qrywhere="'1'='1'"
                // , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ; //'posts'
          ?></a>

          &nbsp; &nbsp; &nbsp;
          <a title="Create comment" class="contrast" href="<?=$pp1->comments?>">Comments : 
              <?php echo Tbl_crud_post_comment::rrcnt($pp1, 'comments'); //rrcount
              //echo Tbl_crud_post_comment::rr count( $pp1, $qrywhere="'1'='1'"
              //   , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ); //'comments'
          ?></a>

          &nbsp; &nbsp; &nbsp;
          <a title="Create category" class="contrast" href="<?=$pp1->categories?>">Categories : 
              <?php echo Tbl_crud_post_category::rrcnt($pp1, 'category') ; // rrcount
                 //echo Tbl_crud_pcategory::rr count( $pp1, $qrywhere="'1'='1'"
                 // , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ); //'category'
          ?></a>
          &nbsp; &nbsp; &nbsp
          <a title="Create admin" class="contrast" href="<?=$pp1->admins?>">Admins : 
              <?php echo Tbl_crud_user::rrcnt($pp1, 'admins') ; // rrcount
                  //echo Tbl_crud_user::rr count( $pp1, $qrywhere="'1'='1'"
                  //  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ; //'admins'
          ?></a>
          <!-- E n d  s u m s -->



        <!-- T B L -->
        <div>
          <?php
          echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);
           ?>
          <table>
            <thead><tr><th>No.</th><th>Title is (markd./html) op.system file</th><th>Date&Time</th><th>Category</th><th>Author</th>
                  <th>Comments</th><th>Show</th></tr></thead>
            <tbody>
            <?php

            $SrNo = 0;
            $dbi = self::$utldb::getdbi() ;
            switch ($dbi)
            {
              case 'oracle' :
                //$binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
                //$binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
                self::$utldb::setdo_pgntion('1') ;

                $cursor_posts = Tbl_crud_post::get_cursor("SELECT * FROM posts ORDER BY datetime desc"
                  , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
              break;

              case 'mysql' :
                //$binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
                //$binds[]=['placeh'=>':rblk', 'valph'=>6, 'tip'=>'int'];
                self::$utldb::setdo_pgntion('1') ;

                // LIMIT :first_rinblock, :rblk
                $cursor_posts = Tbl_crud_post::get_cursor($sellst='*'
                   , $qrywhere= "'1'='1' ORDER BY datetime desc"
                   , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
                ) ;
            }

          // isset($rx->id)   Tbl_crud_post::...
          while ( $rx = Tbl_crud_post::rrnext( $cursor_posts
             , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
          { //all row fld names lowercase
              $SrNo++;

              $rcnt_approved = Tbl_crud_post_comment::rrcount( $pp1
                , $qrywhere="post_id=:id AND status=:status"
                , $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                         , ['placeh'=>':status', 'valph'=>'ON', 'tip'=>'str']
                ]
                , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

              $rcnt_disapproved = Tbl_crud_post_comment::rrcount( $pp1
                , $qrywhere="post_id=:id AND status=:status"
                , $binds=[ ['placeh'=>':id',     'valph'=>$rx->id, 'tip'=>'int']
                         , ['placeh'=>':status', 'valph'=>'OFF', 'tip'=>'str']
                ]
                , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

              ?>


                <tr>
                  <td><?=$SrNo?></td><td><?=$rx->title?></td><td><?=$rx->datetime?></td>

                  <td><?=$rx->category?></td><td><?=$rx->author?></td>

                  <td>
                    <?php
                    if ($rcnt_approved > 0) { ?>
                       <span class="badge badge-success"><?=$rcnt_approved?> approved </span><?php }
                    ?>
                    <?php
                    if ($rcnt_disapproved > 0) { ?>
                       <span class="badge badge-danger"><?=$rcnt_disapproved?> disappr. </span><?php }
                    ?>
                  </td>

                  <td>
                     <a target="_blank" href="<?=$pp1->read_post?>id/<?=$rx->id?>"
                        title="Preview post id <?=$rx->id?>. To delete post :
1. delete op.system file <?=$rx->title?> (if exists)
2. delete post in PHPMyAdmin 
or write code to do 1. and 2. (it is easy)"
><span><?=$rx->id?></span></a>

                  </td>

                </tr>



              <?php 
            } endwhile; ?>
            </tbody>
          </table>
        </div><!-- E n d  T B L -->

      </section>

    </div><!--  class="grid" -->

    


  </main><!-- Main Area End -->


   <?php 
   require $pp1->shares_path . 'ftr.php';

    return('1') ;
  } //e n d  f n  s h o w








  static public function read_post( object $pp1, array $other ): string 
  {

    $uriq = $pp1->uriq ;
    $IdFromURL = (int)$uriq->id ; 

    //$css1  = 'styles.css' ;

    //    1. P R E V I O U S  A C T I O N S
    $category_from_url = (isset($uriq->c) and null !== $pp1->uriq->c) ? $pp1->uriq->c : '' ;
    if (isset( $_SESSION['filter_posts']['search_from_submit']))
       $search_from_submit = $_SESSION['filter_posts']['search_from_submit'] ; 
    else $search_from_submit = '' ; 

    if (isset( $_SESSION['filter_posts']['pgordno_from_url']))
       $pgordno_from_url = $_SESSION['filter_posts']['pgordno_from_url'] ; 
    else $pgordno_from_url = '' ; 

    //    1. S U B M I T E D  A C T I O N S
    // mostly M O D E L  C O D E (why M-V data flow : if this code is in  c t r  we have fat c t r)
    if(isset($_POST["Submit"])){
      Tbl_crud_post_comment::cc($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
      utl::Redirect_to($pp1->read_post."id/{$pp1->uriq->id}"); //$IdFromURL
    } //Ending of Submit Button If-Condition





            // $pgordno_ from_url $category_ from_url  $search_ from_submit
            $t1 = 'Blog' ;
            if ($category_from_url)  { $t1 .= ' category "'.$category_from_url .'"' ; }
            if ($search_from_submit) { $t1 .= ' found "'. $search_from_submit .'"' ; }
            if ($pgordno_from_url)   { $t1 .= ' page '. $pgordno_from_url ; }
            
            if ($t1 == 'Blog') { $t1 .= ' - all articles' ; }
            //if ($category_from_url) { echo ' - all ' . $category_from_url . ' articles' ;
            //} else {echo ' - all articles';} 

           echo utl::msg_err_succ(__FILE__ .' '.', ln '. __LINE__);

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



    <?php
    $title = 'Full Post Page' ;
    require_once $pp1->shares_path . '/hdr.php';  //require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");
    ?>
    <!--         2. G U I  to get user action -->
    <!-- Page content CENTER-->
  <main class="container">
    <div class="grid">

      <section>
                <!-- Post content-->
        <!--article--> <!-- narrows page body -->
                    <!-- Post header-->
        <!--header--> 

        <!-- Main Area Start  -  P A G E  T I T L E -->
        <!--div class="col-sm-8"-->

          <!-- 1. p a g e  t i t l e -->

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
            <div>
               Category : <a href="<?=$pp1->filter_postcateg?><?=self::escp($rx->category)?>"">
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
            <br><p>
                        <!--style="float:right;"   class="btn-primary"  btn btn-block btn-primary 
                             class="btn btn-info"
                          <small class="text-muted">Category:
                          </small>

                  <a href="<?=$pp1->edmkdpost?>flename/<?=$rx->title?>/id/<?=$rx->id?>" 
                        -->
                  <a href="<?=$pp1->wsroot_url .'fwphp/glomodul/mkd/?i/edit/path/J:\\awww\\www\\fwphp\\glomodul\\blog\\msgmkd\\'. $rx->title?>" 
                     title = "Markdown edit text in FILE (not in database !)"
                  > Edit post in op. system file <?php echo self::escp($rx->title); ?>  &rang;&rang;
                  </a>
                  <br><span>We cre/edit .txt here and del .txt in op.system. TODO: del .txt here). </span>

            </p>

                 <p>
                  <a class="btn btn-light" href="<?=$pp1->editpost?>id/<?=$rx->id?>" 
                     title = "Edit database table row"
                  > <span>Edit post data in database table row &rang;&rang; </span> </a>
                 
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
                <h3>Post summary :</h3>
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
              <h3>Image :</h3>
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

              ?>


              <!-- ****************************************
                   I m g  d e s c r i p t i o n
                   ****************************************
              -->
              <h3>Image description :</h3>
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
                  <h3>Post content :</h3>
                  <?php $pp1->Home_ctr_obj->readmkdpost($pp1, $rx->title, ''); ?>


                        <h4>TXT AFTER EACH POST : I have odd cosmic thoughts every day</h4>

                        <p>Science is an enterprise that should be cherished as an activity of the free human mind... </p>

                        <p>Venus has a runaway greenhouse effect. ... we're twiddling knobs here on Earth without knowing the consequences of it. Mars once had running water. Something bad happened there as well.</p>

              </section>



            <?php
          } endwhile;
          //echo $pgn_links['navbar'] ;
          ?>
        

      <!-- *****************************************************
           Comment Part Start (DETAIL OF DETAIL) 
      ****************************************************** -->
      <!-- Comments section - new <section> or <div> displays right column !! -->
      <!-- Fetching existing comment START  -->
          <!-- TODO Comment with nested comments-->
              <!-- Parent comment-->
                  <!-- Child comment 1-->
      <h2>Comments</h2>
      <?php
        $qrywhere = "post_id=:IdFromURL" ;
        $cursor_comments = Tbl_crud_post_comment::get_cursor($sellst='*' // or "SELECT ...
          , $qrywhere="post_id=:IdFromURL ORDER BY datetime desc"
          , $binds=[
             ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
            ]
          , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] 
        ) ;


    while ( $rcomment = self::$utldb::rrnext( $cursor_comments
         , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rcomment->rexists ):
    { ?>
      <div>
          <div><img src="<?=$pp1->img_url?>anonymus.jpg" alt="..." /></div>
          <img src="Uploads/comment.png" alt="">
          <div>
            <h6><?php echo $rcomment->name; ?></h6>
            <p style="font-size:small;"><?php echo $rcomment->datetime; ?></p>
            <p><?php echo $rcomment->comment; ?></p>
          </div>
      </div>
      <hr>
    <?php
  } endwhile; ?>
        <!--  Fetching existing comment END -->


        <form method="post" action="<?=$pp1->read_post?>id/<?=$IdFromURL?>">
            <h3>Share your thoughts about this post</h3>

              <input type="text" name="CommenterName" placeholder="Name" value="">
              <input type="text" name="CommenterEmail" placeholder="Email" value="">

              <textarea rows="6" name="CommenterThoughts" 
                   placeholder="Join the discussion and leave a comment here!"></textarea>

              <button type="submit" name="Submit" class="btn btn-primary">Submit</button>

        </form>
      <!-- Comment Part End -->










          <?php echo '<small class="text-muted">'. __FILE__ .'</small>' ; ?>
          <br><br>

      </section>

  </div><!--  class="grid" -->

</main><!-- Main Area End -->



     <?php 
     require $pp1->shares_path . 'ftr.php';

      return('1') ;
  } //e n d  f n  r e  a d _ p o s t
}  //e n d  c l s
