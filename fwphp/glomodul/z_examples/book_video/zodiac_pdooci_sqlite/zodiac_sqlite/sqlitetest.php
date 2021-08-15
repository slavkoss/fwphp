<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html dir="" lang="hr">
<head>
  <meta content="text/html;charset=UTF-8" http-equiv="Content-Type" />
  <title>Test sqlite DBI-a: PDO-a i ez_sql-a</title>
  <style type="text/css">
<!--
New external address: 89.164.167.118 via www.alexnolan.net
http://89.164.167.118:8084/1_moj_site_iskon/

-->
<!--
body {
   margin-left: 70px;
   margin-right: 50px;
}
body, td, th {
   font-family: Arial, Helvetica, sans-serif;
   font-size: 12px;
}
h2 {
   font-weight: bold;
    Background-Color:#E0DDE6;
    text-align:center;
}
.zuta_bckg {
   font-weight: bold;
   background-color: rgb(255, 255, 153)
}
.zuta_jarka_bckg {
   font-weight: bold;
   Background-Color:yellow;
}
.zelena {
   color: green;  /* #006633 */
   font-weight: bold;
}
.plava {
   color: blue;
   font-weight: bold;
}
.smedja {
   color: #805B2B;
   font-weight: bold;
}
.crvena {
   color: red;
   font-weight: bold;
}
.crvena_tamno {
   color: darkred;
   font-weight: bold;
}
.ljubic_bold { /** #FF00FF */
   color: magenta;
   font-weight: bold;
   font-size: 14px;
}
.ljubicasta { /** #FF00FF */
   color: magenta;
   font-weight: normal;
font-size: 14px;
}
.mali {
   font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
   font-size: 10px;
}
.courier {
   font-family: "Courier New", Courier, monospace;
   font-size: 12px;
}
.courier_mali {
   font-family: "Courier New", Courier, monospace;
   font-size: 10px;
}
.curr_darkblue {
   color: #00F;
   font-family: "Courier New", Courier, monospace;
}
.trula_visnja {
   color: #E0DDE6;
    Background-Color:#00F;
}
.trula_visnja_bckg {
   font-weight: bold;
    Background-Color:#E0DDE6;
}
.courier1 {	font-family: "Courier New", Courier, monospace;
}
-->
</style>

</head>
<body>
<table border="1" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td><span class="courier1"><?php echo '&nbsp;&nbsp; PHP says: '. __FILE__ .' is this file OS path'.', UTF-8 display is &scaron;&#273;&#269;&#263;&#382;'  ; ?> <br>
&nbsp;&nbsp;
htm says: D:\web\sqlitetest.php is this file OS path, UTF-8 display is &scaron;&#273;&#269;&#263;&#382;</span>
<h2>1. Test SQLite DBMS DBI PDO (DB interface "PHP Data Objects")</h2>

<p>
  <?php
//include_once "my_test/DBI/ez_sql/shared/ez_sql_core.php";
//include_once "my_test/DBI/ez_sql/pdo/ez_sql_pdo.php";
error_reporting(E_ERROR | E_WARNING | E_PARSE ); // | E_NOTICE  ssxx:
//$SQLite3_version = SQLite3::version();
?>
  -------------------------------------------<br>
  1. SQLite3 version i PDO driveri<br>
  ------------------------------------------<br>
  
  1.1 PDO driveri (vidljivi su i u phpinfo):  <strong>
    <?php foreach(PDO::getAvailableDrivers() as $driver)  { echo '&nbsp;&nbsp;&nbsp;'.$driver; } ?>
    </strong> <br>
  1.2 SQLite3 version print_r(SQLite3::version()); : <span class="smedja"><strong><?php print_r(SQLite3::version()); ?></strong></span><br>
  SQLite2 version:  <?php //print_r(SQLite2::version()) ?> Fatal error: <strong>Class 'SQLite2' not found</strong> in D:\web\sqlitetest.php on line 111
  <br>
  SQLite  version:
  <?php //print_r(SQLite::version()); ?> Fatal error: <strong>Class 'SQLite' not found</strong> in D:\web\sqlitetest.php on line 114 <br>
  OCI version:
  <?php //print_r(oci::version()); ?> Fatal error: <strong>Class 'oci' not found</strong> in D:\web\sqlitetest.php on line 115 <br />
  <br>
  -------------------------------------------<br>
  2. Conn. PDO-om
  <br>
  -------------------------------------------
  <br>
  $conn = new PDO($dsn, $usr, $psw); 
  &nbsp; - Conn. PDO-om na &lt;strong&gt;ODBC sqlite DB&lt;/strong&gt; using driver invocation.
  <?php 
    $dbFile='blog.db'; // D:\web\blog\protected\data\b log.db
    $dsn = "sqlite:../../../../../../zinc/$dbFile"; //Data Source Name ide i sqlite2, ne ide 'sqlite:dbname=blog;host=127.0.0.1'; 
    $usr = ''; $psw = '';
    //@unlink($dsn);
    try { 
                  //$c onn = new \PDO('sqlite:/path/to/db_file.sqlite3', '', '', array(
                  //     \PDO::ATTR_EMULATE_PREPARES => false,
                  //     \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                  //     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                  //)); 
       $conn = new PDO($dsn, $usr, $psw, array(
                       PDO::ATTR_EMULATE_PREPARES => false,
                       PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                       PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                  )); 
    echo '<br />'."Prijavljeni ste na sqlite bazu <strong>$dbFile</strong>.";
    } catch (PDOException $e) { echo "<strong>Neuspjela prijava na sqlite bazu $dbFile</strong>: " 
	. $e->getMessage(); } 


