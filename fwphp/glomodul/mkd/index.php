<?php
/**
* J:\awww\www\fwphp\glomodul4\mkd\index.php   http://dev1:8083/fwphp/glomodul4/mkd/
* http://dev1:8083/fwphp/glomodul4/mkd/?Home/edit/J:/awww/www/readme.md
*
*        M K D  M O D U L E  S I N G L E  E N T R Y  P O I N T
* #cs01. means Codeflow Step 1: bootstrap script (2=init, config, routing, 3=dispaching)
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//$controller = $dispatch->newController(); //$apl->run explains nothing

//$module_towsroot = '../../../' ; //inet provider doc root for us - www or htdocs or...

date_default_timezone_set("Europe/Zagreb"); //Asia/Karachi
      $CurrentTime = time();
      $DateTime = strftime("%Y.%m.%d %H:%M:%S",$CurrentTime);
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }
                        if(''){ echo '<h2>' .'lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';
                        echo '<pre>'; 
                        if (isset($_GET)) {print '<br />$_GET='; print_r($_GET);  }
                        //if (isset($_POST)) {print '<br />$_POST='; print_r($_POST);  }
                        //if (isset($_SESSION)) {print '<br />$_SESSION='; print_r($_SESSION);  }
                        echo '</pre>';
                        }
                        //works, but for view scripts we do not need c l a s s e s
                        //require('Mkd.php');  $mkd  = new Mkd($module_towsroot) ;  //$xxx = new xxx;
include 'config_module.php';

switch (true) {
case isset($_GET['edit']):  //$mkd->edit(rtrim($_GET['edit'],'/')); 
  $fle_to_edit_path = rtrim($_GET['edit'],'/') ;
  include 'edit.php'; break;
case isset($_POST['edithid']):  //$mkd->edit(rtrim($_GET['edit'],'/')); 
  $fle_to_edit_path = rtrim($_POST['edithid'],'/') ;
  include 'edit.php'; break;
case isset($_GET['showhtml']): //$mkd->md2htm(rtrim($_GET['showhtml'],'/')); 
  $fle_to_displ_path = rtrim($_GET['showhtml'],'/') ;
  include 'showhtml.php'; break;
//case isset($_GET['akcija']): echo "\nakcija=" . $_GET['akcija'] ;
//  $fle_to_edit_path = rtrim($_GET['akcija'],'/') ;
//  include 'edit.php'; break;
default: $title = 'Dirs&txts to mkd edit'; include('home.php'); break; //list of  mkd or txt files
} // e n d  s w i t c h    //header("location:f rm.php");

exit(0);

