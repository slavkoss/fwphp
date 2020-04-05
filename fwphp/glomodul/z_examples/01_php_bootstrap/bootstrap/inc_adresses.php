<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\inc_adresses.php
$module_arr = //array_merge( $module_arr,
[
   'dbg'                  => '0' 
  ,'modulename'           => 'Bootstrap4'
                 //,'wsroot_path'          => 'J:/awww/www/'
  ,'module_towsroot'      => '../../../../../'
  ,'module_path'          => str_replace('\\','/', __DIR__.'/')
  ,'vendor_namesp_prefix' => 'B12phpfw'
  //
  // http://dev1:8083/    //=URL_PROTOCOL or :
  , 'wsroot_url' => ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
      .'/', FILTER_SANITIZE_URL )
  ,'module_relpath_requested' => rtrim(ltrim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL),'/'),'/')
  ,'theme_relpath'        => 'zinc/themes/bootstrap'
  ,'caller'               => 'not_coded'
] //)
;
//            J:/awww/www/ :
$module_arr['wsroot_path'] = str_replace('\\','/', realpath(
   $module_arr['module_path'].$module_arr['module_towsroot'] ) .'/') ;
//$module_arr['wsroot_path'] = str_replace('\\','/', realpath($module_arr['module_towsroot']) .'/') ;
$module_arr['site_url']    = $module_arr['wsroot_url'] . 'fwphp/www5/' ;
// 'fwphp/glomodul4/help_sw/test/msg' :
$module_arr['module_relpath'] = rtrim(ltrim($module_arr['module_path'], $module_arr['wsroot_path']),'/') ;
$module_arr['module_url']    = $module_arr['wsroot_url'] . $module_arr['module_relpath'] .'/' ;

/*
J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\inc_hdr_ftr.php, lin=31  *** ftr_pge  SAYS ***
INPUT: $module_arr['module_path']=J:/awww/www/fwphp/glomodul4/help_sw/test/bootstrap/
INPUT: $module_arr['wsroot_path']=J:/awww/www/
From $_SERVER['HTTPS'] and $_SERVER['HTTP_HOST'] : $module_arr['wsroot_url']=http://dev1:8083/
From $_SERVER['REQUEST_URI'] : $module_arr['module_relpath_requested']=fwphp/glomodul4/help_sw/test/bootstrap/03socnet/index.php
INPUT : $module_arr['wsroot_url'] . 'fwphp/www5/' $module_arr['site_url']=http://dev1:8083/fwphp/www5/
From module_path and wsroot_path : $module_arr['module_relpath']=fwphp/glomodul4/help_sw/test/bootstrap
From wsroot_url and module_relpath : $module_arr['module_url']=http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
*/
