<?php
require_once("blog_config.php"); 

$ID = intval($_REQUEST["ID"]);
/* look up the blog posting, make sure it's real */
$query = "SELECT title FROM blog_entries WHERE ID = $ID";
$result = mysql_query($query, $connection) or die(mysql_error());
if (mysql_num_rows($result) != 1) {
    header("Location: blog_index.php");
    exit;
}

$name = mysql_escape_string(strip_tags($_REQUEST["name"]));
$comment = mysql_escape_string(strip_tags($_REQUEST["comment"]));
$comment = nl2br($comment);

if (!empty($name) && !empty($comment)) {
    $query = "INSERT INTO blog_comments
		  (ID, comment, name)
           VALUES ($ID, '$comment', '$name')";
    mysql_query($query, $connection) or die(mysql_error());
}

header("Location: blog_display.php?ID=$ID");
?>
