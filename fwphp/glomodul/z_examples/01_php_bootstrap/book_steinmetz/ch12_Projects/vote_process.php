<?php
require_once("vote_config.php"); 

$poll = $_POST['poll']; 
$answer = $_POST['answer']; 
if (!is_numeric($poll) || !is_numeric($answer)) {
    die("Invalid poll or answer"); 
} 

/* look up the poll and answer */
$sql = "SELECT A.answer_ID
          FROM poll P, answer A
         WHERE P.ID = A.ID
           AND P.ID = $poll
           AND A.answer_ID = $answer";

$result = @mysql_query($sql, $db) or die (mysql_error());
if (mysql_num_rows($result) == 0) {
    die('Invalid poll or answer.');
}

/* check for prior votes */
if (!$_COOKIE["poll_voted_$poll"]) {
    /* insert the vote */
    $sql = "INSERT INTO `vote` ( `answer_ID` , `ID`)
		 VALUES ($answer, $poll);";
    $result = @mysql_query($sql, $db) or
	      die ("Couldn't insert: " . mysql_error());

    /* mark the poll as voted */
    setcookie("poll_voted_$poll", "1", time() + (60*60*24 * 30));
}

/* redirect to poll results */
header("Location: vote_tally.php?poll=$poll");
?>
