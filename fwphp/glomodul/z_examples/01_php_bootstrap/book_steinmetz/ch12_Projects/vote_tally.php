<?php
/* display the results of a poll */
require_once("vote_config.php"); 

$poll = $_REQUEST['poll']; 
if (!is_numeric($poll)) {
    die("Invalid poll"); 
} 

/* look up the question */
$sql = "SELECT question
          FROM poll
         WHERE ID = $poll";
$result = @mysql_query($sql, $db) or die ("mysql error: " . mysql_error());
if (mysql_num_rows($result) != 1) {
    die('Invalid poll.');
}
$row = mysql_fetch_array($result);
$question = $row["question"];

$query = "SELECT count(*) AS num_total_votes
            FROM vote V
	   WHERE V.ID = $poll";

$result = @mysql_query($query, $db) or die ("mysql error: " . mysql_error());
$row = mysql_fetch_array($result);
$num_total_votes = $row["num_total_votes"];

$query = "SELECT A.answer, A.answer_ID, count(V.answer_ID) as num_votes
            FROM answer A
       LEFT JOIN vote V
                   ON V.ID = A.ID
                  AND V.answer_ID = A.answer_ID
           WHERE A.ID = $poll
        GROUP BY A.answer_ID
	ORDER BY num_votes DESC, A.answer ASC
";

$result = @mysql_query($query, $db) or die ("mysql error: " . mysql_error());

print "<html><head><title>Poll: $question</title></head><body>";
print '<ul style="list-style-type: none; font-size: 12px;">';
print '<li style="font-weight: bold; padding-bottom: 10px;">';
print "Poll #$poll: $question";
print '</li>';
while ($row = mysql_fetch_array($result)) {
    if ($num_total_votes != 0) {
	$pct = sprintf("%.2f", 100.0 * $row["num_votes"] / $num_total_votes);
    } else {
	$pct = "0";
    }
    $boxwidth = strval(1 + intval($pct)) . "px";
    print '<li style="clear: left;">';
    print "$row[answer]";
    print "</li>";
    print '<li style="clear: left; padding-bottom: 7px;">';
    print '<div style="width: ' . $boxwidth . '; height: 15px;' .
	  '; background: black; margin-right: 5px; float: left;">' .
	  "</div>$pct%";
    print '</li>';
}

print '<li style="clear: left;">';
print "Total Votes: $num_total_votes";
print '</li>';
print '</ul>';
print '</body></html>';

?>
