<html><head>
<title>Choose a Card - ecards</title>
<style>
table.choose { font-family: sans-serif; font-size: 12px; }
table.choose th { text-align: left; }
</style>
</head>
<body>
<?php

require_once("card_include.php"); 

/* look up the cards */
$sql = "SELECT ID, thumbnail, description, category
          FROM card_list
      ORDER BY category, description";

$result = @mysql_query($sql, $connection) or die (mysql_error());

if (mysql_num_rows($result) == 0) {
    die('No cards listed.');
}

$num_cards = mysql_num_rows($result);
$plural = ($num_cards == 1) ? "card" : "cards";
print "$num_cards $plural available:<br />";
print "(click card to send)<br />";
print '<table class="choose">';
print "<tr><th>Category</th><th>Name</th><th>Thumbnail</th></tr>";
while($row = mysql_fetch_array($result)) {
    $link = "card_send.php?ID=$row[ID]";
    print '<tr>';
    print "<td>$row[category]</td>";
    print "<td><a href=\"$link\">$row[description]</a></td>";
    if ($row["thumbnail"]) {
	print "<td><a href=\"$link\">
		   <img src=\"$row[thumbnail]\" /></a></td>";
    } else {
	print "<td>(no thumbnail)</td>";
    }
    print "</tr>";
}
print "</table>";
?>
</body>
</html>
