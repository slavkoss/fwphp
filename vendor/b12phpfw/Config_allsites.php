<?php
/**
*  J:\awww\www\b12phpfw\Config_ allsites.php
*/

declare(strict_types=1);

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\b12phpfw ;

//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
abstract class Config_allsites //extends Db_ allsites
{
  // can be named AbstractEntity

  // 1. R O U T I N G - IS NOT NEEDED IF NO USER INTERACTIONS (ee links) 
  //url parameters (url query string) after QS='?' are key-value pairs

  //M O D U L E  & GLOBAL (COMMON) PROPERTIES (for all sites) PALLETE like in Oracle Forms
  private $pp1 ; //was public, protected


    // Dispatching ;
    protected function dispatcher(object &$pp1) { //static
            // CALLED FROM Config_ allsites __c onstruct
            // so: return static::$dispatcher($pp1); // Here comes Late Static Bindings
      //this fn calls method in this Home_ ctr which has parameters in  $ p p 1
      // here can be added in $pp1 module dependent parameters
      //$ a k c  is  m o d u l e  method (in Home_ ctr, not global method)
      
      // http://dev1:8083/fwphp/glomodul/adrs/?i/ex1

      $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__  ;

      $akc = $pp1->urlqry_parts[1]??'home' ; 
      if ( is_callable(array($this, $akc)) ) { // and m ethod_exists($this, $akc)
        $this->$akc($pp1) ; //self::$akc($pp1) ;
      } else {
        echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
        echo '(Home_ ctr) Method "<b>'. $akc .'</b>" is not callable (should be protected or public, not private !).' ;
        echo '<pre>'; echo '<b>$pp1->url_parts</b>='; print_r($pp1->url_parts);
        return '0' ;
      }
    }

    // Routing ;
    protected function router(object &$pp1) { 
      $req_uri  = mb_strtolower($_SERVER['REQUEST_URI']); 
      $url_parts = explode('?', $req_uri);
      $urlqry_parts = explode('/', $url_parts[1]??'no urlqry_parts');
      //
      $pp1->pp1_group03 = '~~~~~ ROUTING (URL QUERY) <span style="color: fuchsia; font-size: normal; font-weight: bold;">CONVENTION BEFORE (UNCLEAR, UNNECESSARY) CONFIGURATION</span> CODE!! : ~~~~~' ;
      $pp1->req_uri = $req_uri ;
      $pp1->pp1_help01 = '~~~ Element 1 of url_parts is URL query :' ;
      $pp1->url_parts = $url_parts ;
      $pp1->urlqry_parts = $urlqry_parts ;
    }


  public function __construct(object &$pp1) //, array $pp1_module
  {
      $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

      if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
        //If using Composer autoloading classes set QS=''.
      if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
      date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi

           // ============================================
           // 1. C H E C K  R E Q U I R E M E N T S
           // ============================================

           $minphp_version = '7.0.0';
           if (version_compare(phpversion(), $minphp_version) < 0)
           { printf( "<h2>PHP is too old</h2>: You're running PHP %s, but 
                <strong>PHP %s is minimal PHP version needed</strong> to run this program !<br>"
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
              //exit(0) ;
             } */

           if (! function_exists('session_start'))
             { echo "<h2>PHP has no session support</h2>: 
             Your PHP installation doesn't have the 
             <a href=\"http://www.php.net/manual/en/ref.session.php\">Session module</a> 
             installed which is needed to run this program !<br />\n";
              //$r equirements_ok = false;
              //exit(0) ;
           }


      // 2. DEFINE  A D R E S S E S  (NO CONSTANTS). Adresses = paths & relative paths
      //The middleware process incoming requests and execute the code BEFORE THE CONTROLLER'S ACTIONS...
      //Frequently the middleware layer has multiply middlewares in the <b>chain</b> and they run one after another (bootstrap.php, router() dispatcher()).
      //           2.1 R O U T I N G
      $this->router($pp1); 

      //           3. D I S P A T C H I N G
      $this->dispatcher($pp1); // or Late Static Bindings


                  // IMPORTANT FOR FINDING ROUTING LOGICAL ERRORS 
                  // because Xdebug shows only SINTACTICAL errors !
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__METHOD__ .'(object $pp1) '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                    echo '<b>echo from CHILD HOME CTR cls :</b> '. __METHOD__ ;
                    echo '<pre><b>Property palette assigned globaly $pp1</b>='; 
                      print_r($this->pp1) ; 
                    echo '</pre>';
                  }
                    /*.'<span style="color: red; font-size: large; font-weight: bold;">'
                    .'B A D &nbsp;R O U T I N G'
                    .'<br /> See if $u riq is created OK in Config_blog.php.'
                    .'</span>' */

  } //e n d  __ c o n s t r u c t 








