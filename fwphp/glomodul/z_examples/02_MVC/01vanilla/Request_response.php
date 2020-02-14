<?php

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//n amespace App\Helpers;

class Request_response //Route
{
    private static $dbg_htm = '' ;

    public function __construct() { }

    // Handle route to destinated controller,  return void
    public static function handle($pp1 = [], $REQUEST_URI)
    {
      /**
      *           **** 1. R O U T I N G
      */
      $wsroot_path = str_replace('\\','/', realpath($pp1->module_towsroot) .'/') ; 
      
      // http://dev1:8083/    //= 1. U R L_P R O T O C O L :
      $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $uri_arr = explode(QS, $REQUEST_URI) ;
      //script r e l p a t h : (with "/01_phpinfo.php")
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); 
              //or rtrim(str_replace($w sroot_path, '', $m odule_path),'/') ;
      $module_url = $wsroot_url.$module_relpath.'/';

      $uri_qrystring = '' ; if (isset($uri_arr[1])) { $uri_qrystring = $uri_arr[1] ; }
      $uri_qrystring_arr = [] ; $uri_qrystring_arr = explode('/', $uri_qrystring) ;
                    // or: if (isset($_SERVER['QUERY_STRING'])) {
                    //  $uri_qrystring_arr = explode('/', $_SERVER['QUERY_STRING']) ; }

      //We want $this->uriq = stdClass Object ( [i] => home... ) :
      // --------------------------------------------------------
      //foreach($uri_ qrystring_arr as $k=>$v) or :
      $uriq = [] ; //url parameters after QS=? (url query string is key-value pairs)
      for ( $ii = 0 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
            $ii < count($uri_qrystring_arr) ; //expr2 is evaluated at iteration begin
            $ii++ ) :              //expr3 is evaluated at iteration end
      {
        if (isset($uri_qrystring_arr[$ii + 1])) {
          $uriq[$uri_qrystring_arr[$ii]] = $uri_qrystring_arr[++$ii] ;
        }
      } endfor;
      $uriq = (object)$uriq ;
           // see **1
      if (isset($uriq->c)) {$ctr=$uriq->c .'_ctr';} else {$ctr='home_ctr';}
      if (isset($uriq->a)) {$akc=$uriq->a;} else {$akc='index';}
      $ctr = $pp1->vendor_namesp_prefix . '\\' . ucfirst($ctr);
      // **************************** E N D  R O U T I N G

      /**
      *           **** 2. D I S P A T C H I N G
      */
      $obj = new $ctr();
      $obj->$akc($uriq) ; //uriq = URL query array
      // **************************** E N D  D I S P A T C H I N G
                              if ('1') { echo __METHOD__ .', line '. __LINE__ .' SAYS: REQUESTED ROUTE ';
                                echo '<br />self::$dbg_htm=' . self::$dbg_htm ; 
                                echo '<pre>' ;
                                echo '<br />$_SERVER[\'REQUEST_URI\']=$REQUEST_URI='; print_r($REQUEST_URI) ;
                                echo '<br />$uri_qrystring='; print_r($uri_qrystring) ;
                                echo '<br />$uri_qrystring_arr='; print_r($uri_qrystring_arr) ;
                                echo '<br />$this->uriq='; print_r($uriq) ;
                                echo '<br />$ctr='; print_r($ctr) ;
                                echo '<br />$akc='; print_r($akc) ;
                                echo '</pre>';
                              }
    }
}

              /*
                        **1 :
                if http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01vanilla/
                 $uri_qrystring_arr=Array([0] => )
                 then  $this->uriq=stdClass Object ( [c] => home )

                if http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01vanilla/?aaa/111
                $uri_qrystring_arr=Array (
                    [0] => aaa
                    [1] => 111
                )
                then $this->uriq=stdClass Object
                (
                    [aaa] => 111
                )
              */

                              /*if ('1') { ob_start();
                                echo __METHOD__ .', line '. __LINE__ .' SAYS:   ';
                                echo '<pre>'; 
                                echo '</pre>';
                                self::$dbg_htm .= ob_get_clean();
                              } */

