<?php
require_once("blog_config.php"); 
$ID = intval($_REQUEST['ID']); 

$query = "SELECT title, category, content,
                 UNIX_TIMESTAMP(entry_time) AS entry_time
            FROM blog_entries
           WHERE ID = $ID"; 

$result = @mysql_query($query, $connection) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
    die('Invalid ID.');
} 

$row = mysql_fetch_array($result);
$smarty->assign("title", $row["title"]); 
$smarty->assign("content", $row["content"]); 
$smarty->assign("category", $row["category"]); 
$smarty->assign("date", date("F dS Y, h:ia", $row["entry_time"])); 
$smarty->assign("id", $ID); 

/* look up comments */
$query = "SELECT comment, name,
                 UNIX_TIMESTAMP(comment_time) AS comment_time
            FROM blog_comments
           WHERE ID = $ID
        ORDER BY comment_time ASC"; 

$result = @mysql_query($query, $connection) or die (mysql_error());

$comments = array();
while ($row = mysql_fetch_array($result)) {
    $comments[] = array(
	"name"     => $row["name"],
	"comment"  => $row["comment"],
	"time"     => date("F dS Y, h:ia", $row["comment_time"]),
    );
}
$smarty->assign("comments", $comments);

/* display page */
$smarty->display("blog_display.tpl");

?>
