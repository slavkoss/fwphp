<?php
require_once("blog_config.php"); 

if ($_REQUEST["submit"]) {
    $content = mysql_escape_string(strip_tags($_REQUEST["content"],
					      "<a><i><b><img>"));
    $teaser = substr(strip_tags($content), 0, 80);
    $title = mysql_escape_string(strip_tags($_REQUEST["title"]));
    $category = mysql_escape_string(strip_tags($_REQUEST["category"]));
    $q = "INSERT INTO blog_entries
	         (title, content, category, teaser, entry_time)
	  VALUES ('$title', '$content', '$category', '$teaser', now())";
    mysql_query($q, $connection) or die(mysql_error());
    $id = mysql_insert_id($connection);
    header("Location: blog_display.php?ID=$id");
} else {
    $smarty->assign("title", "blog: post an entry");
    $smarty->display("blog_edit.tpl");
}
?>
