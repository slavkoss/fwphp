<?php
/**
*  J:\awww\www\zinc\Config_allsites.php
* cs02. I N C L U D E D  only i n  i n d e x.p h p 
* Here is :  module attributes and methods, module CRUD is in module dirs 
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;

//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
//extends  = ISA ("is a something") relation = not "conf is contained in db" but 
//"conf is addition to db" - technicaly could be in db (is not for sake of clear code)
abstract class Config_allsites extends Db_allsites
{
  // can be named AbstractEntity
  /** 
  * ****************************************************
  * 1. R O U T I N G - IS NOT NEEDED IF NO USER INTERACTIONS (ee links) 
  * ****************************************************
  */
  //url parameters (url query string) after QS='?' are key-value pairs
  //M O D U L E  & GLOBAL PROPERTIES PALLETE like Oracle Forms
  private $pp1 ; //was public. If using Composer autoloading classes set QS=''.


  public function __construct($pp1, $pp1_module_links)
  {
    // see (**1)

    //1=autol STEP_2=CONF 3=view/rout/disp 4=preCRUD 5=onCRUD
    //STEP_3=ROUT/DISP is in this parent::__construct : fw core calls method in Home_ctr cls
    
    //1.requirements_ok, 2.adresses (no constants), 3.routing, 4.dispatching

      date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi

      if (strnatcmp(phpversion(),'5.4.0') >= 0) {
            if (session_status() == PHP_SESSION_NONE) { session_start(); }
      } else { if(session_id() == '') { session_start(); } }

           // 1. C H E C K  R E Q U I R E M E N T S
           //$requirements_ok = true;
           $required_version = '5.6.0';
           if (version_compare(phpversion(), $required_version) < 0)
           { printf( "<strong>PHP too old</strong>: You're running PHP %s, but 
                     <strong>PHP %s is required</strong> to run this program !<br />\n"
                     , phpversion(), $required_version);
             //$requirements_ok = false;
             exit(0) ;
           }
           //if (! function_exists('ocilogon'))
           /*if (! function_exists('PDO::prepare'))
             { echo "<strong>PHP has no Oracle OCI support</strong>: Your PHP installation doesn't have the 
                     <a href=\"http://www.php.net/manual/en/ref.oci8.php\">OCI8 module</a> 
                     installed which is required to run this program !<br />\n";
              $requirements_ok = false;
              exit(0) ;
             } */

           if (! function_exists('session_start'))
             { echo "<h3>PHP has no session support</h3>: 
             Your PHP installation doesn't have the 
             <a href=\"http://www.php.net/manual/en/ref.session.php\">Session module</a> 
             installed which is required to run this program !<br />\n";
              $requirements_ok = false;
              exit(0) ;
             }


      //***** 2. DEFINE  A D R E S S E S  (NO CONSTANTS) **********************
      if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
      if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

      $module_towsroot = $pp1->module_towsroot ;
      //module dir (f or autoload clses) (rtrim(ltrim(... has error !!) :
      $module_path = $pp1->module_path_arr[0] ; 
            //str_replace('\\','/', $module_dir .'/') ; //rtrim(ltrim(... has error !!

      /**
      *           **** 3. R O U T I N G
      */
      // see (**2)

      $wsroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
      
      // http://dev1:8083/    //= 1. U R L_P R O T O C O L :
      $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $imgrel_path = 'zinc/img/'; // img_big/oop_help/

      $uri_arr = explode(QS, $_SERVER['REQUEST_URI']) ;
      //script relpath : (with "/01_phpinfo.php")
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); 
              //or rtrim(str_replace($w sroot_path, '', $m odule_path),'/') ;
      $module_url = $wsroot_url.$module_relpath.'/';

      $uri_qrystring = '' ; if (isset($uri_arr[1])) { $uri_qrystring = $uri_arr[1] ; }
      $uri_qrystring_arr = [] ; $uri_qrystring_arr = explode('/', $uri_qrystring) ;
                // or: if (isset($_SERVER['QUERY_STRING'])) {
                //  $uri_qrystring_arr = explode('/', $_SERVER['QUERY_STRING']) ; }

                        //We want $this->u riq = stdClass Object ( [i] => home... ) :
                        // --------------------------------------------------------
                        //foreach($uri_ qrystring_arr as $k=>$v) or :
                        //url parameters after QS=? (url query string is key-value pairs) :
                        $uriq = [] ;
                        for ( $ii = 0 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
                              $ii < count($uri_qrystring_arr) ; //expr2 is evaluated at iteration begin
                              $ii++ ) :              //expr3 is evaluated at iteration end
                        {
                          if (isset($uri_qrystring_arr[$ii + 1])) {
                            $uriq[$uri_qrystring_arr[$ii]] = $uri_qrystring_arr[++$ii] ;
                          }
                          else {
                            if (!isset($uri_qrystring_arr[0]) or !$uri_qrystring_arr[0] ) 
                            { 
                               $uriq = ['i' => 'home'] ;
                            } //means url is module`s url
                          }
                        } endfor;


      $pp1 = (array)$pp1 ;
      $pp1['uriq'] = (object)$uriq ;
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
          , 'A D R E S S E S  in Config_allsites.php'    => '~~~~~~~~~~~~~~~~'
          //, 'vendor_namesp_prefix'=> $vendor_namesp_prefix
          , 'module_towsroot'     => $module_towsroot
          , 'wsroot_path'         => $wsroot_path
          , 'wsroot_url'          => $wsroot_url
          , 'imgrel_path'         => $imgrel_path
          , 'module_path'         => $module_path
          , 'uri_arr'             => $uri_arr
          , 'module_relpath'      => $module_relpath
          , 'module_url'          => $module_url
          , 'uri_qrystring_arr'   => $uri_qrystring_arr
          //
          , 'ROUTES (LINKS)  IN  M O D U L E  CTR Home_ctr.php' => '~~~~~~~~~~~~~~~~~'
        ] ;

        $pp1 += $pp1_module_links ;

      $this->setp('pp1', (object)$pp1) ; //$this->p p1 = (object)$p p1 ;

      //$this->set_default_cls_states_atr($this->p p1);
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .'Coding step cs03. R O U T I N G ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '<b>$_POST</b>='; print_r($_POST); 
                  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  echo '<br /><b>$this->p p1</b>='; print_r($this->getp('pp1'));
                  echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 
                  echo '<br /><b>uri_arr is exploded string REQUEST_URI '.$_SERVER['REQUEST_URI'].' (on QS=?)</b>'
                  .'<br />0 is $module_relpath,'
                  .'<br />1 is $uri_qrystring = key-value pairs ee = url parameters after QS.'
                  .'  <br />$this->p p1->uri_arr='; print_r($this->getp('pp1')->uri_arr);
                  echo '<br /><b>exploded $uri_qrystring (on /) is'
                  .'<br />$this->p p1->uri_qrystring_arr</b>=';
                      print_r($this->getp('pp1')->uri_qrystring_arr);
                  //echo '<br /><b>key-value pairs in one assoc arr line =  $u riq</b>='; print_r($u riq);
                  echo '<br /><b>$this->u riq</b>='; print_r($this->getp('pp1')->uriq);
                  echo '</pre>'; 
                  }
                    /*.'<span style="color: red; font-size: large; font-weight: bold;">'
                    .'B A D &nbsp;R O U T I N G'
                    .'<br /> See if $u riq is created OK in Config_blog.php.'
                    .'</span>' */


      /**
      *           **** 4. D I S P A T C H I N G
      * may be in module`s Home_ ctr (code here in Config_ allsites is global for all sites)
      */
    /**
    * ************* coding step cs04. *******************
    * DISPATCHER: calls Home_ctr cls method (CONVENTION : i=ctrakcmethod) which 
    * calls fns or includes view scripts (http jumps only to other module)
    * Dispatching using home class methods is based on Mini3 php fw.
    *****************************************************
    */
        $pp1 = $this->getp('pp1') ; //fn params are in  p p 1
        $akc = $pp1->uriq->i ; 
        $this->callf($akc, $pp1) ; //public fn (in child cls) calls private fns (in child cls)
        // OR (fns in child cls must be public, not private to be called from here) :
        //Fatal error: Uncaught Error: Call to private method B12phpfw\Home_ctr::home() from context 'B12phpfw\Config_allsites' 
        //$this->$akc($pp1) ; 
  } //e n d  __ c o n s t r u c t  see (**3)


  //UNIVERSAL prop. setter to assign prop. :  __set MAGIC METHOD or:
  public function setp($property, $value){
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
  //$user1 = new User('John', 40); //$this->name = $name;  $this->age = $age; //both are private
  //$user1->__set('age', 41);
  //echo $user1->__get('age');







      /**
      *  RENAME  R O W  C O L U M N S  TO LOWERCASE  FOR ORACLE
      */
    static public function rlows($r) //all row fld names lowercase
    {
      foreach ((array)$r as $key => $val) {
        switch (true) {
          case $key == 'DATETIME2' : //datetime is reserved word in Oracle DB
            $rlows['datetime'] = $val ;
          default:
            $rlows[strtolower($key)] = $val;
            break;
        }
      }
      return (object)$rlows;
    }

    // S E C U R I T Y  M E T H O D S
    //prevent XSS attacks by ESCAPING OUTPUT. XSS = cross-site scripting attack
    // - XSS attacks hacker injects malicious client-side code into output of your page
    static public function escp($string) //ESCAPING OUTPUT
    {
      $data = trim($string);
      $data = stripslashes($data);
      /**
      * escaping output in PHP
      * <iframe title="Prevent XSS Attacks. Escape Strings in PHP" width="700" height="394" src="https://www.youtube.com/embed/pc0V9hJpE54?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      */
      //scalpel - recommended : ONLY encodes a small set of the most problematic chars :
      return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
      // hammer - can cause display problems : encode ANY char that has an HTML entity equivalent
      //return h tmlentities($string, ENT_QUOTES, 'UTF-8');
    }



    public function Redirect_to($New_Location){
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE header(...'
                          ,'aaaaaa'=>'bbbbbb'
                           //, 'New_Location'=>$New_Location
                           //,'self::$d bi'=>self::$dbi
                           //,'$caller'=>$caller
                           //, '$dsn'=>$dsn
                           ] ) ; 
                        }
      header("Location:".$New_Location);
      exit;
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
public static function get_pgnnav( $rtbl = 0, $mtd_to_inc_view = '/i/home/', $uriq, $rblk = 5 )
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
        $navbar .= $fmt_tmp1.str_pad($pg, 3, '0', STR_PAD_LEFT).$fmt_tmp2 ;
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
       .' Total count '.$rtbl
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
     * Get the entity fields
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
        return(1); //all  r i g h t s : to see extra reports, upload new data...
        break;
      default: //case 'korisnik':
        return(0); // web users r i g h t s
        break;
    }
  }





    /**
     * Map the setting of non-existing fields to a mutator when
     * possible, otherwise use the matching field
     */
    /* public function __set($name, $value) {
        $field = "_" . strtolower($name);

        if (!property_exists($this, $field)) {
            throw new InvalidArgumentException(
                "Setting the field '$field' is not valid for this entity.");
        }

        $mutator = "set" . ucfirst(strtolower($name));
        if ( method_exists($this, $mutator)
             and is_callable(array($this, $mutator))
        ) {
            $this->$mutator($value) ;
        }
        else {
            $this->$field = $value;
        }

        return $this;
    } */

    /**
     * Map the getting of non-existing properties to an accessor when 
     * possible, otherwise use the matching field
     */
    /* public function __get($name) {
        $field = "_" . strtolower($name);

        if (!property_exists($this, $field)) {
            throw new InvalidArgumentException(
                "Getting the field '$field' is not valid for this entity.");
        }

        $accessor = "get" . ucfirst(strtolower($name));
        return (method_exists($this, $accessor) &&
            is_callable(array($this, $accessor)))
            ? $this->$accessor() : $this->field;
    } */




    // (**1)
    //require __DIR__ . '/conn_dbi_obj.php'; //Oracle or MySQL or... (as you wish)
                  //not here parent::__construct($p p1);
                  //not here get_ or_new_dball, but only in private fn set_d bobj!!

          // to be called from  J S :
          //LINUX (not Windows) Warning: Cannot modify header information - headers already sent by (output started at /home/slavkoss/public_html/zinc/Config_allsites.php:35) in /home/slavkoss/public_html/zinc/Config_allsites.php on line 249
          //SCRIPT LANGUAGE="JavaScript">
          /*f unction jsmsgyn(p_todo, p_url) {
            var ret;
            var r = confirm(p_todo);
            if (r == true) { 
               ret = '1';
               if (p_url) { location.href=p_url; }
            } else { ret = '0'; }
            //The button you pressed is displayed in the result window.
            //document.getElementById("demo").innerHTML = ret;
            return ret ;
          } */
          // /SCRIPT>


      // (**2)
                /**
                http://dev1:8083/fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
                $_SERVER['DOCUMENT_ROOT']   J:/awww/www/ 

                $_SERVER['REQUEST_METHOD']   GET
                $_SERVER['REQUEST_URI']   /fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
                $_SERVER['SCRIPT_NAME']   /fwphp/glomodul/z_examples/01_phpinfo.php 

                $_SERVER['PHP_SELF']

                $_SERVER['QUERY_STRING']   aaa/111

                $_SERVER['REQUEST_SCHEME']   http 
                $_SERVER['SERVER_NAME']      dev1 
                $_SERVER['SERVER_PORT']      8083
                $_SERVER['HTTP_HOST']        dev1:8083 

                SERVER_ADDR is the address of the server PHP code is run on. 
                REMOTE_ADDR = IP address from which the user is viewing the current page
                            = IP address the request arrived on
                on localhost REMOTE_ADDR is same as SERVER_ADDR

                On PHP 5.2, one must write
                $ip = getenv('REMOTE_ADDR', true) ? getenv('REMOTE_ADDR', true) : getenv('REMOTE_ADDR') 
                */

              /*
              // (**3)  Slim does same as  __ c o n s t r u c t  so :
              use Psr\Http\Message\ResponseInterface as Response;
              use Psr\Http\Message\ServerRequestInterface as Request;
              use Slim\Factory\AppFactory;

              require __DIR__ . '/../vendor/autoload.php';

              $app = AppFactory::create();

              $app->get('/hello/{name}', f unction (Request $request, Response $response, array $args) 
              {
                  $name = $args['name'];
                  $response->getBody()->write("Hello, $name");
                  return $response;
              });

              $app->run();
              */

} // e n d  c l s  