$sql = 'SELECT TITLE, TAGS, AUTHOR_ID FROM TBL_POST ORDER BY CREATE_TIME DESC';
?></p>
<p>--------------------------------------------------------
  <br />
  3. Učitati i ispisati PDO-om polje tablice<br />
  --------------------------------------------------------<br />
  3.1 $sqlObj = sqlite_query($conn, $sql); - NE IDE STARI NAČIN sqlite_query-jem bez PDO-a.
  <?php 
    //try {
    //not working : $sqlObj = sqlite_query($conn, $sql); 
    $stmt = $conn->prepare($sql);
    $stmt->execute(); //$stmt->execute([3600, time()]);
    $data = $stmt->fetchAll();
    print_r($data);

    
    //var_dump(sqlite_fetch_array($sqlObj)); // sqlite_fetch_array() expects parameter 1 to be resource, null given
    //} catch (Exception $e) { echo 'Caught exception: ',  $e->getMessage(); }

print '<br />'.'3.2 PDO query: Učitati i ispisati <strong>naslove postova.</strong><span class="courier_mali">';
    $sqlObj = $conn->query($sql);
    print '<br /><strong>1. var_dump:</strong> '; var_dump($sqlObj);
    print '<br /><strong>2. print_r:</strong> '; print_r($sqlObj);
    print '<br /><strong>3. var_export:</strong> '; var_export($sqlObj);
    print '</span><br /><br />';
//
$f1t = 'TITLE'; $f2t = 'TAGS'; $f3t = 'AUTHOR_ID';
?>
  
</p>
<table border="1" nowrap align=left valign=top>
  <tbody>
  <?php
echo <<<END
    <tr class="trula_visnja_bckg"><th>$f1t</th><th>$f2t</th><th>$f3t</th></tr>
END;
    foreach ($sqlObj as $row) {
      //print $row->TITLE . "\t"; // Trying to get property of non-object
      $f1 = $row['title']; $f2 = $row['tags']; $f3 = $row['author_id']; // err ako su uppercase !!
      print "<tr><td>$f1</td><td>$f2</td><td>$f3</td></tr>";
    } // end f oreach
?>
  </tbody>
</table>
</td>
</tr>
</tbody>
</table>
<br />



<!--
/////////////////////////////////
// DRUGA DINAM.TABLICA
/////////////////////////////////
-->

