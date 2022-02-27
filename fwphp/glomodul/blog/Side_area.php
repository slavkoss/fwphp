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


    <div>
                      <!-- Right pge content-->
      <?php
      self::show_search( $pp1, $category_from_url, $search_from_submit, $pgordno_from_url ) ;
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
        
        if (!$category_from_url and !$search_from_submit) { $fltr_sort .= ' - all articles' ; }
        ?>
        <!-- 1. Search widget-->
            <!-- 
               http://dev1:8083/fwphp/glomodul/blog/?Search=Nobody+made&SearchButton=  = method="get"
               http://dev1:8083/fwphp/glomodul/blog/?p/1  = method="post", but :
               $_POST=Array (
                  [Search] => Nobody made
                  [SearchButton] => 
               )
               $pp1->filter_page  1/i/home/     $pp1->search_from_submit
               input  S e a r c h  is not "required"
            -->
    <div>
      <div>
        <p style="color:lightblue;"><?=$fltr_sort .' order by recent'?></p>
      </div>


      <div>
        Search in title, summary, img desc, category, datetime
        <form method="post" action="<?=$pp1->home_blog?>"
          <div class="XXXgrid">
            <input type="text" name="Search" placeholder="Enter search term..." aria-label="Search">
            
            <button type="submit" name="SearchButton" id="button-search"
                    title="Find in title, summary (4000 chars), img desc (4000 chars), category, datetime. 
                  TODO: Find in content in op.system file.
                  <?=$pp1->home_blog?>        
            ">Search</button>
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
    <div>
        <p style="color:lightblue;">1. Themes (posts categories filter)</p>
        <div>

          <a href="<?=$pp1->filter_postcateg?>">ALL</a>&nbsp;&nbsp;&nbsp;
            <?php
            while ( $rx = Tbl_crud_category::rrnext( $cursor_categ
              , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ): 
            {
                ?>
                <a href="<?=$pp1->filter_postcateg?><?=$rx->title?>/p/1">
                 <span> <?=$rx->title?></span> </a>&nbsp;&nbsp;&nbsp;
                <?php 
            } endwhile; ?>
            <br><br>

            <p style="color:lightblue;">Other possible themes</p>
            <div>
                <div>
                    <ul>
                        <li><a href="#!">Web Design, HTML, CSS, JavaScript</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="#!">Tutorials</a></li>
                        <li><a href="#!">Freebies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <?php
    return('1') ;
  } //e n d  f n  show_ categories

  static private function show_other( object $pp1, object $cursor_recent_posts ): string
  { 
      //2. Recent posts (date filter)
      //3. Join the Forum (todo)
      ?>
      <br>
      <div>
        <p style="color:lightblue;">2. Recent posts (date filter)</p>
        <div>
          <?php
          $ii=0 ;
          while ( $rx = Tbl_crud_post::rrnext( $cursor_recent_posts
             , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) and $rx->rexists ):
          {
            if ($ii>9) break ;
            ?>
            <a href="<?=$pp1->filter_postcateg?><?=$rx->category?>">
             <span> <?=$rx->category?></span> </a>&nbsp;&nbsp;&nbsp;

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


              <div>
                <a style="text-decoration:none;" 
                   href="<?=$pp1->read_post?>id/<?php echo self::escp($rx->id) ; ?>" 
                   target="_blank">
                     <span><?php echo self::escp($rx->title); ?></span> </a>
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


    


    <!-- 3. Other side widget-->
    <div><pre>
          _.-'''''-._
        .'  _     _  '.
       /   (o)   (o)   \
      |   &copy; phporacle|
      | Slavko Srakočić |
       \  '. Zagreb.'  /
        '.  ''---''  .'
          '-._____.-' 
    </pre></div>


    <?php
    return('1') ;
  } //e n d  f n  show_ other





}  //e n d  c l s

//<!-- Side Area End -->

