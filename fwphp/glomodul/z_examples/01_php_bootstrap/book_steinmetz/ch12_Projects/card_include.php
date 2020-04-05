<?php
$connection = @mysql_connect("localhost","dbuser","dbpass") or die(mysql_error());
$db = @mysql_select_db("wcphp", $connection) or die(mysql_error());

function display_card($card) {
    print '<div style="height: ' . $card["height"] . ';' .
		     ' width: ' . $card["width"] . ';' .
		     ' border: 1px solid; ' . 
		     ' text-align: center;">';
    print $card["content"];
    print '</div>';
}
?>
