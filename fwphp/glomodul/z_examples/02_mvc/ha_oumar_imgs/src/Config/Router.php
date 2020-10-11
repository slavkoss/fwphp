<?php

namespace App\Config;

//use App\Config\Message\Request;
use B12phpfw\core\zinc\Config_allsites ;

//see index.php:    , $wsroot_path.'/zinc/curlmaster/'
use peterkahl\curlmaster\curlmaster ;

/**
 * Class Router is in B12phpfw Home_ctr
 */
class Router extends Config_allsites
{

  public function __construct(object $pp1)
  {
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    // R O U T I N G  T A B L E  (IS OK FOR MODULES IN OWN DIR)
    $pp1_module = [ 'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~'
      , 'gallery_images'        => QS.'i/gallery_images/'
      , 
    //e n d  R O U T I N G  T A B L E
        ] ;

    parent::__construct($pp1, $pp1_module);


  } // e n d  f n  __ c o n s t r u c t


  //           **** D I S P A T C H I N G
          //$accessor = "get" . ucfirst(strtolower($akc));
  public function call_module_method(string $akc, object $pp1) { //fnname, params
    if ( is_callable(array($this, $akc)) ) { // and method_exists($this, $akc)
      return $this->$akc($pp1) ;
    } else {
      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
      echo 'Home_ ctr method "<b>'. $akc .'</b>" is not callable.' ;
      echo ' See how is created method name in Config_ allsites code snippet c s 0 2. R O U T I N G."' ;
      return '0' ;
    }
  }


  private function home(object $pp1) //DI page prop.palette   
  {
    //As of PHP5, object variable doesn't contain object itself as value. It only contains object identifier. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a copy of the identifier, which points to same object.

    $uriq = $pp1->uriq ;
    $title = 'img HOME';

                      /*echo '<h2>Router.php home(object $pp1) SAYS :</h2>'; 
                      echo '<pre>'; 
                        echo '<br />'.'$pp1->caller=' ; print_r($pp1->caller) ; 
                        echo '<br />'.'$pp1->module_ path=' ; print_r($pp1->module_ path) ; 
                      echo '</pre>'; 
                      */
      require $pp1->module_path . '/templates/home.php';
                      /* require $pp1->wsroot_path . 'zinc/hdr.php';
                      require_once("navbar.php");
                      require $pp1->module_ path . 'home.php';
                      require $pp1->wsroot_ path . 'zinc/ftr.php'; */
  }


  private function gallery_images(object $pp1) //DI page prop.palette   
  {

    $uriq = $pp1->uriq ;
    $title = 'img HOME';

      //echo '<h2>Router.php gallery_images(object $pp1) SAYS :</h2>'; 

    require $pp1->module_path . '/templates/gallery.php';
              /* require $pp1->wsroot_path . 'zinc/hdr.php';
              require_once("navbar.php");
              require $pp1->module_ path . 'home.php';
              require $pp1->wsroot_ path . 'zinc/ftr.php'; */
  }


    private function findAll(object $pp1, array $options=[1,10]): array
    {
        $uri = sprintf('https://picsum.photos/v2/list?%s', http_build_query($options));

        //or: https://github.com/peterkahl/curlmaster
        $curlm=new curlmaster;
        $curlm->CacheDir=$pp1->module_path ; //'/srv/cache';
        $curlm->ca_file=$pp1->wsroot_path .'/zinc/cacert.pem' ; //'/srv/cert-ca/cacert.pem';
        // Method GET is default.
        $response = $curlm->Request($uri); // 'https://www.google.com/'
        return \json_decode($response['response']['body']); //var_export($response);



    }



}

                      //       C U R L
                      /* //or php manual : NOT WORKING :
                      $ch = curl_init($uri);
                      $fp = fopen("curl_picsum_photos.txt", "w");

                      curl_setopt($ch, CURLOPT_FILE, $fp);
                      curl_setopt($ch, CURLOPT_HEADER, 0);

                      curl_exec($ch);
                      if(curl_error($ch)) {
                          fwrite($fp, curl_error($ch));
                      }
                      curl_close($ch);
                      fclose($fp); */

                      // or guzzle TO BIG :
                      //$contents = $this->client->retrieve($uri);
                      //return \json_decode($response);




  /**
   * Code flow :
   * src/Controller/GalleryController.php
   * src/Domain/GalleryManager.php
   * src/Infrastructure/GalleryRepository.php
   * src/Infrastructure/GalleryDriver.php
   *
   * @inheritDoc
   * http_build_query = Generate URL-encoded query string

        try {
            $imagesLists = $this->galleryManager->getImagesGalleryContents($options=[
                'page'  => $this->request->get('page') ?? 1,
                'limit' => $this->request->get('size') ?? 10,
            ]);
        } catch (\Exception $exception) {
            $errors = true;
        }
   */

    //               O R I G I N A L  C O D E
    /* namespace App\Config;

    use App\Config\Message\Request; */
    /**
     * Class Router
     */
    class Router_original
    {
        /**
         * @param string $route
         * @param callable $callback
         */
        public static function get(string $route, callable $callback): void
        {
            if (strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') !== 0) {
                return;
            }
            self::on($route, $callback);
        }

        /**
         * @param string $route
         * @param callable $callback
         */
        public static function post(string $route, callable $callback): void
        {
            if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !== 0) {
                return;
            }
            self::on($route, $callback);
        }

        /**
         * @param $regex
         * @param callable $cb
         */
        public static function on($regex, callable $cb): void
        {
            $params = strtok($_SERVER["REQUEST_URI"],'?');

            $params = (stripos($params, "/") !== 0) ? "/" . $params : $params;
            $regex = str_replace('/', '\/', $regex);
            $is_match = preg_match('/^' . ($regex) . '$/', $params, $matches, PREG_OFFSET_CAPTURE);

            if ($is_match) {
                // first value is normally the route, lets remove it
                array_shift($matches);
                // Get the matches as parameters
                $params = array_map(function ($param) {
                    return $param[0];
                }, $matches);

                $cb(new Request($params));
            }
        }
    }
