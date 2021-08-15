<?php

?>
<html><head>
<style>
  tr.row1 {background-color: lightgray;}
  tr.row2 {background-color: white;}
</style>

</head><body>
<?php
// V I E W  T A B L E :
class OutTable 
{
  function __construct() {
    $this->row_ordno = 0; 
    // h d r
    print '<form action="addtocart_process_frm.php" method="post">';
    print    '<input type="submit" name="add" value="Add to Cart">';
    print    '<table>';
  }
  function __destruct() {
    // f t r
    print    '</table>';
    print '</form>';
  }
  function print_row($row, $col_ordnos=[0,1,2,3,4,5,6,7,8,9,10,11,12] //columns ord.nums
    //,$colxnames=[0,1,2,3,4,5,6,7,8,9,10,11,12]
    ,$ids=[], $names=[]
  )
  {
    if ($this->row_ordno & 1) {$row_color = "row2";} else {$row_color = "row1";}
    print "<tr class=\"$row_color\">";
      //foreach ($row as $value) {print "<td>$value</td>";}
      $rr = $this->row_ordno + 1; echo "<td>$rr.</td>"; //r o w  ordinary number
      $colx = 0; while ($colx < count($col_ordnos)): //c o l u m n  ordinary number
      if ( isset($row[$col_ordnos[$colx]]) ) 
        {
          if ($colx == 0) // id column can be type=\"hidden\"
          { echo '<td>'
              ."<input type=\"hidden\" name=\"ids[$this->row_ordno]\" value=\""
              .stripslashes($row[$col_ordnos[$colx]])
              ."\">"
              .stripslashes($row[$col_ordnos[$colx]])
          .'</td>'; }
          else // name column
          { 
            echo '<td>'.stripslashes($row[$col_ordnos[$colx]]).'</td>';
            echo '<td>'
            ."<input type=\"text\" name=\"quantities[$this->row_ordno]\" size=\"1\" value=\"0\">"
            //.'<br />'
          .'</td>'; }
         $colx++;
        }
         else {break;}
    endwhile;
    print "</tr>";
    $this->row_ordno++;
  }
}
// T A B L E  M O D E L :
$sql =  "select user_id, user_name, CONCAT(user_id,user_name) find_in_string 
from users where CONCAT(user_id,user_name) like ?
" ; // like '%$find_fld%' - works
$conn = db_conn();
//$bindvars = ['%'.$find_fld.'%']; // works
$bindvars = ['%']; // works
$result = query($conn, $sql, $bindvars) ; // or die;


// T A B L E  M O D E L :
$outtbl = new OutTable;
foreach ($result as $row) { // or //while($row = mysql_fetch_row($result))
  $outtbl->print_row($row, [0,1]); //($row, [0,2]) - COLS FILTER works
}

unset($outtbl);

echo '<hr />' . $sql;
echo '<br />' . debugPDO($sql, $bindvars);

echo '</body></html>';











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





/*
$db = mysql_connect("localhost", "username", "password");
mysql_select_db("wcphp", $db);

$category = "shoes";

// retrieve products from the database 
$sql = "SELECT product_name, product_id
          FROM product_info
	 WHERE category = '$category'";

$result = @mysql_query($sql, $db) or die;

// Initialize variables 
$order_form = ""; // will contain product form data 
$i = 1; 
print '<form action="addtocart.php" method="post">';
  while($row = mysql_fetch_array($result)) {
      // Loop through the results from the MySQL query
      $product_name = stripslashes($row['product_name']);
      $product_id = $row['product_id'];
    
      //Add the row to the order form
      print "<input type=\"hidden\" name=\"product_id[$i]\" value=\"$product_id\">";
      print "<input type=\"text\" name=\"quantity[$i]\" size=\"2\" value=\"0\"> $product_name<br />";

      $i++;
  } 
print '<input type="submit" name="add" value="Add to Cart"></form>';

*/


?>
