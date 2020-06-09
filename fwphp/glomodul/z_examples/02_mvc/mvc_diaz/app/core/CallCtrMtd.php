<?php
//        r o u t e r  &  d i s p a t c h e r
//eg http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/mvc_diaz/public/?contact/message/p1/p2/ :

class CallCtrMtd //was Apl
{
    //protected $defaultMethod = "index"; protected $defaultController = "Home"; protected $prms = [];

    public function __construct()
    {
        $ctr0_mtd1_prm2 = $this->processUrl();

        $ctr = 'Home' ;
        if (isset($ctr0_mtd1_prm2[0])) {
          $ctr_in_url = ucfirst($ctr0_mtd1_prm2[0])  ;
          if(file_exists('../app/controllers/'.$ctr_in_url.'.php')) 
          {$ctr = $ctr_in_url;}
          unset($ctr0_mtd1_prm2[0]);
        } 
        //ctr cls load & instantiate :
        require_once('../app/controllers/' .$ctr. '.php');
        $ctrobj = new $ctr;

        $mtd = 'index';
        if (isset($ctr0_mtd1_prm2[1])) {
          $mtd_in_url = $ctr0_mtd1_prm2[1] ;
          unset($ctr0_mtd1_prm2[1]);
          if(method_exists($ctrobj, $mtd_in_url)){ $mtd = $mtd_in_url; }
        } 

        // d i s p a t c h e r :
        $prms = $ctr0_mtd1_prm2 ? array_values($ctr0_mtd1_prm2) : [];
                                echo '<pre>$prms='; print_r($prms); echo '</pre>'; //exit(0);
        //call_user_func_array([$ctrobj, $mtd], $prms);
        is_callable(array($ctrobj, $mtd)) ? $ctrobj->$mtd($prms) : '0' ;

    } //e n d  f n  _ _ c o n s t r u c t

  public function processUrl()
  {
      if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
      if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

      $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);

      $uri_arr = explode(QS, $REQUEST_URI) ;
                                echo '<pre>$uri_arr='; print_r($uri_arr); echo '</pre>'; //exit(0);
      if(!isset($uri_arr[1])) {
        $ctr0_mtd1_prm2 = ['home'];
      } else {
        $ctr0_mtd1_prm2 = explode('/', $uri_arr[1]) ; 
                                echo '<pre>$uri_arr='; print_r($uri_arr); echo '</pre>'; //exit(0);
      }
      return $ctr0_mtd1_prm2 ; 
  } //e n d  f n  p r o c e s s U r l

} //e n d  c l s  A p p

          /* //Diaz : bad, to simple
                          echo '<pre>$_GET='; print_r($_GET); echo '</pre>'; //exit(0);
                  //http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/mvc_diaz/public/ :
                  //$_GET=Array()
          if(isset($_GET['url'])) {
            return $uri_arr = explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
          } else {
            return $uri_arr = ['home'];
          } */