<table border="1" cellpadding="3" cellspacing="0">
<tbody>
<tr>
<td>
<h2>2. SQLite DBMS DBI ez_sql - in development</h2>
<?php
/*
// Druga tablica je DA SLJEDECI TEKST NE UPADNE U GORNJU (dinam.stvorenu) TABLICU !!
    // This is how to initialse ezsql for sqlite PDO
    $db = new ezSQL_pdo('sqlite:blog.db'); // ../../../../blog.db  blog/protected/data/ ,'demo','demo'  my_database.sq3
    $sql = 'select title, tags, author_id from tbl_post order by create_time desc';
print '<pre>';
//print 'Example 1. Get one variable from table: ';
//$var = $db->get_var("SELECT " . $db->sysdate() . " FROM DUAL");
//echo '<br />'.'sysdate='.$var;
//$var = $db->get_var("SELECT max(AUTHOR_ID) FROM TBL_POST");
//echo ', max id='.$var;
print '<br /><br />Example 5. NE RADI Get all TBL_POST rows using object syntax <- field names  ?uppercase !!';
    try {
            //$sqlObj = $db->get_results($sql);
    } catch (Exception $e) { echo 'Caught exception: ',  $e->getMessage(); }

//$sqlObj = $db->get_results($sql);
//foreach ($sqlObj as $row) {
//   echo '<br />'.$row->title.' '.$row->tags; //$emp[last_name]; - javi err nije obj
//   echo ' '.$row->author_id; // $emp[email];
//}

print '</pre>';
*/
////////////////////////////////////////////////// kraj prog.
//echo "<td nowrap align=left valign=top><font size=1 color=555599 face=arial>
//         {$this->col_info[$i]->type} {$this->col_info[$i]->max_length}</font><br>
//<span style='font-family: arial; font-size: 10pt; font-weight: bold;'>{$this->col_info[$i]->name}</span>
//</td>";
    //var_dump(sqlite_fetch_array($result)); // sqlite_fetch_array() expects parameter 1 to be resource, object given
    //var_dump($result->fetchArray()); // Call to undefined method PDOStatement::fetchArray()
    //} else { die($sqliteerror); }
    //$db=new PDO('sqlite:'.$dbFile); // sqlite  sqlite2  sqlite3
   //$db = new PDO("sqlite:blog.db"); 
    //if ($db = sqlite_open('D:\web\blog\protected\data\blog.db', 0666, $sqliteerror)) {
    //sqlite_query($db, 'CREATE TABLE foo (bar varchar(10))');
    //sqlite_query($db, "INSERT INTO foo VALUES ('fnord')");
    //$result = sqlite_query($db, 'select bar from foo');
/*
//unlink('mysqlitedb.db');
$db = new SQLite3('D:\web\blog\protected\data\blog.db');
$db->exec('CREATE TABLE foo (bar STRING)');
$db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");

//$stmt = $db->prepare('SELECT bar FROM foo WHERE id=:id');
//$stmt->bindValue(':id', 1, SQLITE3_INTEGER);
//$result = $stmt->execute();
// ili:
$result = $db->query('SELECT bar FROM foo');

//while ($row = $results->fetchArray()) { var_dump($row); }
// ili
var_dump($result->fetchArray());
//ili:
//var_dump($db->querySingle('SELECT username FROM user WHERE userid=1'));
//print_r($db->querySingle('SELECT username, email FROM user WHERE userid=1', true));
*/

//echo <<<END
//<textarea cols="132" rows="22" class="mali">
?>
       </td>
     </tr>
   </tbody>
</table>
<p>In PHP 5.0.x, SQLite 2 was built-in ext. =PECL ext. in PHP 4.3 and PHP 4.4. <br /><br />
  
  With the introduction of PDO, the sqlite extension doubles up to act as a 'sqlite2' driver for PDO; it is due to this that the sqlite extension in PHP 5.1.x has a dependency upon the PDO extension.<br /><br />
  
  PHP 5.1.x ships with a number of alternative interfaces to sqlite:<br />
  - sqlite ext. has the "classic" sqlite procedural/OO API from prior ver. of PHP.<br />
  - sqlite ext. also provides the PDO 'sqlite2' driver - can access legacy SQLite 2 DB using the PDO API.<br />
  - SQLite 2 driver for PDO is provided primarily to make it easier to import legacy SQLite 2 database files into an application that uses the faster, more efficient feature-richer SQLite 3 driver. <br /><br />
  
  PDO_SQLITE provides the 'sqlite' version 3 driver. SQLite version 3 is vastly superior to SQLite version 2, but the FILE FORMATS OF THE TWO VERSIONS ARE NOT COMPATIBLE.<br /><br />
  
  If your SQLite-based project is already written and working against earlier PHP versions, then you can continue to use ext/sqlite without problems, but will need to explicitly enable both PDO and sqlite.<br /><br />
  
  New projects should use PDO and the 'sqlite' (version 3) driver, as this is faster than SQLite 2, has improved locking concurrency, and supports both PREPARED STATEMENTS and BINARY COLUMNS natively.<br /><br />
  
  You must enable PDO to use the SQLite extension. If you want to build the PDO extension as a shared extension, then the SQLite extension must also be built shared. The same holds true for any extension that provides a PDO driver.   
</p>
</body>
</html>

<!--
// from inet :
http://89.164.167.118:8084/1_moj_site_iskon/  
// from LAN :
http://localhost:8084/1_moj_site_iskon/
http://phporacle.mooo.com.localtest.me:8084/1_moj_site_iskon/


www.iskon.hr    nginx/1.6.2

hrRefererhttp://www.inet.hr/~slavksra/adrese/predlozak_side_mnu_tableles.htmlUser-AgentMozilla/5.0 (Windows NT 10.0; Win64; x64; rv:52.0) Gecko/20100101 Firefox/52.0 Cyberfox/52.6.1



-->