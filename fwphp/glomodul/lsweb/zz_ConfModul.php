<?php
/**
// J:\awww\www\fwphp\www4\_ConfModul.php - in DIRPUBROOT (and in each DIRMODUL)
*/
//ob_start();
session_start(); // starts new or resumes existing session
$dbg = '0';
$UPTO_WSROOT = '../../../' ; //where is this module, PATHWSROOT=J:\awww\www\
$DIR = __DIR__ ; 
//Site has 4 dirlevels below PATHWSROOT (at home or at inet host provider) :
$DIRSITE         = basename(dirname(dirname($DIR))) . '/' ; //='fwphp/'
$DIRPUBROOT      = 'www4/' ;
$DIRGROUPMODULES = 'glomodul4/'; //'' or 'glomodul/', '01mater_buy/' - module is below it
$DIRMODUL        = 'lsweb/'; //'' or 'mkd/'


/**
* ALLSITES GLOBAL SETTINGS (in PATHWSROOTzinc dir) ARE CALCULATED FROM MODULE SETTINGS
*     J:\awww\www\zinc\_ConfAllSites4.php
*     We never change them (except if errors or new features) !!
*/
//require_once realpath($UPTO_WSROOT) . '/zinc/_ConfAllSites4.php';
          //if needed possible is site (in DIRSITE dir) settings script

                          //OWN DBG
                          if ('') { echo '<pre><b>'.__FILE__ .'</b>, lin='. __LINE__ 
                              .' SAYS: ' . 'After require \'autoload_moj.php\'; '
                          .'<br />CONFIG. ARRAY (REPOSITORY) contains routing (table) 1st step'
                          .'<br />$rps=' ; print_r($rps); echo 
                          'autoload_moj.php does :'
                         .'assigns $rps array & loads clsscript (or Composer\'s autoload)'
                         .'spl_autoload_register('
                         .'  function($fqcn) //fqcn=Full Qualified Class Name eg B12phpfw\Home'
                         .'     { '
                         .'       $dbg = $GLOBALS[\'rps\'][\'dbg\']; // global $dbg;'
                         .'       ...'
                         .'}); // e n d  f n  c l o s u r e' ; echo '</pre>';
                          }
