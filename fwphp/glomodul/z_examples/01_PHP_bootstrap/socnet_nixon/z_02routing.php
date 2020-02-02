<?php
//namesp.(=dirname !!convention)\clsname(=ut lmoj)
//use inc\utlmoj as utl; 
$cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : 'home';
          //$wai = // where am I array('fn'=>__FUNCTION__,'fle'=>__FILE__,'cls'=>__CLASS__,'txt1'=>'','txt2'=>'');
          //$wai['ln']=__LINE__; $caller = utl::wai($wai);
          
          //dirname basename filename //since PHP 5.2.0
          //extension // not isset if not in $cmd
          //echo '<pre>pathinfo($cmd)='; print_r(pathinfo($cmd)); echo '</pre>';
if ($cmd and $cmd!=='home') {
  if (rtrim($cmd, '/') == $cmd ) 
    require("$cmd.php"); //usr command is i n c  script
  else require($cmd.'index.php'); //usr cmd is rel/abs URL
  
  exit; //break; 
}  



/*
CONVENTION!! : SPA_DOMAIN_STYLE does not need autoincluding classes (spl_autoload_register)
because SPA knows own includes : 
    // SPA INCLUDES ARE FOR ALL SPA SAME NAMED
    // Same for CRUD includes tbl_read, row_read...)
*/