<?php

$table = '<tr><td>last_name, first_name</td>
<td>address</td>
<td>phone number</td>
</tr>';

$table = preg_replace('/<td>([^<]*),\s*([^<]*)<\/td>/',
		      '<td>\1</td>' . "\n" . '<td>\2</td>',
		      $table);

print $table;

?>
