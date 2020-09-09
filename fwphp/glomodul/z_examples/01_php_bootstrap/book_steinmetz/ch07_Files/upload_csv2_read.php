<table>
<tr>
  <th>Field 1</th>
  <th>Field 2</th>
  <th>Field 3</th>
</tr>
<?php

$fn = $_FILES["csvfile"]["tmp_name"];

$fd = fopen($fn, "r");

while (!feof($fd)) {
    $fields = fgetcsv($fd, 0, "\t");
    print "<tr>";
    print "<td>$fields[0]</td><td>$fields[1]</td><td>$fields[2]</td>";
    print "</tr>";
}
?>
</table>
