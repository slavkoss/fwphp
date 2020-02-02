<?php
/**
* J:\awww\www\zinc\Autoload.php
* Coding step cs02. W H O: J:\awww\www\zinc\Autoload.php
* W H Y: to avoid i n c l u d e  statesments in many scripts
* WHAT DOES: if c l s script of called  c l s  anywhere exists - i n c l u d e  it
* H O W DOES: I N C L U D E D  ONLY I N  i n d e x.p h p (single module entry point)
*   We use $a utoload_arr and namespaced  c l a s s  name to construct c l s script path 
*   (f or global and module cls-es) or  c l s script path (f or external cls-es)
* J:\awww\www\zinc\ver5\A utoload.php coding step cs04. :
* 
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

class Autoload
{
   protected $pp1 ;

   public function __construct($pp1) {
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'loader'));
   }

   private function loader($nsclsname) //namespaced  c l a s s  name
   {
     $vendornsp     = $this->pp1->vendor_namesp_prefix ;
     //$pos1 = stripos($nsclsname, $vendornsp);
     //if ($pos1 === false) { $nsclsname .= $vendornsp . '\\' ; }

     $caller        = $this->pp1->caller ; //$ctr = $this->autoload_ arr['controller'] ;


     // *******************************************
     //1. C L S SCRIPT IN MODULE DIR MUST BE FIRST (inheritance - instantiates also parent) :
     // *******************************************
     $modulecls_script_path = str_replace(
           $vendornsp.'\\'
         , $this->pp1->module_path_arr[0]
               //, str_replace(DIRECTORY_SEPARATOR,'/', $this->pp1->module_path_arr[0])
         , $nsclsname 
     ) .'.php' ;   // B12phpfw\  is  J:/awww/www/ !!
     if (file_exists($modulecls_script_path)) {
       require_once $modulecls_script_path ; goto fn_end; 
              } else {
                $cls_script_path_toinc[] = $modulecls_script_path;
              }

        // C L S SCRIPT IN SOME OTHER MODULE DIR :
        if ( isset($this->pp1->module_path_arr[1]) )
        {
          $ii=1; while ($ii<100):
            if ( isset($this->pp1->module_path_arr[$ii]) ) 
            {
              $modulecls_script_path2 = str_replace(
                   $vendornsp.'\\'
                 , str_replace(DIRECTORY_SEPARATOR,'/', $this->pp1->module_path_arr[$ii])
                 , $nsclsname 
              ) .'.php' ;
                      /* ><SCRIPT LANGUAGE="JavaScript">
                         //alert( "<php //echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                             ////.'\\nC L S SCRIPT '.$this->pp1->module_path_arr'][$ii]
                             //  .'\\nC L S SCRIPT '.$modulecls_script_path2
                         //  >"
                         //) ;
                      </SCRIPT><php */

              if (file_exists($modulecls_script_path2)) {
                require_once $modulecls_script_path2 ; goto fn_end;
              } else {
                $cls_script_path_toinc[] = $modulecls_script_path2 ;
              }

            } else { break ; }

            $ii++ ;
          endwhile;
        }



     // *******************************************
     // 2. C L S SCRIPT GLOBAL f or all sites (is in this script dir=eg in J:\awww\www\zinc) :
     // *******************************************
     $glocls_script_path = str_replace(
        [$vendornsp,'\\', '//']
      , ['',        '/',  '/']
      , __DIR__ . '/'. $nsclsname).'.php';
     if (file_exists($glocls_script_path)) {
        require_once $glocls_script_path ; $cls_script_path_toinc = [] ; goto fn_end; 
              } else {
                $cls_script_path_toinc[] = $glocls_script_path;
              }

                          //if ('') { // o w n  d b g e r
                          if (0*$this->pp1->dbg) { 
                          echo '<h2>STEP222 '.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                          echo '<pre>$caller='; print_r($caller); echo '</pre><br />'; 
                          echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                          .'<br />$glocls_script_path='.$glocls_script_path
                          .'<br />$modulecls_script_path='.$modulecls_script_path
                          .'<br />'; }

        /* 
          // 3. E X T E R N A L  C L S SCRIPT
          if isset($this->pp1['externalcls_script_path'][0]): 
          $ii=0; while ($ii<100):

          $cls_script_path_toinc[] = $this->pp1['externalcls_script_path'][$ii] ;

            if ( isset($this->pp1['externalcls_script_path'][$ii]) and 
                 file_exists($this->pp1['externalcls_script_path'][$ii])
            ):
               require_once($this->pp1['externalcls_script_path'][$ii]);
            else: break ;
            endif ;
            $ii++ ;
          endwhile;
           */
     fn_end:
           /* ><SCRIPT LANGUAGE="JavaScript">
               alert( "<= __METHOD__ .', line '. __LINE__ .' SAYS: '
                 .'\\n namespaced C L S '.str_replace('\\','\\\\',$nsclsname)
                 .'\\n ...called from: '.str_replace('"','\"',json_encode($caller))
                 .'\\n ...cls_script_path_toinc NOT INCLUDED CANDIDATE C L S  S C R I P T S  are: '
                 .'\\n'.str_replace('"','\"',json_encode($cls_script_path_toinc))
                 >" ) ; 
            </SCRIPT><php */

   } //e n d  f n l o a d e r


} //e n d  c l a s s  A u t o l o a d

