<?php
require_once("blog_config.php"); 

if ($_REQUEST["category"]) {
    $category = mysql_escape_string($_REQUEST["category"]);
    $where_clause = "WHERE category = '$category'";
    $smarty->assign("category", $category);
} else {
    $where_clause = "";
    $smarty->assign("category", "");
}

$sql = "SELECT title, category, teaser,
               UNIX_TIMESTAMP(entry_time) AS entry_time, ID
          FROM blog_entries
	       $where_clause
      ORDER BY entry_time DESC
         LIMIT 0, 20"; 
$result = @mysql_query($sql, $connection) or die (mysql_error());
if (mysql_num_rows($result) == 0) {
	die('No entries in this blog.'); 
} 
$items = array();
while ($row = mysql_fetch_array($result)) {
    $items[] = array(
	"ID"		=> $row["ID"],
	"date"		=> date("F dS Y, h:ia", $row['entry_time']),
	"title"		=> $row["title"],
	"teaser"	=> $row["teaser"],
	"category"	=> $row["category"],
	"category_parm"	=> urlencode($row["category"]),
    );
}
$smarty->assign("blog_items", $items);
$smarty->assign("title", "blog: index");

$smarty->display("blog_index.tpl");
?>
