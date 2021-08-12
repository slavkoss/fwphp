<?php
// J:\awww\www\zinc\Autoload.php
declare(strict_types=1);
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;

//if (!isset($_SESSION)) { session_start(); }
//if (strnatcmp(phpversion(),'5.4.0') >= 0) {
   if (session_status() == PHP_SESSION_NONE) { session_start(); }
//} else { if(session_id() == '') { session_start(); } }


class Autoload
{
   protected $pp1 ; //M O D U L E PROPERTIES PALLETE like in Oracle Forms

   public function __construct(&$pp1) {
                      //not working but : ctrl+u in ibrowser !!!
                      //register_shutdown_function('self::_fatal_error_hndl');
     //$a='hello';  variable variable $$a='world'; is same as $hello='world';
     //   echo "$a ${$a}"; is same as echo "$a $hello";
     //arrays: ${$a[1]} to use $a[1] as a variable 
     //   or ${$a}[1] to use $$a as the variable and then the [1]index from that variable
     $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ 
        .' ('. __METHOD__ .')';
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'loader'));
     return null ;
   }


  private function get_path($nscls, &$nsdir_routTBLclsdir) // static ?
  {
    // $ n s c l s  is namespaced cls name
    // returns cls_script_path
    $DS = DIRECTORY_SEPARATOR ;
    $this->pp1->stack_trace[]= __METHOD__ .', lin='.__LINE__ 
      .' $nscls='. $nscls;

    $nscls_linfmt = str_replace('\\',$DS, $nscls) ; //ON LINUX
    $clsname     = basename($nscls_linfmt) ;        //eg = Config_ allsites
    // Eliminated cls name from namespaced cls name :
    $last_nspart = basename(dirname($nscls_linfmt)) ; //=tasks, ON LINUX='.' !!! ???
    
    // 1. Loop through routing tbl (all possible dirs for cls script)
    $clsdirx = 0;
    while ($clsdirx < count($this->pp1->module_path_arr)):
      $scriptdir_path = str_replace('\\',$DS, $this->pp1->module_path_arr[$clsdirx]) ; //ON LINUX
      $script = $scriptdir_path . $clsname .'.php' ;
      $routTBL_dirname = basename($scriptdir_path) ;

              if ('') { echo  '<br />'. '<br /> &nbsp;  &nbsp;  &nbsp; '
                     . __METHOD__ .', line '. __LINE__ .' SAYS: ' ;
                     echo 'IF BOTH DIR BELOW ARE EQUAL (GREEN) : $nsdir_routTBLclsdir=one_of_them '; print_r($nsdir_routTBLclsdir); 
                     echo '<br /> &nbsp;  &nbsp;  &nbsp; '. '$nscls=';
                     print_r($nscls); echo ' $last_nspart = DIR IN NS = b asename(d irname(LINUXFMT $nscls))';
                echo '<br /> &nbsp;  &nbsp;  &nbsp; routTBL_dirpath = LINUXFMT $this->pp1->module_path_arr[$clsdirx]=';
                     print_r($scriptdir_path);
                if ($last_nspart == $routTBL_dirname) {
                  echo '<br />'. ' $last_nspart='; print_r($this->fmt($last_nspart, 'green', 'bold'));
                  echo ' $routTBL_dirname='; print_r($this->fmt($routTBL_dirname, 'green', 'bold'));
                } else {
                  echo '<br />'. ' $last_nspart='; print_r('<b>'.$last_nspart.'</b>');
                  echo ' $routTBL_dirname='; print_r('<b>'.$routTBL_dirname.'</b>');
                }
                echo '<br />$clsname='; print_r($clsname);
                if (file_exists($script)) {
                  echo '<br />MUST BE : 1. file_exists(<b>$script='.$this->fmt($script, 'green', 'bold')
                      .'</b>) <br /> &nbsp;  &nbsp;  &nbsp; and 2. \$last_nspart=\$routTBL_dirname';
                } else {
                  echo "<br />MUST BE : 1. file_exists(<b>\$script=$script</b>) "
                     ."<br /> &nbsp;  &nbsp;  &nbsp; and 2. \$last_nspart=\$routTBL_dirname";
                }
              }
              //line 44 SAYS: $last_nspart=. $routTBL_dirname=blog $clsname=B12phpfw\module\blog\Home_ctr
              //1. file_exists($script=/srv/disk16/3266814/www/phporacle.eu5.net/fwphp/glomodul/blog/B12phpfw\module\blog\Home_ctr.php) 
              //and 2. $last_nspart=$routTBL_dirname

      // 2. Last part = Eliminated cls name from namespaced cls name from  U R L
      if ( $last_nspart          //from  U R L, eg tasks
           == $routTBL_dirname   //eg tasks, then zinc
           and file_exists($script) //eg J:/awww/www/zinc/Config_ allsites.php
      )
      {
        $nsdir_routTBLclsdir = $routTBL_dirname ; //eg tasks, also returned to caller
        return $script ;
      }

      $clsdirx++ ;
    endwhile;

    // not found :
    return $clsname .'; <--- put_this_in_caller' ;
  } //e n d  f n  get_ path

  //public static function autoload($cls) //namespaced className
  private function loader($nscls) //$ n s c l s is namespaced  c l a s s  name
  {
    $DS = DIRECTORY_SEPARATOR ;
    //$vendornsp = $this->pp1->vendor_namesp_prefix ;
    $nscls_linfmt = str_replace('\\',$DS, $nscls) ; //ON LINUX
    $clsname = basename($nscls_linfmt) ;

    // ********** 1. get_module_cls_script_path **********  eg B12phpfw\\clickmeModule
    $nsdir_routTBLclsdir   = '' ; //Possible CLASS SCRIPTS DIR is contained in $nscls
    $clsscript_path = $this->get_path(
          $nscls // namespaced cls name
        , $nsdir_routTBLclsdir //returned eg tasks
    ) ;


    // ********** 2. r e q u i r e  cls_ script_ path **********
    $clsscript_path = str_replace('\\',$DS, $clsscript_path) ; //ON LINUX
    switch (true)
    {
      case file_exists($clsscript_path) and $nsdir_routTBLclsdir <> '' :
        require_once $clsscript_path ;
        break;

      default: //E R R O R : NOT FOUND CLS SCRIPT or 
        echo '<br />'.$this->fmt( __METHOD__ .', line '. __LINE__ .' SAYS: ', 'black')  ;
        echo '<br />'.'NOT EXISTS CLS SCRIPT : "' . $this->fmt($clsscript_path, 'red' ,'bold') .'"';
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





   /*private static function _fatal_error_hndl() {
      //not needed at script end define('PROGRAM_EXECUTION_SUCCESSFUL', true);
      //if ( ! defined(PROGRAM_EXECUTION_SUCCESSFUL)) {
        // fatal error has occurred
        if($error !== NULL && $error['type'] === E_ERROR) {
           $error = error_get_last();
           echo '<pre>$error='; echo '$error='; print_r($error); echo '</pre>';
        }
      //}
   } */




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
        if ($nsprefix_arr[$nspartx] == $routTBL_dirname) {
          $nsdir_ in_clsdir = $routTBL_dirname ;
          break ;
        }
      endfor;
*/
