<?php

$page = $_REQUEST["page"];
if (!preg_match('|^https{0,1}://|', $page)) {
    print "URL $page invalid or unsupported.";
    exit;
}

$data = file_get_contents($page);

$length = strlen($data);

preg_match_all('|<a\s[^>]*href="([^"]+)"|i', $data, $matches);

$all_links = array();
$js_links = array();
$full_links = array();
$local_links = array();
foreach ($matches[1] as $link) {
    if ($all_links[$link]) {
	continue;
    }
    $all_links[$link] = true;

    if (preg_match('/^javascript:/', $link)) {
	$js_links[] = $link;
    } elseif (preg_match('/^https{0,1}:/i', $link)) {
	$full_links[] = $link;
    } else {
	$local_links[] = $link;
    }
}

?>
<table border="0">
<?php
print "<tr><td>number of links:</td><td>";
print strval(count($matches[1])) . "</td></tr>";
print "<tr><td>unique links:</td><td>";
print strval(count($all_links)) . "</td></tr>";
print "<tr><td>local links:</td><td>";
print strval(count($local_links)) . "</td></tr>";
print "<tr><td>full links:</td><td>";
print strval(count($full_links)) . "</td></tr>";
print "<tr><td>javascript junk:</td><td>";
print strval(count($js_links)) . "</td></tr>";

?>
</table>