      /**
      *  RENAME  R O W  C O L U M N S  TO LOWERCASE FOR ORACLE
      */
    static public function rlows(object $r) //all row fld names lowercase
    {
      foreach ((array)$r as $key => $val) {
                if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' said:</h3>';
                echo '<pre>';
                echo '<br />$r='; print_r($r) ; 
                echo '<br />$key='; print_r($key) ; 
                echo '<br />$val='; print_r($val) ; 
                //echo '<br />'.'self::$d b i=' . self::$dbi ;
                echo '</pre>';
                }
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
                if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' said:</h3>';
                echo '<pre>';
                echo '<br />(object)$rlows='; print_r((object)$rlows) ; 
                echo '</pre>';
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

    static public function escp_row(object $r): object
    {    
      //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
      //$r->id           = (int)utl::escp($r->id) ;
      //$r->author       = (int)utl::escp($r->author) ;
            if ('') { 
            echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h2>' ;
            echo '<pre><b>$r</b>='; var_dump($r); echo '</pre>';
            }
       foreach ((array)$r as $name => &$value) {
                    if ('') {  //if ($module_ arr['dbg']) {
                    echo '<pre><b>$name</b>='; print_r($name); //echo '</pre>';
                    echo ' <b>$value</b>='; print_r($value); echo '</pre>';
                    //exit(0);
                    }
         //if (is_int((int)$value)) $value = (int)utl::escp($value) ; else 
         if (gettype($value) == 'boolean') NULL; else 
            $value = self::escp($value) ;
      } unset($value); // break the reference with the  l a s t  element
                    if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h2>' ;
                    echo '<pre><b>$r</b>='; print_r($r); echo '</pre>';
                    //exit(0);
                    }
      return($r) ;
    }

    //static protected function secure_form($form) {
    //    foreach ($form as $key => $value) {
    //        $form[$key] = self::escp($value);
    //    }
    //}



    static public function Redirect_to($New_Location){
                  if ('') {  //if ($module_ arr['dbg']) {
                  echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' said: '.'</h2>'; 
                  echo '<pre>$_GET='; echo '<b>$_ GET</b>='; print_r($_GET); echo '</pre>'; 
                  }
        if ('') { self::jsmsg( [ //str_replace('\\','/',__FILE__ ) or __METHOD__
            __METHOD__ .', line '. __LINE__ .' said'=>'where am I'
        ] ) ; }
      //server-side redirection and the target="_blank" is client-side directive
      header("Location:".$New_Location); // also 'http://www.example.com'
      ?><!--script type="text/javascript">window.open('<=$New_Location?>');</script--><?php
      die() ; //exit;
    }


    static public function Login_Confirm_SesUsrId(){
      if (isset($_SESSION["userid"])) {
         //$_SESSION["MsgErr"] = [] ;
         return true;
      }  else {
         $_SESSION["MsgErr"][] ="You are not logged in, log in is required  f o r  action you want !";
         //utl::Redirect_to(utl::pp1->l oginfrm); //ee to 'index.php?i=../user/login.php'
         return false;
      }
    }







    // S E S S  I O N  M E T H O D S  were in cls in Sessions.php
    static public function msg_err_succ(string $caller): string
    {
      $Output = '' ; 
      
      if (!isset($_SESSION["MsgErr"])) $_SESSION["MsgErr"] = [] ;
      if (!isset($_SESSION["SuccessMessage"])) $_SESSION["SuccessMessage"] = [] ;
                if ('') { self::jsmsg( [ //str_replace('\\','/',__FILE__ ) or __METHOD__
                    str_replace('\\','\\\\',__METHOD__) .', line '. __LINE__ .' said sucmsg ' => json_encode($_SESSION["SuccessMessage"])
                ] ) ; }
      //$Output = '***GREŠKA u '. $caller .'<br>' ; //for testing
      //echo $Output ; 

      $err_tmp = $_SESSION["MsgErr"] ;
      if (count($err_tmp) > 0): //print_r( $err_tmp ) ;
        //$Output = '***GREŠKA u '. $caller .'<br>' ; 
        $Output .= "<div class=\"alert alert-danger\">" ;
          foreach ($err_tmp as $value) {$Output .= self::escp($value) .'<br>' ; }
        $Output .= "</div>";
        unset($value); //unset($_SESSION["MsgErr"]) ;
        $_SESSION["MsgErr"] = [] ;
        //unset($_SESSION["MsgSuccess"]);
      endif; //break reference with  l a s t  element

      $suc_tmp = $_SESSION["SuccessMessage"] ;
      if (!is_array($suc_tmp)) {$suc_tmp = [];}
      if (count($suc_tmp) > 0):
        //$Output = 'Uspjelo u '. $caller .'<br>' ; 
        $Output .= "<div class=\"alert alert-success\">" ;
          foreach ($suc_tmp as $value) {$Output .= self::escp($value) .'<br>'; }
        $Output .= "</div>";
        unset($value); //unset($_SESSION["SuccessMessage"]) ;
        $_SESSION["SuccessMessage"] = [] ;
      endif;
      
      return $Output;
    }





/**
*             P A G I N A T O R
*          Creates navigation bar
*/
//$pgordno_from_url     // requested  p a g e  no
// nr.records in table
// nr.records in table block to display
public static function get_pgnnav($urlqry_parts, $rtbl = 0, $mtd_to_inc_view='i/home/', $rblk=5) 
{
                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$urlqry_parts ='; print_r($urlqry_parts) ;
                      echo '</pre>';
                      exit(0) ;
                    }
  $qs = QS;
  $total_pages = ceil($rtbl / $rblk);


