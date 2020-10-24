<?php
/**
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_oumar_imgs\index.php
* http://localhost:8000/
* http://localhost:8000/gallery-images/
* http://localhost:8000/gallery-images/?page=2&size=5
*
* https://github.com/oumarkonate/hexagonal-architecture
* http://oumarkonate.com/hexagonal-architecture-an-example-of-implementation/
*/
//namespace B12phpfw\module\blog ;
use B12phpfw\core\zinc\Autoload ;
use App\Config\Application;
//require __DIR__ . '/vendor/autoload.php';

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = str_replace('\\','/', realpath('../../../../../')) .'/' ;
$shares_path = $wsroot_path.'/zinc/' ; //includes, globals, commons, reusables
//$dirup_to_app = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1', 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'1.0.0.0 ImgGalery' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs paths where are class scripts to autoload. Dir name is last in namespace and use. 
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
       $module_dir_path // = thismodule_cls_dir_path = $pp1->module_path
      //dir of global clses for all sites :
      , $shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
      , $shares_path.'curlmaster/'
      , $module_dir_path .'src/Config/'
      , $module_dir_path .'src/Controller/'
      , $module_dir_path .'src/Domain/'
      , $module_dir_path .'src/Infrastructure/'
  ]
] ;

//2.
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }
//3. process r equest from ib rowser & send r esponse to ib rowser :
//$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1
$app = new Application();
$app->run($pp1);

exit(0);

/**
*      ORIGINAL CODE 1_hexagonal-architecture-master_oumar.zip 30 kB
*     https://github.com/oumarkonate/hexagonal-architecture
*/

/*
use App\Config\Application;

require __DIR__ . '/vendor/autoload.php';

$app = new Application();
$app->run();
*/

/*
At first seems beautifull, clever, simple code  (same as your web page).
1. "http://localhost:8083/z_ddd/" displays empty page. 
I can not guess why ? (XAMP on Win10 64 bit)

If I put in  Application.php before $router->get('/',...  :
echo '<pre>app 1.1 $router='; print_r($router) ; echo '</pre>'; 
it displays:
app 1.1 $router=App\Config\Router Object
(
)

2. May be explanation why trait ControllerTrait ?



https://www.quora.com/  front-end frameworks
**********************************************
https://reactjs.org/docs/getting-started.html

Google is not dogfooding and pushing Angular the way Facebook is doing with React
to target its needs - first most popular JS fw used in Facebook, Twitter, Instagram, Whatsapp.
Vue.js : Gitlab, 9Gag, Nintendo, Grammarly.
React has strong and influential mentor that improves and maintains it, while Vue doesn’t.

Angular 2 is effectively a completely different framework then Angular 1.
Many find Angular 1 app hard to maintain and refactor and performance is low.

In 2018 Vue.js second most popular JS fw created by a former Google employee, Evan You whose aim was to develop a framework that would integrate the best features from already-existing frameworks.

Flexibility :
React is not a full-fledged framework but a library, developer can add any library according to their preferences. MobX and Redux are also widely used by developers while working with React to support office management tasks. Require knowlege of HTML and ES5 JavaScript.

                              React                           Vue.js
Flexibility                       +                                +
learning curve                    +                                +
Framework size               100 kb                            80 kB

Number in line above preceded by how many of them there, next n preceded by count...  :
      1
     11      One one
     21      Two one 
   12 11     One two, one one
  11 12 21   One one, one two, two one
  31 22 11   Three one, two two, one one
13 11 22 21  One three, one one, two two, two one




*/