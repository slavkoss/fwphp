<?php
https://www.w3schools.com/html/html_tables.asp


  switch (true) {
    case ( $mvno > 0 ):

      break ;
    default:

      break;
  }


?>
********** Collapsed Borders, Cellpadding, Left-align Headings 
           Cell that spans two columns
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>
</head>
<body>

<h2>Cell that spans two columns</h2>
<p>To make a cell span more than one column, use the colspan attribute.</p>

<table style="width:100%">

  <caption>caption caption caption</caption>

  <tr>
    <th>Name</th>
    <th colspan="2">Telephone</th>
  </tr>
  <tr>
    <td>Bill Gates</td>
    <td>55577854</td>
    <td>55577855</td>
  </tr>
</table>


<table id="t01">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>

</table>


</body>
</html>





           ************ Cell that spans two rows
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
</head>
<body>

<h2>Cell that spans two rows</h2>
<p>To make a cell span more than one row, use the rowspan attribute.</p>

<table style="width:100%">
  <tr>
    <th>Name:</th>
    <td>Bill Gates</td>
  </tr>
  <tr>
    <th rowspan="2">Telephone:</th>
    <td>55577854</td>
  </tr>
  <tr>
    <td>55577855</td>
  </tr>
</table>

</body>
</html>



             **************************** Styling Tables
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
</style>
</head>
<body>

<h2>Styling Tables</h2>

<table>
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>
<br>

<table id="t01">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>

</body>
</html>








************************* No Borders :
<!DOCTYPE html>
<html>
<body>

<h2>Basic HTML Table</h2>

<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>

</body>
</html>





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