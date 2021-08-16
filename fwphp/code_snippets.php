<?php
//https://www.w3schools.com/html/html_tables.asp

// var_dump(getenv('PHP_ENV'), $_SERVER, $_REQUEST);
// Enable: E_WARNING | E_PARSE (report typical errors), -1 (report all errors) / Disable: 0 (no error reporting)
error_reporting(0);

error_reporting(1);
ini_set('display_errors', 1);

  /*
  switch (true) {
    case ( $mvno > 0 ):
      break ;
    default:
      break;
  } 
  */

echo urldecode(
'
http://dev1:8083/fwphp/01mater/book/%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Undefined%20variable:%20module_url%20in%20%3Cb%3EJ:/awww/www/fwphp/01mater/book/cc_frm.php%3C/b%3E%20on%20line%20%3Cb%3E56%3C/b%3E%3Cbr%20/%3E?i/cc/
'
);

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
foreach ($vals as $value) {
        $valtype = is_int($value);
            echo "is_int $value ? {$valtype}<br>";
}
echo '<br><br>';
echo "(int) of $vals_str<br>";
foreach ($vals as $value) {
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




<?php
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
