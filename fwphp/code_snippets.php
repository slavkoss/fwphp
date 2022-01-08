<?php
//https://www.w3schools.com/html/html_tables.asp
// var_dump(getenv('PHP_ENV'), $_SERVER, $_REQUEST);
// Enable: E_WARNING | E_PARSE (report typical errors), -1 (report all errors) / Disable: 0 (no error reporting)
error_reporting(0);

error_reporting(1);
ini_set('display_errors', 1);


echo urldecode(
'
http://dev1:8083/fwphp/glomodul/user/%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20variable:%20id%20in%20%3Cb%3EJ:/awww/www/fwphp/glomodul/user/Home.php%3C/b%3E%20on%20line%20%3Cb%3E85%3C/b%3E%3Cbr%20/%3E?i/read_row/id/
'
); -- ' --'


  /*
  switch (true) {
    case ( $mvno > 0 ):
      break ;
    default:
      break;
  } 
  */

/*
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$countrycode = filter_input(INPUT_POST, "countrycode", FILTER_SANITIZE_STRING);
if(is_null(NULL)){
    echo "is_null(NULL)<br>";
}

$vals     =  [0,'0',1,w2,3.45,'3,45','sasd',01,'01',999999999999,'',' ',NULL] ;
$vals_str = "[0,'0',1,w2,3.45,'3,45','sasd',01,'01',999999999999,'',' ',NULL]" ;
echo '<br><br>';
echo "gettype of $vals_str<br>";
foreach ($vals as $value) {
  $valtype = gettype($value);

  if( $valtype == 'string' ) {
    $value = str_replace(',','.',$value);
  }

  $valtype = gettype($value);

  echo "$value is {$valtype}";

  // ---------------------
  if($value === 0 or $value === '0'){
    echo ".....0 and '0' are integer" ;
  }

  // for '01'
  if( $valtype == 'string' and $value * 1 / (int)$value === 1 ) {
    echo ".....integer" ;
  }
  // for '3,45'
  if( $valtype == 'string' and $value * 1 !== (int)$value ) {
    echo ".....double" ;
  }

  echo '<br>';
        //}
}
echo '<br><br>';
echo "is_int of $vals_str<br>";
f oreach ($vals as $value) {
        $valtype = is_int($value);
            echo "is_int $value ? {$valtype}<br>";
}
echo '<br><br>';
echo "(int) of $vals_str<br>";
f oreach ($vals as $value) {
  echo "(int)$value=".(int)$value;
  if($value === 0 or $value === '0'){
    echo ".....0 and '0' are integer" ;
  } 
  echo '<br>';
}


echo '<br><br>';

*/
  /* else {
    //if( (int)$value === $value ){ // '01' should be integer
    if( (int)$value / $value = 1 ){
      echo ".....integer" ;
    }
  } */

?>

<!--
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
-->






/**
* ALTER TABLE `admins` ADD `email` VARCHAR(100) NULL AFTER `addedby`;
* http://sspc2:8083/fwphp/glomodul/user/
* J:\awww\www\fwphp\glomodul\user\index.php
*        Instantiates Home_ ctr cls - router, dispatcher
*
* step 1 in Module  U S E R  T B L  C R U D on B12phpfw CRUD code skeleton. 
* cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic), cs05. OUTPUT (view)
* see https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\index.php
*/

// Db_ allsites.php may be named abstract class AbstractDataMapper.php
//  - encapsulates AS MUCH MAPPING LOGIC AS POSSIBLE
//   - couple of generic row object finders (get cursor, not record sets)
//   - read row objects is in Tblname_crud domain objects so I do not do so :
//     logic required for pulling in data from a specified table which is then used
//     for reconstituting domain objects in a valid state. Because reconstitutions
//     should be delegated down the hierarchy to refined implementations, 
//     newrow_obj() (createEntity()) method has been DECLARED ABSTRACT.


