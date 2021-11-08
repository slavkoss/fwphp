<?php
//i n c : nothing
namespace B12phpfw\module\blog ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;
use B12phpfw\dbadapter\post\Tbl_crud           as Tbl_crud_post ;

class Side_area extends utl
{
  public function __construct(object $pp1) 
  {
  }

  static public function show(
      object $pp1
    //, string $fltr_sort
    , string $category_from_url, string $search_from_submit, int $pgordno_from_url
    , array $other): string 
  {
    $cursor_categ = Tbl_crud_category::get_cursor($sellst='*', $qrywhere="'1'='1' ORDER BY title", $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    $dbi = utldb::getdbi() ;
    switch ($dbi)
    {
      case 'oracle' :
        $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
        $binds[]=['placeh'=>':last_rinblock',  'valph'=>4, 'tip'=>'int'];
        utldb::setdo_pgntion('1') ;

        $cursor_recent_posts = Tbl_crud_post::get_cursor($sellst='*', $qrywhere="'1'='1' ORDER BY datetime desc", $binds  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
      break;
      case 'mysql' :
        $binds[]=['placeh'=>':first_rinblock', 'valph'=>0, 'tip'=>'int'];
        $binds[]=['placeh'=>':rblk', 'valph'=>5, 'tip'=>'int'];
        utldb::setdo_pgntion('1') ;
        $cursor_recent_posts = Tbl_crud_post::get_cursor($sellst='*', $qrywhere="'1'='1' ORDER BY datetime desc", $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
      break;
      default:
              echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                  .'D B I '. $dbi .' does not exist' . '</h3>';
        //Db_ allsites::Redirect_to($pp1->filter_page) ;
        break;
    }
    ?>


    <div class="col-lg-4">
                      <!-- Right pge content-->
      <?php
      self::show_search(
         $pp1
       , $category_from_url, $search_from_submit, $pgordno_from_url
      ) ;
      self::show_categories($pp1, $cursor_categ) ;
      self::show_other($pp1, $cursor_recent_posts) ;
      ?>
      <?='<small class="text-muted">'. __FILE__ .'</small>'?>
    </div> <!-- end class="col-lg-4" -->
    <!-- end side widgets -->

    <?php
    return('1') ;
  } //e n d  f n  show_ post_ summary





  /** *****************************
  * V I E W  S N I P P E T S
  ******************************* */
  /*static private function xxx(object $pp1, object $rx): string
  { ?>
    <?php
    return('1') ;
  } //e n d  f n  xxx
  */

  static private function show_search(
      object $pp1
    , string $category_from_url, string $search_from_submit, int $pgordno_from_url
  ): string
  { 
        $fltr_sort = 'Blog' ;
        if ($category_from_url)  { $fltr_sort .= ' category "'.$category_from_url .'"' ; }
        if ($search_from_submit) { $fltr_sort .= ' found "'. $search_from_submit .'"' ; }
        if ($pgordno_from_url)   { $fltr_sort .= ' page '. $pgordno_from_url ; }
        
        //if ($fltr_sort == 'Blog') 
        if (!$category_from_url and !$search_from_submit) { $fltr_sort .= ' - all articles' ; }

        //if ($category_from_url) { echo ' - all ' . $category_from_url . ' articles' ;
        //} else {echo ' - all articles';} 

  ?>
    <!-- 1. Search widget-->
            <!-- 
               http://dev1:8083/fwphp/glomodul/blog/?Search=Nobody+made&SearchButton=  = method="get"
               http://dev1:8083/fwphp/glomodul/blog/?p/1  = method="post", but :
               $_POST=Array (
                  [Search] => Nobody made
                  [SearchButton] => 
               )
            -->
    <div class="card mb-4">
 

      <div class="card-header">
        <!--div class="text-center">  </div-->

        <p><b><?=$fltr_sort .' order by recent'?></b></p>

        <!--h4>Real life site code examples</h4-->
        <!--span style="display: inline;">
          <img src="Uploads/twitter.jpg" class="d-block img-fluid mb-3" alt="">
        </span-->


      </div>

      <div class="card-header">Search</div>

      <div class="card-body">

            <form method="post" action="<?=$pp1->filter_page?>1/i/home/"
                  class="form-inline d-none d-sm-block" 
                  title="$this->p p1->filter_page...=<?=$pp1->filter_page?>1/i/home/"
            >

              <div class="input-group">
                  <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                  <button class="btn btn-primary" id="button-search" type="button"
                          title="Find in title, summary (4000 chars), img desc (4000 chars), category, datetime. 
                          TODO: Find in content in op.system file.">
                  Go!</button>
              </div>
            </form>

      </div>
    </div>


    <?php
    return('1') ;
  } //e n d  f n  show_ search


  static private function show_categories(object $pp1, object $cursor_categ): string
  { ?>
                <!-- 2. Categories widget-->
    <div class="card mb-4">
        <div class="card-header">1. Teme (posts categories filter)</div>
        <div class="card-body">

          <a href="<?=$pp1->filter_postcateg?>">ALL</a>&nbsp;&nbsp;&nbsp;
            <?php
            while ( $rx = utldb::rrnext( $cursor_categ
              , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
            {
                ?>
                <a href="<?=$pp1->filter_postcateg?><?=$rx->title?>/p/1">
                 <span class="heading"> <?=$rx->title?></span> </a>&nbsp;&nbsp;&nbsp;
                <?php 
            } endwhile; ?>
            <br><br>

            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">Web Design</a></li>
                        <li><a href="#!">HTML</a></li>
                        <li><a href="#!">Freebies</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">JavaScript</a></li>
                        <li><a href="#!">CSS</a></li>
                        <li><a href="#!">Tutorials</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <?php
    return('1') ;
  } //e n d  f n  show_ categories

  static private function show_other(
    object $pp1, object $cursor_recent_posts
  ): string
  { 
    /*
  ?>
  <br>
  <div class="card mb-4">
    <div class="card-header">2. Recent posts (date filter)</div>
    <!--div class="card-header bg-info text-white">
       <h2 class="lead"> 2. Recent posts (date filter)</h2>
    </div-->
    <div class="card-body">
      <?php
      $ii=0 ;
      while ( $rx = utldb::rrnext( $cursor_recent_posts
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
          //$tmp_imgpath = if no img this is dir
          if ($rx->image > '' and file_exists($tmp_imgpath)
          ) 
          { 
          ?>
            <img src="<?=$tmp_imgurlrel?>" class="d-block img-fluid
                 align-self-start" width="90" height="94" alt=""
                 title="<?='$tmp_imgpath='.$tmp_imgpath.' $rx->image='.$rx->image?>">
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
      } endwhile;
      ?>
    </div> <!--e n d <div class="card-body"-->
  </div> <!--e n d <div class="card"-->



  <br>
  <div class="card mb-4">
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
  <?php 
  */ ?>



    


    <!-- 3. Other side widget-->
    <div class="card mb-4">

    <!--div class="card-header"></div-->
    <div class="card-header bg-primary text-light">
      <h2 class="lead">Side Widget</h2>
    </div>
      <div class="card-body">
        <p>We can put anything you want inside of these side widgets.
        They are easy to use, and feature the Bootstrap 5 card component!
        </p>

      <p>Responsive CMS Blog (PHP 7 or 8, PDO, Bootstrap 5, jQuery only for Bootstrap, no AJAX, MySQL or Oracle or...)</p>

      </div>


        <?php echo "<pre>
          _.-'''''-._
        .'  _     _  '.
       /   (o)   (o)   \
      |   &copy; phporacle|
      | Slavko Srakočić |
       \  '. Zagreb.'  /
        '.  ''---''  .'
          '-._____.-' 
        </pre>"; ?>


    </div>


    <?php
    return('1') ;
  } //e n d  f n  show_ other





}  //e n d  c l s

//<!-- Side Area End -->

