<?php
/**
* //I N C L U D E D  only i n  i n d e x.p h p
* J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\Autoload.php
* J:\awww\www\zinc\ver5\A utoload.php coding step cs04. :
* #cs04. includes cls fle global (in this script dir) or in some module dir or external
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

class Autoload
{
   protected $module_arr ;

   public function __construct(&$module_arr) {
     $this->module_arr = $module_arr ;
     spl_autoload_register(array($this, 'loader'));
   }

   private function loader($nsclsname) //namespaced  c l a s s  name
   {
     $vendornsp     = $this->module_arr['vendor_namesp_prefix'] ;
     // $ n s c l s n a m e  may also be not namespaced NAME OF SCRIPT TO INCLUDE
     // in which case noting to do here - Dispatch cls includes it if exists
                      //not working : if (!class_exists($nsclsname) ) goto fn_ end ;
     //working but not needed (faster, so I use it) :
     if ($nsclsname==str_replace($vendornsp, '', $nsclsname)) {goto fn_end;}

     //$ctr           = $this->module_arr['controller'] ;
     $caller        = $this->module_arr['caller'] ;

     // 1. C L S SCRIPT GLOBAL (is in this script dir=eg in J:\awww\www\zinc\ver5) :
     $glocls_script_path = str_replace(
        [$vendornsp,'\\', '//']
      , ['',        '/',  '/']
      , __DIR__ . '/'. $nsclsname).'.php';

     //2. C L S SCRIPT IN SOME MODULE DIR :
     $modulecls_script_path = str_replace(
           $vendornsp.'\\'
         , str_replace(DIRECTORY_SEPARATOR,'/', $this->module_arr['module_path'])
         , $nsclsname ) .'.php' ;   // B12phpfw\  is  J:/awww/www/ !!

                          //if ('') { // o w n  d b g e r
                          if (0*$this->module_arr['dbg'] and !$this->module_arr['style']) { echo '<h2>STEP222 '.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                          echo '<pre>$caller='; print_r($caller); echo '</pre><br />'; 
                          echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                          .'<br />$glocls_script_path='.$glocls_script_path
                          .'<br />$modulecls_script_path='.$modulecls_script_path
                          //.'<br />controller='.$ctr
                          .'<br /><br />'; }

        switch (true) {
        case file_exists($glocls_script_path): //1. C L S SCRIPT GLOBAL
           require $glocls_script_path ; 
           break;
        case file_exists($modulecls_script_path): //2. C L S SCRIPT IN SOME MODULE DIR
           require $modulecls_script_path ; 
           break;
        default:
           //require($externalcls_script_path); 
           break;
        } // e n d  s w i t c h


     fn_end:
   } //e n d  f n l o a d e r


} //e n d  c l a s s  A u t o l o a d

