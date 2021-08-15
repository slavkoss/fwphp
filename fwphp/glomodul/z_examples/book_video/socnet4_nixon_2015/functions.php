<?php
/* //01: functions.php
CREATE DATABASE z_socnet;
    CREATE USER 'z_socnet'@'localhost' IDENTIFIED BY 'z_socnet';
    GRANT ALL PRIVILEGES ON z_socnet.* TO z_socnet'@'localhost';
*/
  $host = 'localhost'; // Change as necessary
  $data = 'z_socnet';    // robinsnest - Change as necessary
  $user = 'root';    // socnet or robinsnest - Change as necessary
  $pass = '';          // password - Change as necessary
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
  $opts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  
  try
  {
    $pdo = new PDO($attr, $user, $pass, $opts);
  }
  catch (PDOException $e)
  {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $pdo;
    return $pdo->query($query);
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $pdo;
    $var = strip_tags($var);
    $var = htmlentities($var);
    //if (get_magic_quotes_gpc()) $var = stripslashes($var);
    $result = $pdo->quote($var);          // This adds single quotes
    return str_replace("'", "", $result); // So now remove them
  }

  function showProfile($user)
  {
	global $pdo;
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = $pdo->query("SELECT * FROM profiles WHERE user='$user'");

    while ($row = $result->fetch())
    {
      die(stripslashes($row['text']) . "<br style='clear:left;'><br>");
    }
    
    echo "<p>Nothing to see here, yet</p><br>";
  }



/*
//1: functions.php
  $dbhost  = 'localhost';    // Unlikely to require changing
  $dbname  = 'z_socnet';   // Modify these...
  $dbuser  = 'root';   // ...variables according
  $dbpass  = '';   // ...to your installation
  $appname = "Socnet"; // Robin's N est ...and preference

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die($connection->connect_error);

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->rowCount())
    {
      $row = $result->fetch() ; //$result->fetch_array(MYSQLI_ASSOC)
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
*/