<?php

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;

//if (!isset($_SESSION)) { session_start(); }
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { 
  if(session_id() == '') { session_start(); } 
}


class Autoload
{
   protected $pp1 ;

   public function __construct($pp1) {
                       if ('') { 
                          //echo '<pre>'; 
                          echo 'Color meanings : '.$this->fmt('Code flow (blue)', 'blue')
                             . ', '. $this->fmt('Processing output (green)', 'green')
                             . ', '. $this->fmt('ERROR (red)', 'red')
                             . ', '. $this->fmt('Info (brown)', 'brown')
                          ; //darkgray brown
                      echo '<br />'.' &nbsp;  &nbsp; CONVENTION: use ' 
                      . 'vendor_nsprefix\\module_functionality\\MODULE_AND_ITS_DIR_NAME\\clsname;';
                      echo '<br />'.' &nbsp;  &nbsp; We need MODULE_AND_ITS_DIR_NAME for same named Home_ctr clses in more modules (or Tbl_crud cls or...)'
                      ;
                      //. '<br />'.' &nbsp;  &nbsp; Clsname in functional namespace MUST BE UNIQUE for all module groups (apps) eg "glomodul" "app".'
                          //echo '</pre>'; 
                       }
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'loader'));
     return null ;
   }


  //private static function get_path(
  private function get_path(
       string $clsname //cls name
     , string $nsprefix //eg B12phpfw or B12phpfw\db_adapter\post_category\
     //, $p_path
  )
  {
    // get_module_cls_script_path
    //$DS = DIRECTORY_SEPARATOR ;
          $ii=0;
          while ($ii<100):
            if ( isset($this->pp1->module_path_arr[$ii]) ) 
            {
              $script = $this->pp1->module_path_arr[$ii] . $clsname .'.php' ;
              if (file_exists($script)) { return $script ; } 
            } //else { break ; }

            $ii++ ;
          endwhile;

  } //e n d  f n  get_ path

  //public static function autoload($cls) //namespaced className
  private function loader($nscls) //namespaced  c l a s s  name
  {
    $vendornsp = $this->pp1->vendor_namesp_prefix ;
    $cls = basename($nscls) ;

    // ********** 1. get_module_cls_script_path **********  eg B12phpfw\\clickmeModule
    $clsscript_path = $this->get_path($cls, $nsprefix1=dirname($nscls)) ;  // $cls_script_path

    $modulename_dirname = basename(dirname($clsscript_path)) ;
    //$modulename_dirname = ($vendornsp == 'B12phpfw') ? dirname(dirname($clsscript_path)) :  ;
                  if ('') {
                  echo '<pre>'; 
                  echo $this->fmt( __METHOD__ .', line '. __LINE__ .' SAYS: inputs and processing ', 'blue') 
                  .'<br />'.'Input 1 assigned in index.php $this->pp1->vendor_namesp_prefix ='
                  .  $this->fmt($vendornsp, 'green') ; 

                  echo '<br />'.'Input 2 assigned in index.php is dirs where class scripts are<br />$this->pp1->module_path_arr=' ; 
                  echo str_replace('\\','',json_encode($this->pp1->module_path_arr,JSON_PRETTY_PRINT)); //print_r and var_dump send headers

                  echo '<br />'.'Input 3 assigned in each cls with "namespace" and "use" is namespaced class name <br />'. '$nscls = '. $this->fmt($nscls, 'green') ;

                  echo ' &nbsp;'.'CLASS NAME $cls = basename($nscls) = '. $this->fmt($cls, 'green') ;



                  echo  '<br /> &nbsp;  &nbsp; '.'dirname($nscls)  = name space prefix = '. $this->fmt('$nsprefix = '. $nsprefix1,'green') ;
                  //. ' - is FUNCTIONAL if = "B12phpfw", otherwise eg see categories.php'

                  echo '<b>$clsscript_path='.$clsscript_path.'= one of dirs in module_path_arr such that:'
                  . '<br /> &nbsp;  &nbsp;  1. in dir in module_path_arr exists script "CLASS_NAME.php" = '.$this->fmt('$cls.php = '. $cls .'.php','green')
                  . '&nbsp;  2. $modulename_dirname is contained in name space prefix $nsprefix'
                  .'</b>' ; 


                  echo '<br />'.'MODULE_AND_ITS_DIR_NAME = basename(dirname($clsscript_path)) = '. $this->fmt('$modulename_dirname = '. $modulename_dirname, 'green');

                  if ( str_replace($modulename_dirname, '', $nsprefix1) !== $nsprefix1 ) { echo $this->fmt(' 2. IS TRUE : $modulename_dirname is contained in $nsprefix', 'green') ; }

                  echo '</pre>';
                  //exit(0) ;
                }



  // ********** 3. r e q u i r e  cls_ script_ path **********
  switch (true) {
    case file_exists($clsscript_path) 
         and str_replace($modulename_dirname, '', $nsprefix1) !== $nsprefix1 :
       //echo $this->fmt('1. in dir in module_path_arr exists script "CLASS_NAME.php" and 2. $modulename_dirname is contained in $nsprefix', 'green') ; 
       include_once $clsscript_path ;
       break;

    default: //e r r o r : not found cls script
        if ('1') { 
        echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS: '.'</h3>' ;
        echo ' '. $this->fmt('ERROR namespaced class '. $nscls, 'red')
        . '<br />None of possible CLASS SCRIPTS DIRS assigned in index.php CONTAIN CLASS SCRIPT :'
        . "<br />\"$nsprefix1\" :"
        //. "<br />\"$nsprefix1\" or \"$nsprefix2\" or \"$nsprefix3\" or \"$nsprefix4\" are :"
        ; 
        echo '<pre>';
        echo '$clsscript_path='; print_r($clsscript_path);
        //print_r([$clsscript_path, $path2, $path3, $path4]);
        //print_r('Namespaced class '. $cls .' has not class script ?');
        echo '</pre>';
      }
      break;
  }
                    if ('') { ?> <SCRIPT LANGUAGE="JavaScript">
                    alert( "<= __METHOD__ .', line '. __LINE__ .' SAYS: '
                     .'\\n namespaced C L S '. str_replace('\\','\\\\',$nsclsname)
                     .'\\n ...called from: '. str_replace('"','\"',json_encode($caller))
                     .'\\n ...cls_script_path_toinc NOT INCLUDED CANDIDATE C L S  S C R I P T S  are: '
                     .'\\n'. str_replace('"','\"',json_encode($cls_script_path_toinc))
                     >" ) ; 
                    </SCRIPT><?php
                    }
   } //e n d  f n  l o a d e r


  private function fmt(string $txt, string $color)
  { 
    ob_start(); //ob_ start("callbackfn"); //without output buffering breaks line
    ?><span style="color: <?=$color?>; font-size: large; font-weight: bold;"><?=$txt?></span>
    <?php
    $fmtedtxt .= ob_get_contents();
    ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
    return $fmtedtxt ;
  } //e n d  f n  f m t

} //e n d  c l a s s  A u t o l o a d


    //TODO same named Tbl_crud  c l a s s e s  for each DB tbl
    //     same named Home_ctr  c l a s s e s  for each module ... and other
    //1. module_path_arr assigned in index.php eg : [3] => J:/awww/www/fwphp/glomodul/post_category/
    //2. $nsprefix eg :
         //CONVENTION: use vendor_nsprefix\module_functionality\MODULE_&_ITS_DIR_NAME\clsname :
         //use B12phpfw\db_adapter\post_category\Tbl_crud ;
    //3. post_category = module dir must be in 1 and 2 if $nsprefix != B12phpfw
              //$modulecls_script_path2 = str_replace(
              //     $vendornsp.'\\'
              //   , str_replace(DIRECTORY_SEPARATOR,'/', $this->pp1->module_path_arr[$ii])
              //   , $nsclsname 
              //) .'.php' ;

             //$glocls_script_path = str_replace(
             //   [$vendornsp,'\\', '//']
             // , ['',        '/',  '/']
             // , __DIR__ . '/'. $nsclsname).'.php';


/**
*       ***** namespaced cls name --> cls script path *****
* Coding step cs02. W H O: J:\awww\www\zinc\Autoload.php - GLOBAL FOR ALL SITES
* WHY: to avoid i n c l u d e  statesments in many scripts
* WHAT DOES: if c l s script of called  c l s  exists - i n c l u d e  it
* HOW DOES: I N C L U D E D  ONLY I N  i n d e x.p h p (single module entry point)
*   We use module_ path_ arr and namespaced  c l a s s  name to construct c l s script path 
*   (f or global and module cls-es or external cls-es)
* 
*/