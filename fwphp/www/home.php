<?php
// J:\awww\www\fwphp\www\home.php
//    h_... means part of  h o m e  p a g e :

use B12phpfw\Messages as Messages ;

    $lang = $pp1->lang ;
    If (!isset($_GET['lang'])) { $_GET['lang'] = $lang ; }
    if(!isset($_SESSION['lang'])) { include_once $pp1->shares_path .'lang/lang/'. $lang .'.php' ;} 

$title = 'SITEHOME';

// p p 1,  or, without  B 1 2 p h p f w  we need z_adresses.php :
$wsroot_path = $pp1->wsroot_path ;
$wsroot_url  = $pp1->wsroot_url ;
$img_url     = $pp1->img_url ;
//see Home_ctr :  lang  eg hr.php en.php
$glomodul_path = $pp1->glomodul_path ;
$glomodul_path_rel = str_replace($wsroot_path,'',$pp1->glomodul_path) ;
$examples_path = $pp1->examples_path ; //$glomodul_path .'/z_examples/' ;
$examples_path_rel = str_replace($wsroot_path,'',$pp1->examples_path) ;

$examples_url = $wsroot_url . $examples_path_rel ;
                    //$examples_url = $wsroot_url .'fwphp/glomodul/z_examples/' ;
$glomodul_url = $wsroot_url . $glomodul_path_rel ;
                    //$glomodul_url = $wsroot_url .'fwphp/glomodul/' ;




include $pp1->shares_path . 'hdr_skeleton.php';
                                   //include 'h_top_toolbar.php';
   include 'h_top_intro_right_skeleton.php';  //<!-- HOME SECTION -->
   include 'h_content1_skeleton.php';  //<!-- eg LEARN (EXPLORE) -->
   include 'h_content2_skeleton.php';  //<!-- eg CREATE -->
   include 'h_content3_skeleton.php';  //<!-- eg SHARE -->

//include $pp1->shares_path . 'ftr.php';
?>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
<?php
                        if ('') {echo '<h2> lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';}

                                 //include 'help.php'; 

