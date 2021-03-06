<?php
declare(strict_types=1);
/**
*  J:\awww\www\zinc\Config_allsites.php
* cs02. I N C L U D E D  only i n  i n d e x.p h p 
* Here is :  module attributes and methods, module CRUD is in module dirs 
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;
//use B12phpfw\core\zinc\Config_allsites ;

//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
abstract class Config_allsites //extends Db_allsites
{
  // can be named AbstractEntity
  /** 
  * ****************************************************
  * 1. R O U T I N G - IS NOT NEEDED IF NO USER INTERACTIONS (ee links) 
  * ****************************************************
  */
  //url parameters (url query string) after QS='?' are key-value pairs

  //M O D U L E  & GLOBAL (COMMON) PROPERTIES (for all sites) PALLETE like Oracle Forms
  private $pp1 ; //was public. If using Composer autoloading classes set QS=''.


  public function __construct(object $pp1, array $pp1_module)
  {
    // see (**1)

    //STEP_1=n ew autol STEP_2=CONF   view/rout/disp preCRUD onCRUD
    //STEP_3=ROUT/DISP is in this parent::__construct : fw core calls method in Home_ctr cls
    
    //1.r equirements_ok, 2.adresses (no constants), 3.routing, 4.dispatching

      date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi

      /*see Autoload.php : if (strnatcmp(phpversion(),'5.4.0') >= 0) {
            if (session_status() == PHP_SESSION_NONE) { session_start(); }
      } else { if(session_id() == '') { session_start(); } } */

           // =============================================
           // 1. C H E C K  R E Q U I R E M E N T S
           // =============================================
           //$r equirements_ok = true;
           $minphp_version = '7.0.0';
           if (version_compare(phpversion(), $minphp_version) < 0)
           { printf( "<h2>PHP too old</h2>: You're running PHP %s, but 
                     <strong>PHP %s is minimal PHP version needed</strong> to run this program !<br />\n"
                     , phpversion(), $minphp_version);
             //$r equirements_ok = false;
             //exit(0) ;
           }
           //if (! function_exists('ocilogon'))
           /*if (! function_exists('PDO::prepare'))
             { echo "<strong>PHP has no Oracle OCI support</strong>: Your PHP installation doesn't have the 
                     <a href=\"http://www.php.net/manual/en/ref.oci8.php\">OCI8 module</a> 
                     installed which is r equired to run this program !<br />\n";
              $r equirements_ok = false;
              exit(0) ;
             } */

           if (! function_exists('session_start'))
             { echo "<h32PHP has no session support</h2>: 
             Your PHP installation doesn't have the 
             <a href=\"http://www.php.net/manual/en/ref.session.php\">Session module</a> 
             installed which is needed to run this program !<br />\n";
              //$r equirements_ok = false;
              //exit(0) ;
           }


      // =============================================
      // 2. DEFINE  A D R E S S E S  (NO CONSTANTS). Adresses = paths & relative paths
      // =============================================
      if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
      if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

      //$module_towsroot = $pp1->module_towsroot ;
      //rtrim(ltrim(... has error !! :
      $module_path = $pp1->module_path_arr[0] ; //assigned in index.php ! 
            //str_replace('\\','/', $module_dir .'/') ; //rtrim(ltrim(... has error !!
      //$imgrel_path = 'zinc/img/'; // img_big/oop_help/

      // =============================================
      //           3. R O U T I N G
      // =============================================
      // see (**2)

      //$wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 

      // http://dev1:8083/    //= 1. U R L_P R O T O C O L :
      $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;


      // Get module (application) relative path from URL
      //req.uri eg : /fwphp/glomodul/blog/?i/categories/
      //     0 is script relpath   : /fwphp/glomodul/blog/
      //     1 is URL query string : i/categories/
      //CONVENTION : URL query string is key(=property name) - value pairs
      //   We want $this->u r i q = stdClass Object ( [i] => categories 
      //   or [i] =>any Home_ctr method, than its_first_parameter=>paramvalue... )

      //Error on Linux : $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
      //Error on win: $REQUEST_URI = filter_input($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING);

      // URL eg http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme.md
      // $REQUEST_ URI eg /fwphp/glomodul/mkd/?i/showhtml/path/J:aww\wwww\readme.md :
      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode(QS, $REQUEST_URI) ; 

      // URL is eg http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme.md
      //FIRST PART of REQUEST_ URI is module_ relpath : eg /fwphp/glomodul/mkd/
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); //it is not $moduledir_relpath !!
                       //or rtrim(str_replace($wsroot_path, '', $module_path),'/') ;
      
      $module_url = $wsroot_url.$module_relpath.'/';

      /** -----------------------------------------------------------------
      *                  URL query array  $ u r i q
      *  $ u r i q  is from URL query string = url part after QS (=?)
      *  We transform URL to $ u r i q = key-value pairs (Home_ctr knows what they are !!) :
      *     key='i' means "in Home_ctr include script or call method", 
      *     key's value is name of included script or call method
      *  -----------------------------------------------------------------
      */
      $uri_qrystring = '' ;

        /** ---------------------------------------
        *            PATH KEY (IN ANY URL)
        *  ---------------------------------------
        * PART2 of REQUEST_ URI is after QS (=?): eg i/edit/path/J:\awww\www\readme.md
        * edit is method in Home_ctr, for path (in any URL) CONVENTIONS are :
        *   1. path key must be last key (or delimited with something...) :
        *   2. path key value MUST BE Windows path (which we later change in Linux path) :
        *      (also for Linux !! which we later change in Linux path)
        */
      if (isset($uri_arr[1])) { // PART2 of REQUEST_ URI
        $uri_qrystring = $uri_arr[1] ;
        $offset_path = strpos($uri_qrystring, 'path/');
        if (!($offset_path === false)) { // found needle in haystack
          $uri_qrystring = substr($uri_qrystring, 0, $offset_path+5) //eg i/edit/path/
           // eg J:\awww\www\readme.md :
           . str_replace( '/','\\', substr($uri_qrystring, $offset_path+5) ) 
          ;
        }
      }

      $uri_qrystring_arr = [] ;
      $uri_qrystring_arr = explode('/', $uri_qrystring) ;
      // = array :  [0] => i    [1] => edit    [2] => path    [3] => J:\awww\www\readme.md
                        // or: if (isset($_SERVER['QUERY_STRING'])) {
                        //     $uri_qrystring_arr = explode('/', $_SERVER['QUERY_STRING']) ; }

      // We transform URL to $ u r i q = key-value pairs (Home_ctr knows what they are !!) :
                         //foreach($uri_ qrystring_arr as $k=>$v) or :
      $uriq = [] ;
      for ( $ii = 0 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
            $ii < count($uri_qrystring_arr) ; //expr2 is evaluated at iteration begin
            $ii++ ) :              //expr3 is evaluated at iteration end
      {
        if (isset($uri_qrystring_arr[$ii + 1])) {
          // key eg                         keyvalue is next arr.element
          $uriq[$uri_qrystring_arr[$ii]] = rtrim($uri_qrystring_arr[++$ii], '\\') ;
        }
        else {
          if (!isset($uri_qrystring_arr[0]) or !$uri_qrystring_arr[0] ) 
          { 
             //means url is module`s url and we call home() method in Home_ctr :
             $uriq = ['i' => 'home'] ;
          } 
        }
      } endfor;


      $pp1 = (array)$pp1 ;
      $pp1['uriq'] = (object)$uriq ; //u r l  q u e r y  a r r a y
      //$this->setp('uriq', (object)$uriq) ; //$this->u riq = (object)$u riq ;

      // **************************** E N D  R O U T I N G


        $pp1 += [ 
            //'module_version'        => $module_version //c o n n e c t  (states) a t t r i b u t e s
            'F O R  $_S E S  ARR. (D B S H E M A...)' => '~~~~~~~~~~~~~~~~~'
          , 'cncts'                 => (object)[] //c o n n e c t  (states) a t t r i b u t e s
          , 'states'                => (object)[] //other states  a t t r i b u t e s
          //atr. assigned f or autol.cls in index.php and home ctr before $ p p 1 :
          //, 'autoloads'             => []
          //
          , 'A D R E S S E S  in Config_allsites.php' => 'cs02. R O U T I N G ~~~~~~~~~~~~~~~~'
          //, 'vendor_namesp_prefix'=> $vendor_namesp_prefix
          //, 'module_towsroot'     => $module_towsroot
          //, 'wsroot_path'         => $wsroot_path
          , 'wsroot_url'          => $wsroot_url
          , 'shares_url'          => $wsroot_url . 'zinc/'
          , 'img_url'             => $wsroot_url . 'zinc/img/'
          //, 'imgrel_ path'         => $imgrel_ path
          , 'lang'                => 'en'
          , 'module_path'         => $module_path

          , 'uri_qrystring'       => $uri_qrystring
          , 'uri_qrystring_arr'   => $uri_qrystring_arr
          , 'uri_arr'             => $uri_arr
          , 'module_relpath'      => $module_relpath
          , 'module_url'          => $module_url
          //
          , 'ROUTES (LINKS)  IN  M O D U L E  CTR Home_ctr.php' => '~~~~~~~~~~~~~~~~~'
        ] ;

      $pp1 += $pp1_module ;

      $this->setp('pp1', (object)$pp1) ; //$this->p p1 = (object)$p p1 ;
      $pp1 = $this->pp1 ;
      //$this->set_default_cls_states_atr($this->p p1);
                  // IMPORTANT FOR FINDING ROUTING LOGICAL ERRORS 
                  // Xdebug shoes only sintactical errors !
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .'Coding step c s 0 2. R O U T I N G ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                  echo '<pre>';
                  //     C O N F I G S :
                  //echo '<b>$_ GET</b>='; print_r($_GET); 
                  //echo '<b>$_POST</b>='; print_r($_POST); 
                  //echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  //echo '<br /><b>$this->p p 1</b>='; print_r($this->getp('pp1'));
                  //

                  //       R O U T I N G  see ftr 
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h3>'
                    .'Coding step c s 0 2. R O U T I N G ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                  //echo '<br /><b>$this->p p 1</b>='; print_r($this->getp('pp1'));
                  //
                  echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>='; print_r($_SERVER['REQUEST_URI']); 

                  echo '<br /><br />$this->p p1->uri_ arr='; print_r($this->getp('pp1')->uri_arr);
                  echo '<b>$p p1->uri_ arr is exploded string $_SERVER[\'REQUEST_URI\'] (part1 before QS=? and part2 after QS)</b>';

                  echo '<br />part1 index 0 is <b>$p p1->module_ relpath=</b>'
                    . '<b><span style="color:blue; font-size:1.4em;">'
                      . $pp1->module_relpath .'</span></b>';
                  
                  echo '<br />part2 index 1 is <b>$p p1->uri_ qrystring</b> = key-value pairs ee = url parameters after QS = <b><span style="color:blue; font-size:1.4em;">'
                      . $pp1->uri_qrystring .'</span></b>';
                  

                  echo '<br /><br /><b>EXPLODED $p p1->uri_ qrystring (on /) is'
                  .' $this->p p1->uri_ qrystring_ arr</b>=';
                      print_r($this->getp('pp1')->uri_qrystring_arr);
                  //echo '<br /><b>key-value pairs in one assoc arr line =  $u riq</b>='; print_r($u riq);
                  echo '<br />From $p p1->uri_ qrystring_ arr <b>method in Home_ ctr and method parameters : $this->u riq</b>='; print_r($this->getp('pp1')->uriq);


                  echo '</pre>'; 
                  }
                    /*.'<span style="color: red; font-size: large; font-weight: bold;">'
                    .'B A D &nbsp;R O U T I N G'
                    .'<br /> See if $u riq is created OK in Config_blog.php.'
                    .'</span>' */

    // =============================================
    //           4. D I S P A T C H I N G
    // =============================================
    // may be in module`s Home_ ctr (code here in Config_ allsites is global for all sites)
    /**
    * ************* coding step cs04. *******************
    * DISPATCHER: calls Home_ctr cls method (CONVENTION : i=ctrakcmethod)
    * which calls fns or includes view scripts (http jumps only to other module)
    * Dispatching using home class methods is based on Mini3 php fw.
    *              E x a m p l e s  INVALID  U R L s  :
    * 1. http://phporacle.eu5.net/fwphp/glomodul/mkd/?edit=001_MDcheatsheet.txt
    * 2. http://phporacle.eu5.net/fwphp/glomodul/mkd/?edit=01/001_php/B12phpfw.mkd
    * or txt, md, mkd anywhere :
    * 3. http://sspc2:8083/fwphp/glomodul/mkd/?edit=J:/awww/www/readme.md
    * ? in "?edit" is QS (U R L Query Separator)
    *             E x a m p l e s  VALID  U R L s  :
    * Must be present "i/m" where m=Home_ctr_method_name which includes script 
    * or calls any method in any class in clsscripts dirlist in index.php !!, so :
    * http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/"J:/awww/www/readme.md"
    *****************************************************
    */
        unset($pp1) ; //for easier debugging if next 2 lines are switched
        $pp1 = $this->getp('pp1') ; //fn params are in  p p 1
        $akc = $pp1->uriq->i ;      //fn name (by user entered URL we put in uriq array)
        $this->call_module_method($akc, $pp1) ; //protected fn (in child cls) calls private fns (in child cls)
        // OR (fns in child cls must be public, not private to be called from here) :
        //Fatal error: Uncaught Error: Call to private method B12phpfw\Home_ctr::home() from context 'B12phpfw\Config_allsites' 
        //$this->$akc($pp1) ; 
  } //e n d  __ c o n s t r u c t  see (**3)


  //UNIVERSAL prop. setter to assign prop. :  __set MAGIC METHOD or:
  public function setp($property, $value){
    //not working static fn if(property_exists('Config_allsites', $property)){
    if(property_exists($this, $property)){
      $this->$property = $value;
    }
    return $this;
  }
  //UNIVERSAL prop. getter to access prop. :  __get MAGIC METHOD or :
  public function getp($property){
    if(property_exists($this, $property)){
      return $this->$property;
    }
  }
  //$user1 = n ew User('John', 40); //$this->name = $name;  $this->age = $age; //both are private
  //$user1->__set('age', 41);
  //echo $user1->__get('age');







      /**
      *  RENAME  R O W  C O L U M N S  TO LOWERCASE  FOR ORACLE
      */
    static public function rlows(object $r) //all row fld names lowercase
    {
      foreach ((array)$r as $key => $val) {
        switch (true) {
          case $key == 'DATETIME2' : //datetime is reserved word in Oracle DB
            $rlows['datetime'] = $val ;
            break;
          //case is_numeric($val) :
          //  break;
          default:
            $rlows[strtolower($key)] = $val;
            break;
        }
      }
      return (object)$rlows;
    }

    // S E C U R I T Y  M E T H O D S :

    static public function escp(string $string='') //ESCAPING OUTPUT and input
    {
      // filter input - secure_ input
      //prevent XSS attacks by ESCAPING OUTPUT. XSS = cross-site scripting attack
      // - XSS attacks hacker injects malicious client-side code into output of your page
      $data = trim($string);
      $data = stripslashes($data);
      //scalpel - recommended : ONLY encodes a small set of the most problematic chars :
      return htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); //or htmlspecialchars($data);
      // hammer - can cause display problems : encode ANY char that has an HTML entity equivalent
      //return h tmlentities($string, ENT_QUOTES, 'UTF-8');
    }

    static protected function secure_form($form) {
        foreach ($form as $key => $value) {
            $form[$key] = self::escp($value);
        }
    }



    static public function Redirect_to($New_Location){
                  if ('') {  //if ($module_ arr['dbg']) {
                  echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'; 
                  echo '<pre>$_GET='; echo '<b>$_ GET</b>='; print_r($_GET); echo '</pre>'; 
                  }
        if ('') { self::jsmsg( [ //str_replace('\\','/',__FILE__ ) or __METHOD__
            __METHOD__ .', line '. __LINE__ .' SAYS'=>'where am I'
        ] ) ; }
      //server-side redirection and the target="_blank" is client-side directive
      header("Location:".$New_Location); // also 'http://www.example.com'
      ?><!--script type="text/javascript">window.open('<=$New_Location?>');</script--><?php
      die() ; //exit;
    }





    // S E S S  I O N  M E T H O D S  were in cls in Sessions.php
    public function ErrorMessage(){
      if(isset($_SESSION["ErrorMessage"])){
        $Output = "<div class=\"alert alert-danger\">" ;
        $Output .= self::escp($_SESSION["ErrorMessage"]);
        $Output .= "</div>";
        $_SESSION["ErrorMessage"] = null;
        return $Output;
      }
    }
    public function SuccessMessage(){
      if(isset($_SESSION["SuccessMessage"])){
        $Output = "<div class=\"alert alert-success\">" ;
        $Output .= self::escp($_SESSION["SuccessMessage"]);
        $Output .= "</div>";
        $_SESSION["SuccessMessage"] = null;
        return $Output;
      }
    }





