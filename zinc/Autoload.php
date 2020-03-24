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
                       //see (**2)
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'loader'));
     return null ;
   }


  private function get_path( // static ?
       $nscls // namespaced cls name
     , &$nsdir_in_clsdir 
  )
  {
    // returns cls_script_path      $DS = DIRECTORY_SEPARATOR ;

    $clsname     = basename($nscls) ;          //=Config_allsites
    $last_nspart = basename(dirname($nscls)) ; //=tasks   eliminated cls name
    
    //all possible dirs for cls script :
    $clsdirx = 0;
    while ($clsdirx < count($this->pp1->module_path_arr)):
      $scriptdir_path = $this->pp1->module_path_arr[$clsdirx] ;
      $script = $scriptdir_path . $clsname .'.php' ; //str_replace('/',$DS, )
      $modulename_dirname = basename($scriptdir_path) ;

      if ( $last_nspart             //=tasks
           == $modulename_dirname   //=tasks, then zinc
           and file_exists($script) //J:/awww/www/zinc/Config_allsites.php
      )
      {
        $nsdir_in_clsdir = $modulename_dirname ; //=tasks
              if ('') { echo  '<br />'. __METHOD__ .', line '. __LINE__ .' SAYS: F O U N D ' ;
                echo ' $last_nspart='; print_r($last_nspart);
                echo ' $modulename_dirname='; print_r($modulename_dirname);
                echo ' $clsname='; print_r($clsname);
                echo ' $nsdir_in_clsdir='; print_r($nsdir_in_clsdir); 
                echo " <br />file_exists(<b>\$script=$script</b>) and \$nsdir_in_clsdir=<b>$nsdir_in_clsdir</b>"; 
              }
        return $script ; //see (**3)
      }

      $clsdirx++ ;
    endwhile;

    return $clsname .'; <--- put_this_in_caller' ;
  } //e n d  f n  get_ path

  //public static function autoload($cls) //namespaced className
  private function loader($nscls) //namespaced  c l a s s  name
  {
    $vendornsp = $this->pp1->vendor_namesp_prefix ;
    $clsname = basename($nscls) ;

    // ********** 1. get_module_cls_script_path **********  eg B12phpfw\\clickmeModule
    $nsdir_in_clsdir   = '' ; //Possible CLASS SCRIPTS DIR is contained in $nscls
    $clsscript_path = $this->get_path(
          $nscls // namespaced cls name
        , $nsdir_in_clsdir
    ) ;
                  //see (**1)

  // ********** 3. r e q u i r e  cls_ script_ path **********
              //see (**5)
  switch (true) {
    case file_exists($clsscript_path) and $nsdir_in_clsdir :
      include_once $clsscript_path ;
      break;

    default: //E R R O R : NOT FOUND CLS SCRIPT or 
      echo '<br />'.$this->fmt( __METHOD__ .', line '. __LINE__ .' SAYS: ', 'black')  ;
      echo '<br />'.'C l a s s : ' . $this->fmt($clsname . ' NOT FOUND', 'red' ,'bold') ;
            echo ', may be  eg : '
            . $this->fmt( 'use B12phpfw\\core\\zinc\\'. basename($clsscript_path, '.php') .' ?'
            , 'blue', 'bold') .' - see stack trace (caller)';
      echo '<br />'.$this->fmt(' module_path_arr = possible CLASS SCRIPTS DIRS assigned in index.php are :', 'black', 'bold');
      echo '<pre>';
      echo '$this->pp1='; print_r($this->pp1);
      echo '$nscls='; print_r($nscls);
      echo '</pre>';

    break;
  }

   } //e n d  f n  l o a d e r


  private function fmt(string $txt, string $color, string $bold='')
  { 
    ob_start(); //ob_ start("callbackfn"); //without output buffering breaks line
    ?><span style="color: <?=$color?>; font-size: large; font-weight: <?=$bold?>;"><?=$txt?></span>
    <?php
    $fmtedtxt .= ob_get_contents();
    ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
    return $fmtedtxt ;
  } //e n d  f n  f m t

} //e n d  c l a s s  A u t o l o a d




/**
                    if ('') { ?> <SCRIPT LANGUAGE="JavaScript">
                    alert( "<= __METHOD__ .', line '. __LINE__ .' SAYS: '
                     .'\\n namespaced C L S '. str_replace('\\','\\\\',$nsclsname)
                     .'\\n ...called from: '. str_replace('"','\"',json_encode($caller))
                     .'\\n ...cls_script_path_toinc NOT INCLUDED CANDIDATE C L S  S C R I P T S  are: '
                     .'\\n'. str_replace('"','\"',json_encode($cls_script_path_toinc))
                     >" ) ; 
                    </SCRIPT><?php
                    }

      for ( $nspartx = 0 ; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
            $nspartx < count($nsprefix_arr) ; //expr2 is evaluated at iteration begin
            $nspartx++ ) : //expr3 is evaluated at iteration end
        if ($nsprefix_arr[$nspartx] == $modulename_dirname) {
          $nsdir_in_clsdir = $modulename_dirname ;
          break ;
        }
      endfor;
*/
