<?php
// http://dev1:8083/fwphp/glomodul/z_examples/02_MVC/simple2/Webroot/
class Router
{

  static public function parse($url, $request) // , $module_towsroot
  {
    // called in dispatcher
    $url = trim($url); // $_SERVER["REQUEST_URI"]
                         echo '<h3>url & request</h3>'; 
                         echo '<pre>'; 
                           echo '$url='; print_r($url); 
                           echo '<br />request='; print_r($request); 
                         echo '</pre><br />';
    $exploded_url = explode('/', $url);
    $exploded_url = array_slice($exploded_url, 7);

    if (isset($exploded_url[0]) and $exploded_url[0]) { //ctr
      $request->controller = $exploded_url[0];
    } else $request->controller = "tasks";

    if (isset($exploded_url[1]) and $exploded_url[1]) { //ctr
      $request->action = $exploded_url[1];
    } else $request->action = "index";

    if (isset($exploded_url[2]) and $exploded_url[2]) { //ctr
      $request->params = array_slice($exploded_url, 2);
    } else $request->params = [];

             echo '<h3>Bad premise (frequent in to simple examples)</h3>'; 
             echo '<pre>'; 
               echo '$exploded_url='; print_r($exploded_url); 
               echo '<br />ctr='; print_r($request->controller); 
               echo '<br />akc='; print_r($request->action); 
               echo '<br />akcparams='; print_r($request->params); 
             echo '</pre><br />';
// **************************** E N D  R O U T I N G

  }
}

                //$request->controller = $exploded_url[0];
                //$request->action = $exploded_url[1];
                //$request->params = array_slice($exploded_url, 2);


      /**
      *           **** R O U T I N G
      */
      //$w sroot_path = str_replace('\\','/', realpath($module_towsroot) .'/') ; 
      
      // http://dev1:8083/    //= 1. U R L_P R O T O C O L :
      /*$w sroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
      */
      /*
      $uri_arr = explode(QS, $_SERVER['REQUEST_URI']) ;
      //$module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); 
      //$m odule_url = $w sroot_url.$module_relpath.'/';
      $uri_qrystring = '' ; if (isset($uri_arr[1])) { $uri_qrystring = $uri_arr[1] ; }
      $uri_qrystring_arr = [] ; $uri_qrystring_arr = explode('/', $uri_qrystring) ;
                    // or: if (isset($_SERVER['QUERY_STRING'])) {
                    //  $uri_qrystring_arr = explode('/', $_SERVER['QUERY_STRING']) ; }

      //foreach($uri_ qrystring_arr as $k=>$v) or :
      $uriq = [] ; //url parameters after QS=? (url query string is key-value pairs)
      for ( $ii = 0 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
            $ii < count($uri_qrystring_arr) ; //expr2 is evaluated at iteration begin
            $ii++ ) :              //expr3 is evaluated at iteration end
      {
        if (isset($uri_qrystring_arr[$ii + 1])) {
          $uriq[$uri_qrystring_arr[$ii]] = $uri_qrystring_arr[++$ii] ;
        } else {
          if (!isset($uri_qrystring_arr[0]) or !$uri_qrystring_arr[0] ) 
             {$uriq = ['i' => 'home'] ; } //means url is module utl
        }
      } endfor;

      //$this->uriq = (object)$uriq ;
                         echo '<h3>uri_qrystring_arr & uriq</h3>'; 
                         echo '<pre>'; 
                           echo '$uri_qrystring_arr='; print_r($uri_qrystring_arr); 
                           echo '<br />$uriq='; print_r($uriq); 
                           //echo '<br />module_towsroot='; print_r($module_towsroot); 
                         echo '</pre><br />';
      */
      // **************************** E N D  R O U T I N G


    //if ($url == "/PHP_Rush_MVC/")
    //if ($url == $request->url) // allways equal
    /* if ($url == $request->url)
    {
        $request->controller = "tasks";
        $request->action = "index";
        $request->params = [];
    }
    else */




                /**
                http://dev1:8083/fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
                $_SERVER['DOCUMENT_ROOT']   J:/awww/www/ 

                $_SERVER['REQUEST_METHOD']   GET
                $_SERVER['REQUEST_URI']   /fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
                $_SERVER['SCRIPT_NAME']   /fwphp/glomodul/z_examples/01_phpinfo.php 

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

                /* // **1 
                $exploded_url = explode('/', $url);
                $exploded_url = array_slice($exploded_url, 2);
                $request->controller = $exploded_url[0];
                $request->action = $exploded_url[1];
                $request->params = array_slice($exploded_url, 2);
                         echo '<h3>Bad premise (frequent in to simple examples)</h3>'; 
                         echo '<pre>'; 
                           echo '$exploded_url='; print_r($exploded_url); 
                           echo '<br />ctr='; print_r($exploded_url[0]); 
                           echo '<br />akc='; print_r($exploded_url[1]); 
                           echo '<br />akcparams='; print_r(array_slice($exploded_url, 2)); 
                         echo '</pre><br />'; */

?>