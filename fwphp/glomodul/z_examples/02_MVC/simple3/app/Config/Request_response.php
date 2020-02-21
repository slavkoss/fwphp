<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\simple3\app\Config\Request_response.php
namespace app\Config ;
use app\Controllers ;

class Request_response //or Route (original was Bootstrap ?)
{

  public static function run($pp1 = [], $REQUEST_URI)
  {
    //     **** 1. R O U T I N G  (REQUEST)
    $URLarray = self::getURLarray($pp1, $REQUEST_URI);
      $controller = $URLarray['controller'];
      $method     = $URLarray['method'];
      $params     = $URLarray['params'];

      /**
      *    **** 2. D I S P A T C H I N G  (RESPONSE)
      */
      $namespaced_cls = '\app\Controllers\\'.$controller.'Controller';
      if(class_exists($namespaced_cls)) {
        if(method_exists($namespaced_cls, $method)) 
        {
 
          $obj = new $namespaced_cls();  //eg Home_ctr
          echo $obj->$method($params) ;  //eg index, uriq = URL query array

        } else {
          echo 'Page Not Found 404 : Method Not Found in Controller '.$controller;
        }
      } else {
        echo 'Page Not Found 404 : Controller Not Found';
      }


  }
  
  private static function getURLarray($pp1, $REQUEST_URI)
  {
    //J:\awww\www\fwphp\glomodul\z_examples\02_mvc\simple3\app\Config\Bootstrap.php
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
      //           ?CTR/AKC/PARAMS :
      $ctr = empty($uri_qrystring_arr[0]) ? 'Home' : ucfirst($uri_qrystring_arr[0]) ;
      $akc = empty($uri_qrystring_arr[1]) ? 'index' : $uri_qrystring_arr[1] ;
      $params = [];
      // save params to array
      $arrcnt = count($uri_qrystring_arr) ;
      if($arrcnt > 1) {
        for($ii=2 ; $ii < $arrcnt ; $ii++) {
          array_push($params, $uri_qrystring_arr[$ii]);
        }  
      }
              if ('1') { echo __METHOD__ .', line '. __LINE__ .' SAYS: REQUESTED ROUTE ';
                echo '<pre>' ;
                echo '<br />$_SERVER[\'REQUEST_URI\']=$REQUEST_URI='; print_r($REQUEST_URI) ;
                echo '<br />$uri_qrystring='; print_r($uri_qrystring) ;
                echo '<br />$uri_qrystring_arr='; print_r($uri_qrystring_arr) ;
                //
                echo '<br />$ctr='; print_r($ctr) ;
                echo '<br />$akc='; print_r($akc) ;
                echo '<br />$params='; print_r($params) ;
                echo '</pre>';
              }
      return ['controller' => $ctr, 'method'  => $akc, 'params' => $params];
      //e n  d           ?CTR/AKC/PARAMS

  }


          //echo call_user_func(
          //  array('\app\Controllers\\'.$controller.'Controller', $method), $params
          //);


      /*
      //           KEY - VALUE PAIRS :
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
      if (isset($uriq->c)) {$ctr=$uriq->c ;} else {$ctr='home';}
      if (isset($uriq->a)) {$akc=$uriq->a;} else {$akc='index';}
      //$ctr = $pp1->vendor_namesp_prefix . '\\' . ucfirst($ctr);
      $ctr = ucfirst($ctr);
              if ('1') { echo __METHOD__ .', line '. __LINE__ .' SAYS: REQUESTED ROUTE ';
                echo '<pre>' ;
                echo '<br />$_SERVER[\'REQUEST_URI\']=$REQUEST_URI='; print_r($REQUEST_URI) ;
                echo '<br />$uri_qrystring='; print_r($uri_qrystring) ;
                echo '<br />$uri_qrystring_arr='; print_r($uri_qrystring_arr) ;
                echo '<br />$this->uriq='; print_r($uriq) ;
                echo '<br />$ctr='; print_r($ctr) ;
                echo '<br />$akc='; print_r($akc) ;
                echo '</pre>';
              }
    return [
      //'controller' => empty($path[1]) ? 'Home' : ucfirst($path[1]),
      'controller' => $ctr,
      'method'     => $akc,
      'params'     => $uriq
    ];
      // e n d          ?KEY-VALUE PAIRS
      */
      // **************************** E N D  R O U T I N G
    


    /*
    // php.net/manual/en/function.explode.php (split in js)
                //$path = explode('/', $_SERVER['PATH_INFO']);
                //Notice: Undefined index: PATH_INFO in \app\Config\Bootstrap.php on line 31
    $params = [];
    // save params to array
    if(count($path) > 3) {
      for($n=3 ; $n < count($path) ; $n++) {
        array_push($params, $path[$n]);
      }  
    }
    return [
      'controller' => empty($path[1]) ? 'Home' : ucfirst($path[1]),
      'method' => empty($path[2]) ? 'index' : $path[2],
      'params' => $params
    ];
    */






}