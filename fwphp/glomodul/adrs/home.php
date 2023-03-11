<?php
//J:\awww\www\fwphp\glomodul\post\Posts.php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');

//FUNCTIONAL, NOT POSITIONAL :
namespace B12phpfw\module\adrs ;

use B12phpfw\core\b12phpfw\Config_allsites    as utl ; // init, setings, utilities
//use B12phpfw\core\b12phpfw\Db_allsites        as db_shared ;

use B12phpfw\dbadapter\adrs\Tbl_crud          as db_module ;
//use B12phpfw\dbadapter\post_comment\Tbl_crud  as db_module_comment ;
//use B12phpfw\dbadapter\post_category\Tbl_crud as db_module_category ;
//use B12phpfw\dbadapter\user\Tbl_crud          as Tbl_crud_user ;

use B12phpfw\module\adrs\Home_ctr             as Home_ctr;

//use PDO;
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];


// view cls :
class Home extends utl
{

  static protected $tbl = 'song' ; 
  static protected $pp1 ; 
  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $db_shared ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER



  public function __construct(object $pp1) 
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$db_shared = $pp1->shared_dbadapter_obj ;
  }



  static public function rrt( object $pp1, array $other ): string 
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }

    $rcount = db_module::rrcnt(self::$tbl, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ;
    $cursor = db_module::get_all($other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
        ?>

    <!-- HEADER -->
    <!-- HEADER END -->


    <!-- M a i n  Area -->
    <div class="container">

      <b><span id="ajax_pgtitle_box">Adressess (Links) count : </span><?=$rcount?></b>
             <!--input type="submit" name="submit_add_song" value="Add row" /-->

        &nbsp;&nbsp;&nbsp;<a href="<?=$pp1->module_url.QS.'i/cc/'?>">Add row</a>

                          <!-- finish this if Ajax is needed : -->
                          &nbsp;&nbsp; <div style="display: inline;" >
                            <!--button id="ajax_rcount_btn" 
                                    title="<?='Display rows count via jQuery Ajax in ajax_rcount_box 
                        '. $pp1->module_url.QS?>i/ajaxcountr/">
                              Ajax
                            </button-->
                            <span id="ajax_rcount_box"></span>
                          </div>
      &nbsp; Table below is displayed with <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple-DataTables</a> 
     

      <!--        main content output : List of songs
        <table class="table table-sm table-striped" id="table">
      -->
      <div class="xxbox">


        <table id="datatablesSimple">


            <thead style="background-color: #ddd; font-weight: bold;">
         <tr><td>Id</td><td>Artist</td><td>Track</td><td>Link</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            </thead>

          <tbody>


          <?php
          while ( $r = db_module::rrnext($cursor) and isset($r->id) ): 
          { 
            $id = (int)($r->id) ; //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
            //$id = utl::escp($r->id) ; //Argument #1 ($string) must be of type string, int given
            ?>
            <tr>
              <td><?=$id?></td>
              <td><?php if (isset($r->artist)) echo utl::escp($r->artist); ?></td>
              <td><?php if (isset($r->track)) echo utl::escp($r->track); ?></td>
              <td>
                  <?php if (isset($r->link)) { ?>
                    <a href="<?=utl::escp($r->link)?>">
                       <?=utl::escp($r->link)?></a>
                  <?php } ?>
              </td>

              <td>
                 <a id="erase_row" class="btn btn-danger"
                    onclick="var yes ; yes = jsmsgyn('Erase row <?=$id?>?','') ;
                    if (yes == '1') { location.href= '<?=$pp1->module_url.QS.'i/dd/id/'.$id?>/'; }"
                    title="Delete tbl row ID=<?=$id?>"
                 ><b style="color: red">Del</b></a>
              </td>
              
              <td><a href="<?=$pp1->module_url.QS.'i/uu/id/'.$id?>">Edit</a></td>
            </tr>
          <?php } endwhile; ?>
          </tbody>
        </table>


      </div>


        <p>This page was shown by View script : <?=__FILE__?></p>
    </div><!-- Main Area End -->


   <?php 

    return('1') ;
  } //e n d  f n  r r t





  static public function ex1( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
    <div class="container">
      <h2>Control flow in B12phpfw code skeleton</h2>

      This page EXAMPLE1 URL (web adress) is :
      <h3><?=$pp1->module_url?>?i/ex1/, where :</h3>
      
      <ol>
      <li>URL parts :
          <pre style="font-family:\'Lucida Console\'; font-size:medium">
              <?php echo '<b>$pp1->url_parts</b>='; print_r($pp1->url_parts); ?>
          </pre>
      </li>
      <li>first '/' in URL is web server docroot URL adress=<?=$pp1->wsroot_url?>, oper.system adress=<?=$pp1->wsroot_path?></li>
      <li>fwphp is site (folder) under web server docroot <?=$pp1->wsroot_path?>. We may create more site folders.</li>
      <li>glomodul is application - group of web pages - modules (like Oracle .fmb-s)</li>
      <li>adrs is web page - module (like Oracle .fmb)</li>
      <li>i/ex1/ is URL query</li>
      <li>i is element 0 of URL query - not used in code</li>
      <li>ex1 is element 1 of URL query parts = method in Home_ctr cls and in Home cls (aliased Home_view) where may be named diferent. 
          <br>URL query parts :
          <pre style="font-family:\'Lucida Console\'; font-size:medium">
              <?php echo '<b>$pp1->urlqry_parts</b>='; print_r($pp1->urlqry_parts); ?>
          </pre>
      </li>
      <li>
        ex1 method in Home_view cls displays this page, is caled so Home_view::ex1($pp1, $other=[... from :
              <?php echo '<b>$other[caller] </b>='; echo $other['caller'] ; ?>
      </li>
      <li>
        ex1 method in Home_view cls <?=__METHOD__?>  is in script : <?=__FILE__?>.
      </li>
      </ol>


      <p> </p>



    <p title="Press the Y key on your keyboard to execute a script. This requires JavaScript to be enabled in your browser">Hit Y to Continue.</p>

    <script>

    function showkey( e )
    {
      if( e.keyCode === 89 || e.keyCode === 121 )
      {
        alert( 'Y pressed. Thank You.' )
      }
    }

    document.onkeydown = showkey

    </script>

    </div>

    <!--  END -->

    <?php
    return('1') ;
  } //e n d  f n  e x 1




  static public function ex2( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
    <div class="container">

      <h2>EXAMPLE2 page recives more parameters</h2>


      <ol>
      <li>This page URL $_SERVER['REQUEST_URI'] is : <b><?=$pp1->req_uri?></b>
      <li>This page EXAMPLE2 RECIVES TWO PARAMETERS (see page EXAMPLE1).
          </b>p1 and p2. 
          <br>All <b>even index values, are not used in code</b> (are programer's info).
          URL query parts :
          <pre style="font-family:\'Lucida Console\'; font-size:medium">
              <?php echo '<b>$pp1->urlqry_parts</b>='; print_r($pp1->urlqry_parts); ?>
          </pre>
             <ol>
             <li>url GET parameter p1=<?=$pp1->urlqry_parts[3]?>, p1 = second even index value (first=0 'i' means "method name in Home_ctr is in next index value 1")
             <li>url GET parameter p2=<?=$pp1->urlqry_parts[5]?>
             </ol>
      </ol>


        <p>You are in View: <?=__FILE__?></p>
    </div>

    <!--  END -->

    <?php
    return('1') ;
  } //e n d  f n  e x 2



  static public function hdr( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?=$pp1->title??'Adrs'?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- < 3 kB -->
        <link href="/vendor/b12phpfw/themes/mini3.css" rel="stylesheet">

        <link href="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl.css" rel="stylesheet">


    </head>
    <body>

    <!--  END -->

    <?php
    return('1') ;
  } //e n d  f n  h d r



  static public function navbar( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
    <div class="logo"></div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?=$pp1->module_url?>">home</a>
        <a href="<?=$pp1->module_url.QS?>i/ex1/">example1</a>
        <a href="<?=$pp1->module_url.QS?>i/ex2/p1/param1/p2/param2/">example2</a>
        <a href="<?=$pp1->module_url.QS?>i/rrt/">Addresses</a>
    <?=$pp1->dbicls?>
    </div>

    <!-- NAVBAR END -->

    <?php
    return('1') ;
  } //e n d  f n  n a v b a r



  static public function ftr( object $pp1, array $other ): string 
  { 
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'. __METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
   ?>
   <!--  -->
    <div class="footer">

        <?=$pp1->module_version?> &copy; Slavko Srakočić, Zagreb, see on GitHub  
        <a href="https://github.com/slavkoss/fwphp">B12phpfw</a>.
        <br>
        This is MINI3 PHP fw on code skeleton B12phpfw. Based on GitHub
        <a href="https://github.com/panique/mini3">MINI3</a>.

            <?php
                if ($pp1->dbg == '1') {echo '<pre>'.__FILE__.' ln='.__LINE__.' said:</pre>';
                echo '<pre>';
                echo '<br />$pp1='; print_r($pp1) ; 
                echo '</pre>';
                }
           ?>
 </div>

     <script>
        //var MODULE_URL = "<?=$pp1->module_url?>";
    </script>

    <script src="<?=$pp1->shares_url?>/util.js" type="text/javascript"></script>

    <!-- our JavaScript -->
    <script src="<?=$pp1->module_url?>/module.js"></script>



    <script src="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl.js"></script>
    <script src="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl_new.js"></script>
 


</body>
</html>

    <!--  END -->

    <?php
    return('1') ;
  } //e n d  f n  f t r



}  //e n d  c l s
