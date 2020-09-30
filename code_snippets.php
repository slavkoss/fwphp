<?php
/**
*  J:\awww\www\code_snippets.php   http://sspc2:8083/code_snippets.php
*  J:\awww\www\fwphp\glomodul\z_examples\code_snippets.php
*     http://sspc2:8083/fwphp/glomodul/z_examples/code_snippets.php
*/
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting
?>
<!--
-->
<h1>Code snippets</h1>
<h2>snippet001 SHOWS ROUTING IN B12phpfw CODE SKELETON (in J:\awww\www\zinc\Config_allsites.php)</h2>

zinc is site level shares folder (reusables, globals). Site folder (site document root) is J:\awww\www. Routing is made with URL key-keyvalue pairs. PSR-x autoloading may be not working.
<pre>
    /**
    * ************* coding step cs04. *******************
    * DISPATCHER: calls Home_ctr cls method (CONVENTION : i=ctrakcmethod)
    * which calls fns or includes view scripts (http jumps only to other module)
    * Dispatching using home class methods is based on Mini3 php fw.
    *              E x a m p l e s  INVALID  U R L s  :
    * 1. http://phporacle.eu5.net/fwphp/glomodul/mkd/?edit=001_MDcheatsheet.txt
    * 2. http://phporacle.eu5.net/fwphp/glomodul/mkd/?edit=01/001_php/B12phpfw.mkd
    * or txt, md, mkd anywhere :
    * 3. http://sspc2:8083/fwphp/glomodul/mkd/?edit=J:/awww/www/readme.md
    * ? in "?edit" is QS (U R L Query Separator)
    *             E x a m p l e s  VALID  U R L s  :
    * Must be present "i/m" where m=Home_ctr_method_name which includes script 
    * or calls any method in any class in clsscripts dirlist in index.php !!, so :
    * http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/"J:/awww/www/readme.md"
    *****************************************************
    */

<?php
$REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
echo '1. $REQUEST_URI=filter_var($_SERVER[\'REQUEST_URI\'], FILTER_SANITIZE_URL)='
  . '<br /><b>'. $REQUEST_URI .'</b>' ;

$uri_arr = explode(QS, $REQUEST_URI) ; 
echo '<br /><br />2. $uri_arr=explode(QS, $REQUEST_URI)'; print_r($uri_arr) ;

$module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/'); 
echo '<br />3.1 (step 1) $module_relpath=rtrim(ltrim($uri_arr[0],"/"),"/")=' //.'<br />'
  . $module_relpath ;
//Displays  fwphp/glomodul/z_examples/code_snippets.php

                // Looking for '.php' from the from the 1th byte from the end
                //var_dump(strrpos($module_relpath, '.php', -1));
//http://sspc2:8083/fwphp/glomodul/z_examples/code_snippets.php
echo '<br />0123456789X123456789X123456789X123456789X123456789X123456789X123456789X';

$posext = strrpos($module_relpath, '.php');
echo '<br />3.2 strrpos ".php" (starting with 0)=strrpos($module_relpath, ".php")='
  . $posext ;
//Displays  39 (starting with 0)

$moduledir_relpath = dirname(rtrim($module_relpath, ".php")) ;
//$moduledir_relpath = dirname(str_replace(".php", "", $module_relpath)) ;
echo '<br />3.3 $moduledir_relpath=dirname(rtrim($module_relpath, ".php"))='
  .$moduledir_relpath ;

$moduledir_relpath = $moduledir_relpath === "." ? "" : $moduledir_relpath ;
echo '<br />3.4 $moduledir_relpath = ($moduledir_relpath === "." ? "" : $moduledir_relpath) ='
   . '<b>'. $moduledir_relpath . '</b>'.'(Should be "" if script is in site document root)' ;


?>
</pre>