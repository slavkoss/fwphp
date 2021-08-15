<?php
/* display a vote form */
require_once("vote_config.php"); 
$poll = $_GET['poll']; 
if (!is_numeric($poll)) {
    die("Invalid poll"); 
}

/* Look up the poll in the database */
$sql = "SELECT P.question, A.answer, A.answer_ID
	  FROM poll P, answer A
	 WHERE P.ID = $poll
           AND A.ID = P.ID";

$result = mysql_query($sql, $db) or die ("mysql error: " . mysql_error());
if (mysql_num_rows($result) == 0) {
    die('Invalid poll.');
}

/* if the user has already voted, show the results */
if ($_COOKIE["poll_voted_$poll"]) {
    header("Location: vote_tally.php?poll=$poll");
    exit;
}

/* vote form */
$question_list = ""; 
while($row = mysql_fetch_array($result)) {
    $question = $row['question']; 
    $question_list .= '<li><input name="answer" type="radio" value="' .
	              $row['answer_ID'] . '"> ' . $row['answer'] .
		      '</li>';
}

?>
<html>
<head></head>
<body>
<span style="font-size: 12px;">
<span style="font-weight: bold; font-size: 14px;">
    Poll #<?php print $poll; ?>
</span><br />
<span style="font-weight: bold"><?php print $question; ?></span>
<form action="vote_process.php" method="post">
<ul style="list-style-type: none;">
<?php print $question_list; ?>
</ul>
<input name="poll" type="hidden" value="<?php print $poll; ?>">
<input name="" type="submit" value="Vote!">
</form>
</span>
</body></html>
