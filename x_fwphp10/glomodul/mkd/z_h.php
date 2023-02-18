<?php
/**
* J:\awww\www\fwphp\glomodul4\mkd\h.php
*     I N C 1  IN T E M P L A T E IS  P A G E  C O N T E N T
*     & somewhere in code  we  i n c l u d e  m o d e l (i n c 2)
*            ee dynamic data from DB & output them
*/
//CONTENT OF ?=__FILE__? = pge_content for tplt_layout.php

// m o d e l :
$mdl = $module_path . $script_to_include . '_M.php';  
if (file_exists($mdl)) include $mdl;

// V I E W 3  t e m p l a t e  = container for code above : M, V1, V2 :
$template = $all_sites_glo_path .'tplt_layout.php' ; //=h.php (home tplt)
require $template ;