/*
//**********************************************************************
//         MODULE AUTOLOADER DO NOT DELETE !!!!!!!!!
// (not used here but may be needed in some modules) 
//**********************************************************************
namespace Model; //FUNCTIONAL NAME SPACING (not dir names ee positional)
//Instead of require 'm.php'; require 'v.php';  require 'c.php'; :
//    ***** namespaced cls name --> cls script path *****
class Autoloader
{
  private static function get_module_cls_script_path($class, $nsprefix) {
    //replace name space backslash to current operating system directory separator
    $DS = DIRECTORY_SEPARATOR ;

    $cls_script_path = __DIR__ .'/'
      . str_replace( [$nsprefix,'\\'] //substrings to replace
                       , ['', '/']    //replacements
                       , $class       //in string
        ).'.php'; //append cls script extension and convert (to Windows) backslash :
   $cls_script_path = str_replace(['/','\\'], [$DS,$DS], $cls_script_path) ;

   return $cls_script_path ;
  }

  public static function autoload($class) //namespaced className
  {
    // ********** 1. module_ cls_ script_ path **********  eg B12phpfw\\clickmeModule
    $cls_script_path1 = self::get_module_cls_script_path($class, $nsprefix1='Model') ;
    $cls_script_path2 = self::get_module_cls_script_path($class, $nsprefix2='Model\\') ;
    $cls_script_path3 = self::get_module_cls_script_path($class, $nsprefix3='ModelMapper\\') ;
    $cls_script_path4 = self::get_module_cls_script_path($class, $nsprefix4='CoreDB\\') ;

    // ********** 2. cls_ script_ path_ external_ module **********
    //$cls_script_path = $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


      // ********** 3. r e q u i r e  cls_ script_ path **********
      switch (true) {
        case file_exists($cls_script_path1): include_once $cls_script_path1 ; break;
        case file_exists($cls_script_path2): include_once $cls_script_path2;  break;
        case file_exists($cls_script_path3): include_once $cls_script_path3;  break;
        case file_exists($cls_script_path4): include_once $cls_script_path4;  break;
        //case file_exists($cls_script_path_external_m): include_once $cls_script_path_external_m; break;
        default:
          if ('1') { echo 'For namespaced class '. $class
            . '<br />Possible CLASS SCRIPTS NAMES derived from functional namespaces,'
            . '<br />ee from vendor name space prefixes :'
            . "<br />\"$nsprefix1\" or \"$nsprefix2\" or \"$nsprefix3\" or \"$nsprefix4\" are :"
            ; 
            echo '<pre>';
            print_r([$cls_script_path1, $cls_script_path2, $cls_script_path3, $cls_script_path4]);
            //print_r('Namespaced class '. $class .' has not class script ?');
            echo '</pre>';
          }
          break;
      }
  }
}
//spl_autoload_register('config\Autoloader::autoload');
*/



/* //            WAS  in index.php (see 03xuding dir) :
//      !!!!!!!!! THIS IS NOW IN Home_ctr.php (B12phpfw) !!!!!!!!!!!!
require_once(__DIR__.'/confglo.php');

require_once __DIR__.'/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// see J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding
include_once 'hdr.php';

switch (true) {
  case isset($_GET['c']): include 'create.php'; break;
  case isset($_GET['r']): include 'read.php'; break;
  case isset($_GET['u']): include 'update.php'; break;
  case isset($_GET['d']): include 'delete.php'; break;

  default: include_once 'home.php'; break;
}

include_once 'ftr.php';
//e n d      !!!!!!!!! THIS IS IN Home_ctr.php !!!!!!!!!!!!
*/

/* To do :
Add pagination to PHP CRUD grid          - done in Blog module
Implement search function                - done in Blog module
Build image upload                       - done in Blog module
Use custom inputs such as select box/radio box
*/






/*
class PDOConnection {
	private static $dbhost = "127.0.0.1";
	private static $dbname = "mvcblog";
	private static $dbuser = "mvcuser";
	private static $dbpass = "mvcblogpass";
	private static $db_singleton = null;

	public static function getInstance() {
		if (self::$db_singleton == null) {
			self::$db_singleton = new PDO(
        "mysql:host=".self::$dbhost.";dbname=".self::$dbname.";charset=utf8", // connection string
        self::$dbuser,
        self::$dbpass,
        array( // options
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
		  );
	  }
	return self::$db_singleton;
  }
}
*/