/**
*             P A G I N A T O R
*          Creates navigation bar
*/
//$pgordno_from_url     // requested  p a g e
// nr.records in table
// nr.records in table block to display
public static function get_pgnnav( $rtbl = 0, $mtd_to_inc_view = '/i/home/', $uriq, $rblk = 5 ) //paginator
{
  $qs = QS;
  $total_pages = ceil($rtbl / $rblk);


  //     ~ 1. P A G I N A T I O N  V A R I A B L E S ~

  if (isset($uriq->p)) {
    $_SESSION['filter_tbl']['pgordno_from_url']  = $uriq->p ;
  } else {$_SESSION['filter_tbl']['pgordno_from_url']  = 1 ;}
  $pgordno_from_url = $_SESSION['filter_tbl']['pgordno_from_url'] ;

      //$show_all_r = isset($u riq->pgn) and $u riq->pgn == 'ALL' ? '1' : '' ;
      //if($show_all_r){ $first_rinblock = 0; } else
        if($pgordno_from_url < 2){ $first_rinblock = 1; } 
        else{$first_rinblock = ($pgordno_from_url * $rblk) - $rblk + 1; }

      //if($show_all_r){ $last_rinblock  = $rtbl ; } else
         $last_rinblock  = $first_rinblock + $rblk - 1 ;
         if ($last_rinblock > $rtbl) $last_rinblock  = $rtbl ;



   //     ~ 2. N A V B A R  P G N  L I N K S  ~
   // eg  $req_uri  is /zbig/04knjige/...paginator_navbar_no_rows.php?p/15/i/home
   //     $_SERVER["PHP_SELF"] is $req_uri without ?p/15/i/home

  // Link to first page                               11111
      //$n avbar = "<center><div id='pagination'>"
      $navbar = "<div>"
       ." <a class='button' href='{$qs}p/1$mtd_to_inc_view'>&lt;&lt;</a>";
      
  // Link to prev page                             -11111
      $navbar .= 
        " <a class='button' 
             href='{$qs}p/'
        "
         . ( ($pgordno_from_url > 1) ? $pgordno_from_url-1 : $pgordno_from_url).$mtd_to_inc_view
         . "'>&nbsp;&lt;&nbsp;</a>";

  // Link to pages between first and last page
      for ($pg=1; $pg<=$total_pages; $pg++) {   // 11111...l a s t

        $fmt_tmp1=''; $fmt_tmp2='';
        // currpg is italic
        if ($pg==$pgordno_from_url) {$fmt_tmp1='<b><i>*'; $fmt_tmp2='</i></b>';}

        $navbar .= 
          " <a class='button'
               href='{$qs}p/{$pg}{$mtd_to_inc_view}'
          " .'>';
        $navbar .= $fmt_tmp1.str_pad((string)($pg), 3, '0', STR_PAD_LEFT).$fmt_tmp2 ;
        $navbar .=  '</a>';
      }


  // Link to next page                          +11111
      $navbar .= " <a class='button' href='{$qs}p/"
         . ( ($pgordno_from_url < $total_pages) ? $pgordno_from_url+1 : $pgordno_from_url) . $mtd_to_inc_view
         . "'>&nbsp;&gt;&nbsp;</a>";
         
  // Link to last page                        .l a s t
$navbar .= " <a class='button' 
                href='{$qs}p/{$total_pages}{$mtd_to_inc_view}'>&gt;&gt;</a>"
                ." &nbsp;&nbsp; 
          <a class='button' 
             title='Rows {$first_rinblock} - {$last_rinblock}'
          " . '</a>'
       .' Total count '.$rtbl .' (eg 25 on page)'
          //."href='{$qs}p/1/pgn/all$mtd_to_inc_view'>ALL"
          //title='No pagination (f or c t r l + F)'
          //.' Tot.pages '.$total_pages
;

      //$navbar .= '</center></div>' ;
      $navbar .= '</div>' ;



      return [
           'navbar'=>$navbar  //'<h2>'.'aaaaaaaa'.'</h2>';
         , 'pgordno_from_url'=>$pgordno_from_url
         , 'first_rinblock'=>$first_rinblock
         , 'last_rinblock'=>$last_rinblock
      ]; 

} // e n d  f n  g e t _ p g n n a v b a r






  public function setcsrf() {
  //Records a token to check that any SUBMITTED FORM WAS GENERATED BY THIS APPL. (not by hacker)
  //Aid CSRF protection in HTML forms, see section CSRF example on page 9-5 in Chapter 9, "Inserting Data."
      $this->getp('pp1')->cncts->csrftoken = mt_rand(); // not sufficient f or production systems
      //??? $this->i nisetses();
  }



  public static function jsmsg($msg) 
  {
      ?><SCRIPT LANGUAGE="JavaScript">
          alert( "<?php

            foreach($msg as $k=>$v): {
              echo "\\n $k=" . 
              str_replace("{","\\n{", str_replace("}","\\n}"
                      , str_replace(",","\\n   ,",
              str_replace('\\','/',   str_replace('&quot;',' '
                ,htmlspecialchars(json_encode((array)$v), ENT_QUOTES,'UTF-8')
              )) ."\\n"
                            )
                       ))

              ;

            } endforeach ;

              ?>" ) ;
      </SCRIPT><?php
  }
                     //works str_replace("NNN",'\\n', "aaaaaaaaaaaNNNbbbbbbbb")
                     //str_replace("\\n",'NNN',json_encode((array)$v,JSON_PRETTY_PRINT))
                     //nl2br(json_encode((array)$v,JSON_PRETTY_PRINT))
                     //str_replace("<br />",'\\n',json_encode((array)$v,JSON_PRETTY_PRINT))


    /**
     * Get entity fields
     */
    public function toArray($cls) {
        return get_object_vars($cls);
    }


  public function print_objvars($obj)
  {
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val\n";
    }
  }

  public function print_clsmethods($obj)
  {
    $arr = get_class_methods(get_class($obj));
    foreach ($arr as $method) {
        echo "\tfn $method()\n";
    }
  }

  public function class_parentage($obj, $class)
  {
    //To avoid "Undefined variable" error :
    global $$obj;

    if (is_subclass_of($GLOBALS[$obj], $class)) {
        echo "Object $obj belongs to class " . get_class($GLOBALS[$obj]);
        echo ", a subclass of $class\n";
    } else {
        echo "Object $obj does not belong to a subclass of $class\n";
    }
  }


  public function uname2clsses($username) { //was auth
    switch ($username) {
      case 'admin': //break;
      case 'nonadmin': //korisnik
        $this->getp('pp1')->cncts->username = $username;
        return(true);  // OK to login
        break;
      default:
        $this->getp('pp1')->cncts->username = null;
        return(false); // Not OK to login
        break;
    }
  }

  public function has_rights() {
    switch ($this->getp('pp1')->cncts->username) {
      case 'admin':
        return(1); //all  r i g h t s : to see extra reports, upload n ew data...
        break;
      default: //case 'korisnik':
        return(0); // web users r i g h t s
        break;
    }
  }

// see comments below
} // e n d  c l s

