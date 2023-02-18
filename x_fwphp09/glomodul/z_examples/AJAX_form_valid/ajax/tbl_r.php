<?php
//J:\awww\www\zbig\04knjige\dynamic_webs_design_nekretn\ch10NEKRETNINE\tbl_r.php 
//$myData = $_POST['data'];  //This recieves the data passed

//*****************************************************
//Read Guestbook Information From File Into HTML table
//*****************************************************

$display = "";
$line_ctr = 0;

include "fns.php";

echo '<p>Number of users = '.getTblRCount('SELECT count(*) numr FROM users').'</p>';

$myTable = "<table border='1'>";
/*$myTable .= "<tr>";
$myTable .= "<th>UserID</th>";
$myTable .= "<th>Password</th>";
$myTable .= "</tr>"; */

$statement = "SELECT * FROM users order by user_name";
/*$statement  = "SELECT ";
$statement .= "userid, password ";
$statement .= "FROM validusers ";
$statement .= "ORDER BY userid "; */

//print 'xxxxxxxxxxxxxxxxxxx';
$sqlResults = tblRowsHtml($statement);
//echo '<pre>$sqlResults='; print_r($sqlResults) ;  echo '</pre>';

  for ($ii = 1; $ii <= count($sqlResults); $ii++)
  {
    $myTable .= str_replace('{{ordno}}', $ii, $sqlResults[$ii - 1]);
  }

  print $myTable;
  print "</table>";


/*
$sqlResults = tblRowsHtml($statement);

$error_or_rows = $sqlResults[0];

if (substr($error_or_rows, 0 , 5) == 'ERROR')
{
  $myTable .= "Error on DB";
  $myTable .= "$error_or_rows";
} else {

  for ($ii = 1; $ii <= $error_or_rows; $ii++)
  {
    $userid    = $sqlResults [$ii] ['user_id'];
    $password    = $sqlResults [$ii] ['user_pass'];

    $myTable .= "<tr>";
    $myTable .= "<td>".$userid."</td>";
    $myTable .= "<td>".$password."</td>";
    $myTable .= "</tr>\n";
  }

  print "</table>";

  print $myTable;
}
*/
?>