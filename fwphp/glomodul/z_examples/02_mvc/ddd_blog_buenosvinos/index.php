<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ddd_blog_buenosvinos\index.php
use B12phpfw\core\zinc\Autoload ;
use B12phpfw\module\ddd_blog_buenosvinos\Home_ctr ;

$module_towsroot = '../../../../../' ;  //to web server doc root or our doc root by ISP
//$app_dir_path = str_replace('\\','/', dirname(__DIR__) ) ; //to app dir eg "glomodul" dir and app

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'1.0.0.0 ha post', 'vendor_namesp_prefix'=>'' //B12phpfw
  //1.3 Dirs where are CLASS SCRIPTS TO INCLUDE AUTOMATICALLY (A u t o l o a d)
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=$module_path=thismodule_cls_dir_path
      /////dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
  ]
] ;

//2. global cls loads classes scripts automatically
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 


$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and $conf = new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }

exit(0);
