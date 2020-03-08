<?php
/**
* STEP_1=AUTOL 2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\index.php
*        Instantiates Home_ ctr cls - router, dispatcher
* step 1 in Module  U S E R  T B L  C R U D on B12phpfw CRUD code skeleton. 
* see https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
* For more code comments see blog module J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
*/
namespace B12phpfw ;

if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }

//$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object)
[   'dbg'=>'1', 'module_version'=>'6.0.4.0 Users'
  , 'module_towsroot'=>'../../../../../'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/blog/'
  ] , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
] ;
require($pp1->module_towsroot.'zinc/Autoload.php');
new Autoload($pp1); //global cls loads classes scripts automatically
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }

//1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
//STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls
//$db = new Home_ctr($pp1) ; //also instatiates all higher cls-es : Config_ allsites
$usrrepo = new UserRepository() ; //also instatiates all higher cls-es : Config_ allsites


/* self::jsmsg( [ //basename(__FILE__).' '.
__METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
,'$this->uriq'=>$this->uriq
] ) ; */

//I DO NOT UNDERSTAND OTHER CODE HERE AND IN UserRepository cls, User cls !!!!!!


/*
echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
//echo '<pre>$_GET='; print_r($_GET); echo '</pre><br />'; // [d/39] => 
//echo '<pre>$_POST='; print_r($_POST); echo '</pre><br />'; // [d/39] => 
       //no Home_ ctr echo '<pre>$usrrepo->uriq='; print_r($usrrepo->uriq); echo '</pre><br />';
       // $this->uriq=stdClass Object( [d] => 39 )
echo '<pre>$usrrepo='; print_r($usrrepo); echo '</pre><br />'; 


echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS : $usr18_posts are '.'</h3>';
$usr18_posts = $usrrepo->findPostsByUsrId(18) ;
//$usr18_posts = $usrrepo->userrobj->getPosts() ;
echo '<pre>$usr18_posts='; print_r($usr18_posts); echo '</pre><br />'; 
*/


exit(0);
