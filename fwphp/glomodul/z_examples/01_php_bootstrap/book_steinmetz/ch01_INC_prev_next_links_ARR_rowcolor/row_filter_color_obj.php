<?php
$find_fld = ''; if (isset($_GET['find_fld'])) $find_fld = $_GET['find_fld'];

// T A B L E  M O D E L :
$conn = db_conn();
$sql =  "
select user_id, user_name, CONCAT(user_id,user_name) find_in_string, user_pass 
from users where CONCAT(user_id,user_name) like ?
" ; // like '%$find_fld%' - works
$bindvars = ['%'.$find_fld.'%']; // works   //$bindvars = ['%']; // works

echo '<hr />' . $sql;
echo '<br />' . debugPDO($sql, $bindvars);

$result = query($conn, $sql, $bindvars) ; // or die;
// ***************************************
?>

<html><head>
<style>
  tr.row1 {background-color: lightgray;}
  tr.row2 {background-color: white;}
</style>

</head><body>
<!-- // V I E W 1  S E A R C H  F O R M  :
  sticky serh value : value="$find_fld"
-->
<h3>Enter few characters in "Filter rows" field (or nothing for all rows)</h3>
<form  action=""  method="get">
  
  <input  type="text"  name="find_fld" value="<?=$find_fld?>"
          style="color:red; font-size:1.1em">
  
  <input  type="submit"  value="Filter rows"  style="color:red; font-size:1.1em">
</form>


<?php
$outtbl = new OutTable;
foreach ($result as $row) { // or //while($row = mysql_fetch_row($result))
  $outtbl->print_row($row, [0,1 //,2 = not visible column
    ,3,4,5,6,7,8,9,10,11,12]); //$outtbl->print_row($row, [0,2]) - works
}
unset($outtbl);


// V I E W 2  T A B L E :
class OutTable {
  function __construct() {$this->row_ordno = 0; print "<table>";}
  function __destruct() {print "</table>";}
  
  function print_row($row, $col_ordnos=[0,1,2,3,4,5,6,7,8,9,10,11,12]) //columns ord.nums
  {
    if ($this->row_ordno & 1) {$row_color = "row2";} else {$row_color = "row1";}
    print "<tr class=\"$row_color\">";
    //foreach ($row as $value) {print "<td>$value</td>";}
    $rr = $this->row_ordno + 1; echo "<td>$rr.</td>"; //r o w  ordinary number
      $colx = 0; while ($colx < count($col_ordnos)):
      if ( isset($row[$col_ordnos[$colx]]) ) 
        {echo '<td>'.stripslashes($row[$col_ordnos[$colx]]).'</td>';  $colx++;}
      else {break;}
    endwhile;
    print "</tr>";
    $this->row_ordno++;
    //worse : <td>$rr.</td><td>$row[user_id]</td>...
    //echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>";
  }
} //e n d  c l s  O u t T a b l e





function query($conn, $query, $bind_vars=[]){ //secured query with prepare and execute
  //$args = func_get_args();
  //array_shift($args); //element 1 is not argument but query itself, should removed

  $reponse = $conn->prepare($query); //parent::prepare($query); (class MyPDO extends PDO)
  $reponse->execute($bind_vars);
  return $reponse;
}

function db_conn(
  $usr = 'root', $psw = '', $server = 'localhost:3306'
  ,$db = 'tema', $dbtype = 'mysql'
)
{
//              mysql PDO
  $dsn = "$dbtype:host=".$server.";dbname=".$db ;
        try {
          $conn = new PDO($dsn, $usr, $psw //, $options
          );
          //PDO::ATTR_DEFAULT_FETCH_MODE defaults to PDO::FETCH_BOTH
          $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
          //if(0*TEST) 
            echo '<b>$conn = new PDO($dsn, $usr, $psw //, $options)</b>';
          return $conn;
        } catch ( Exception $e )
        { // If the DB connection fails, output the error
            die ( $e->getMessage() );
        }
}


function debugPDO($raw_sql, $bindvars) 
{
  // build_pdo_query, call it so : echo debugPDO($query, $bindvars); 
        $keys = array();
        $values = $bindvars;

        foreach ($bindvars as $key => $value) {

            // check if named bindvars (':param') or anonymous bindvars ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);

        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */

        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
}






//function insecureQuery($query){ //you can use the old query at your risk ;) and should use secure quote() function with it
//     return PDO::query($query);
//}
?>




<!-- /*

PDO::setAttribute  (PHP 5 >= 5.1.0, PHP 7, PECL pdo >= 0.1.0)
PDO::setAttribute — Set an attribute 

Description
public bool PDO::setAttribute ( int $attribute , mixed $value )

Sets an attribute on the database handle. Some of the available generic attributes are listed below; some drivers may make use of additional driver specific attributes. 

• PDO::ATTR_CASE: Force column names to a specific case. 
  ? PDO::CASE_LOWER: Force column names to lower case. 
  ? PDO::CASE_NATURAL: Leave column names as returned by the database driver. 
  ? PDO::CASE_UPPER: Force column names to upper case. 

•PDO::ATTR_ERRMODE: Error reporting. 
  ?PDO::ERRMODE_SILENT: Just set error codes.
  ?PDO::ERRMODE_WARNING: Raise E_WARNING.
  ?PDO::ERRMODE_EXCEPTION: Throw exceptions.

•PDO::ATTR_ORACLE_NULLS (available with all drivers, not just Oracle): Conversion of NULL and empty strings. 
  ?PDO::NULL_NATURAL: No conversion.
  ?PDO::NULL_EMPTY_STRING: Empty string is converted to NULL.
  ?PDO::NULL_TO_STRING: NULL is converted to an empty string.
  •PDO::ATTR_STRINGIFY_FETCHES: Convert numeric values to strings when fetching. Requires bool. 

•PDO::ATTR_row_ordnoMENT_CLASS: Set user-supplied row_ordnoment class derived from PDOrow_ordnoment. Cannot be used with persistent PDO instances. Requires array(string classname, array(mixed constructor_args)). 

•PDO::ATTR_TIMEOUT: Specifies the timeout duration in seconds. Not all drivers support this option, and its meaning may differ from driver to driver. For example, sqlite will wait for up to this time value before giving up on obtaining an writable lock, but other drivers may interpret this as a connect or a read timeout interval. Requires int. 

•PDO::ATTR_AUTOCOMMIT (available in OCI, Firebird and MySQL): Whether to autocommit every single row_ordnoment. 

•PDO::ATTR_EMULATE_PREPARES Enables or disables emulation of prepared row_ordnoments. Some drivers do not support native prepared row_ordnoments or have limited support for them. Use this setting to force PDO to either always emulate prepared row_ordnoments (if TRUE and emulated prepares are supported by the driver), or to try to use native prepared row_ordnoments (if FALSE). It will always fall back to emulating the prepared row_ordnoment if the driver cannot successfully prepare the current query. Requires bool. 

•PDO::MYSQL_ATTR_USE_BUFFERED_QUERY (available in MySQL): Use buffered queries. 

•PDO::ATTR_DEFAULT_FETCH_MODE: Set default fetch mode. Description of modes is available in PDOrow_ordnoment::fetch() documentation. 

Return Values
Returns TRUE on success or FALSE on failure. 

*/ -->


</body></html>
