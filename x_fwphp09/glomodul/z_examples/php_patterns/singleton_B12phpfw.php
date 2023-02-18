<?php
// J:\awww\www\fwphp\glomodul\z_examples\php_patterns\singleton_B12phpfw.php
//SINGLETON PATTERN with a class that establishes a database connection, 
//and restricts the number of instances to only one.
//https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php
namespace B12phpfw\module\php_patterns ;

use B12phpfw\core\zinc\Autoload ;
use B12phpfw\core\zinc\Config_allsites ;
//use B12phpfw\core\zinc\Db_allsites;
//use B12phpfw\core\zinc\Dbconn_allsites;

//1. settings - properties - assign global variables to use them in any code part
$module_towsroot = '../../../../' ;  //to web server doc root or our doc root by ISP
//$dirup_to_app = str_replace('\\','/', dirname(__DIR__) ) ; //to app eg glomodul

$pp1 = (object) //=properties global array (like Oracle Forms property palette)
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'6.0.4.0 php_patterns', 'vendor_namesp_prefix'=>'B12phpfw'
  //1.3 F o r  A u t o l o a d
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //thismodule_cls_dir_path
      //dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
  ]
] ;

//2. global cls loads classes scripts automatically
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 
                if ('1') {Config_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }




// ****************************************************************************
echo '<h1>Better : URL contains Home_ ctr method read_post (?i/read_post/)</h1>' ;
// ****************************************************************************
echo
'URL MUST BE : http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/singleton_B12phpfw.php?i/read_post/';
  //ee ...'read_post'       => QS.'i/read_post/' ,
echo '<p>Page call is only $db = new Home_ctr($pp1) ; (or new App, or simmilar).</p>';
$db = new Home_ctr($pp1) ; //Home_ ctr (or App) class "inherits" index.php ee "inherits" $ p p 1




// ****************************************************************************
echo '<h1>'. 'Worse : not used Home_ ctr method read_post' .'</h1>' ;
// ****************************************************************************
echo
'URL is without ?i/read_post/ : http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/singleton_B12phpfw.php';
echo '<p>Page call must contain code in method read_post.</p>';
//3. process request from ibrowser & send response to ibrowser :
//1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
//STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls

echo '<h3>'.basename(__FILE__) //. __METHOD__ 
   . ', line '. __LINE__ .' SAYS: Before $db = new Home_ctr($pp1) ; '.'</h3>' ;
echo '$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1';
              // $cursor is: object(PDOStatement)#9 (1) {
              //  ["queryString"]=>
              //  string(37) "SELECT COUNT(*) COUNT_ROWS FROM posts"
              //} 

//The result is the same connection for both instances.
//ee is_null(self::$instance) is printed ONLY ONCE DURING PAGE LIFE - SINGLETON !!! :
    //B12phpfw\core\zinc\Dbconn_allsites::get_or_new_dball ln=32 SAYS:
    //is_null(self::$instance)

$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1
$cursor = $db->rr("SELECT COUNT(*) COUNT_ROWS FROM posts", [], __FILE__ .', ln '. __LINE__ ) ;

$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1
//SELECT * FROM admins ORDER BY username
$cursor = $db->rr("SELECT COUNT(*) COUNT_ROWS FROM posts", [], __FILE__ .', ln '. __LINE__ ) ;
          //$db::disconnect(); //NOT problem ON LINUX
          //return $cursor ;
while ($row = $db->rrnext($cursor)): {$r = $row ;} endwhile; //c_, R_, U_, D_



echo '<pre>$cursor = $db->rr("SELECT COUNT(*) COUNT_ROWS FROM posts"...) is: '; var_dump($cursor); echo '</pre>';
echo '$db->rrnext($cursor))='; print_r($r);


exit(0);

