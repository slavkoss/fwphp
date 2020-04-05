<?php
//J:\awww\www\zinc\ver5\tplt_layout.php
// P A G E S  C O N T R O L L E R  S C R I P T  (TEMPLATE)
use B12phpfw\Messages as Messages ;

//    h_... means part of  h o m e  pge :
$title = 'SITEHOME'; include $wsroot_path . 'zinc/hdr.php';

include 'h_top_toolbar.php';

include 'h_top_menu.php';  //<!-- HOME SECTION -->
include 'h_content1.php';  //<!-- eg LEARN (EXPLORE) -->
include 'h_content2.php';  //<!-- eg CREATE -->
include 'h_content3.php';  //<!-- eg SHARE -->

include $wsroot_path . 'zinc/ftr.php';
                        if ('') {echo '<h2> lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';}

//include 'help.php'; 

