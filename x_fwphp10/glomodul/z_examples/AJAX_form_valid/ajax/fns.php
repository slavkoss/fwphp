<?php
// J:\awww\www\zbig\04knjige\dynamic_webs_design_nekretn\ch10NEKRETNINE\fns.php
function connectDatabase()
{
  $connection = mysqli_connect('localhost', 'root', '','z_blogcms'); //include("db.php");
  return $connection;
}

function getTblRCount($statement)
{
  $connection = connectDatabase();
  $tblrows = mysqli_query($connection, $statement);
  while($row = mysqli_fetch_array($tblrows)) 
  {
     return $row['numr'] ;
  }
}

function insDelUpd($statement)
{
  $connection = connectDatabase();
  $result = mysqli_query($connection, $statement);
  return mysqli_affected_rows() ;
}

function tblRowsHtml($statement)
//(isset($_POST['dspltblbody']))
{
  //$statement = "SELECT * FROM users";
  $connection = connectDatabase();
  $tblrows = mysqli_query($connection, $statement);
  
  $output = "";
  $outputArray = array();

  if(!$tblrows) { 
     //die("Query Failed" . mysqli_error($connection));
     $output = "<tr><td><span class='row_id'>Query Failed</span></td></tr>";
     array_push($outputArray, $output);
     goto fn_kraj;
  }
  
  while($row = mysqli_fetch_array($tblrows)) 
  {
    ob_start(); //include($path); return ob_get_clean();
    ?>
    <tr>
      <!-- //      i d  d i s p l a y e d -->
      <!--td><span class='row_id'><=$row['user_id']></span></td-->
      <td><span class='row_id'>{{ordno}}</span></td>

      <!-- // e n t e r a b l e  f l d  :  n a m e -->
      <td><input type='text' name='name' id='name' class='form-control name_input'
               value='<?=$row['user_name']?>' nameval_befupd='<?=$row['user_name']?>'
           > </td>
      <!-- // e n t e r a b l e  f l d  :  fk u s e r i d -->
      <td><input type='text' name='user_id' id='user_id' class='form-control user_id_input'
               value='<?=$row['user_id']?>' nameval_befupd='<?=$row['user_id']?>'
           > 

              <!--input class="target" type="text" value="Field 1"-->
              <select class="form-control user_id">
                <option value='<?=$row['user_id']?>' selected="selected">user_id from db = 
                               <?=$row['user_id']?></option>
                <option value="21">all other user_id from db (eg 21)</option>
                <option value="25">all other user_id from db (eg 25)</option>
              </select>

           </td>



      <!-- //     b u t t o n  u p d a t e  t b l r -->
      <td><input type='button' class='btn btn-success update_tblr' value='Upd'
                   title="idtoupd=<?=$row['user_id']?>"
                   idtoupd="<?=$row['user_id']?>"
            > </td>
      <!-- //     b u t t o n  u p d a t e  f o r m -->
      <td><input type='button' class='btn btn-success update_frm' value='Upd form'
                   title="idtoupd formular=<?=$row['user_id']?>"
                   idtoupd_frm="<?=$row['user_id']?>"
            > </td>
      <!-- //     b u t t o n  d e l e t e -->
      <td><input type='button' class='btn btn-danger delete' value='Del'
                   title="idtodel=<?=$row['user_id']?>"
                   idtodel='<?=$row['user_id']?>'
        ></td>
    </tr>
    <?php
    $output = ob_get_clean();
    array_push($outputArray, $output);
  } //e n d  w h i l e
  fn_kraj:
  return $outputArray;
} //e n d  if(isset($_POST['dspltblbody']))



/*
function connectDatabase()
{
  //**********************************************
  //*
  //*  Connect to MySQL and Database
  //*
  //**********************************************

  $db = mysql_connect('localhost','root','');

  if (!$db)
  {
    print "<h1>Unable to Connect to MySQL</h1>";
  }

  $dbname = 'test';

  $btest = mysql_select_db($dbname);

  if (!$btest)
  {
    print "<h1>Unable to Select the Database</h1>";
  }

  return $db;
}

function tblRowsHtml($statement)
{

  $output = "";
  $outputArray = array();

  $db = connectDatabase();

  if ($db)
  {
    $result = mysql_query($statement);

    if (!$result) {
      $output .= "ERROR";
      $output .= "<br /><font color=red>MySQL No: ".mysql_errno();
      $output .= "<br />MySQL Error: ".mysql_error();
      $output .= "<br />SQL Statement: ".$statement;
      $output .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";

      array_push($outputArray, $output);

    } else {

      $numresults = mysql_num_rows($result);

      array_push($outputArray, $numresults);

      for ($i = 0; $i < $numresults; $i++)
      {
        $row = mysql_fetch_array($result);

        array_push($outputArray, $row);
      }
    }

  } else {

    array_push($outputArray, 'ERROR-No DB Connection');

  }

  return $outputArray;
}


function insDelUpd($statement)
{

  $output = "";
  $outputArray = array();

  $db = connectDatabase();

  if ($db)
  {
    $result = mysql_query($statement);

    if (!$result) {
      $output .= "ERROR";
      $output .= "<br /><font color=red>MySQL No: ".mysql_errno();
      $output .= "<br />MySQL Error: ".mysql_error();
      $output .= "<br />SQL Statement: ".$statement;
      $output .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";

    } else {
      $output = mysql_affected_rows();
    }

  } else {

    $output =  'ERROR-No DB Connection';

  }

  return $output;
}
*/

?>