  //     ~ 1. P A G I N A T I O N  V A R I A B L E S ~

  if (isset($urlqry_parts[3])) { //was $urlqry_parts->p ;
    $_SESSION['filter_tbl']['pgordno_from_url']  = $urlqry_parts[3] ;
  } else {$_SESSION['filter_tbl']['pgordno_from_url']  = 1 ;}

  $pgordno_from_url = $_SESSION['filter_tbl']['pgordno_from_url'] ;

      //$show_all_r = isset($u riq->pgn) and $u riq->pgn == 'ALL' ? '1' : '' ;
      //if($show_all_r){ $first_rinblock = 0; } else
        if($pgordno_from_url < 2){ $first_rinblock = 1; } 
        else{$first_rinblock = ($pgordno_from_url * $rblk) - $rblk + 1; }

      //if($show_all_r){ $l ast_ r inb lock  = $rtbl ; } else
         $last_rinblock  = $first_rinblock + $rblk - 1 ;
         if ($last_rinblock > $rtbl) $last_rinblock  = $rtbl ;



   //     ~ 2. N A V B A R  P G N  L I N K S  ~
   // eg  $req_uri  is /zbig/04knjige/...paginator_n avbar_no_rows.php?p/15/i/home
   //     $_SERVER["PHP_SELF"] is $req_uri without ?p/15/i/home

  // Link to first page                               11111
  $urlqry_pgn = $qs . $mtd_to_inc_view . 'p/1' ;
  $navbar = "<div>" ." <a class='button' href='$urlqry_pgn'>&lt;&lt;</a>";
      
  // Link to prev page                             -11111
  $urlqry_pgn = $qs . $mtd_to_inc_view . 'p/'
      . (($pgordno_from_url > 1) ? $pgordno_from_url - 1 : $pgordno_from_url) ;
  $navbar .= " <a class='button' href=$urlqry_pgn >&nbsp;&lt;&nbsp;</a>";

  // Link to pages between first and  l a s t  page
  for ($pg=1; $pg<=$total_pages; $pg++) {   // 11111...l a s t

        $fmt_tmp1=''; $fmt_tmp2='';
        // currpg is italic
        if ($pg==$pgordno_from_url) {$fmt_tmp1='<b><i>*'; $fmt_tmp2='</i></b>';}

        $urlqry_pgn = $qs . $mtd_to_inc_view . 'p/'. $pg ;
        $navbar .= 
          " <a class='button' href=$urlqry_pgn >" ; // href='{$qs}p/{$pg}{$mtd_to_inc_view}'
            $navbar .= $fmt_tmp1.str_pad((string)($pg), 3, '0', STR_PAD_LEFT).$fmt_tmp2 ;
        $navbar .=  '</a>';

  }


  // Link to next page                          +11111
  $urlqry_pgn = $qs . $mtd_to_inc_view . 'p/'
      . (($pgordno_from_url < $total_pages) ? $pgordno_from_url + 1 : $pgordno_from_url) ;
  $navbar .= " <a class='button' href=$urlqry_pgn >&nbsp;&gt;&nbsp;</a>";

         
  // Link to  l a s t  page                        .l a s t
  $urlqry_pgn = $qs . $mtd_to_inc_view . 'p/'. $total_pages ;
  $navbar .= " <a class='button' href='$urlqry_pgn'>&gt;&gt;</a>"
      .' &nbsp;&nbsp; Total count '.$rtbl .', '.$rblk.' on page'
  ;
  //$navbar .= " <a class='button' 
  //              href='{$qs}p/{$total_pages}{$mtd_to_inc_view}'>&gt;&gt;</a>"
  //     .' &nbsp;&nbsp; Total count '.$rtbl .', '.$rblk.' on page'
  //;

  $navbar .= '</div>' ;
  $ret_arr = [
           'navbar'=>$navbar  //'<h2>'.'aaaaaaaa'.'</h2>';
         , 'pgordno_from_url'=>$pgordno_from_url
         , 'first_rinblock'=>$first_rinblock
         , 'last_rinblock'=>$last_rinblock
  ]; 

                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$ret_arr ='; print_r($ret_arr) ;
                      echo '</pre>';
                      exit(0) ;
                    }
      return $ret_arr ; 

} // e n d  f n  g e t _ p g n n a v b a r






  public function setcsrf() {
  //Records a token to check that any SUBMITTED FORM WAS GENERATED BY THIS APPL. (not by hacker)
  //Aid CSRF protection in HTML forms
      $this->pp1->cncts->csrftoken = mt_rand(); // not sufficient f or production systems
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
        $this->pp1->cncts->username = $username;
        return(true);  // OK to login
        break;
      default:
        $this->pp1->cncts->username = null;
        return(false); // Not OK to login
        break;
    }
  }

  public function has_rights() {
    switch ($this->pp1->cncts->username) {
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

