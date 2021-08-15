<?php //9: members.php
  require_once 'header.php';

  if (!$loggedin) die();

  echo "<div class='main'>";

  if (isset($_GET['view']))
  {
	// If Get variable view exists, a user wants to view someone’s profile, so the program does that using showProfile fn, along with providing a couple of links to the user’s friends and messages.
    $view = sanitizeString($_GET['view']);
    
    if ($view == $user) $name = "Your";
    else                $name = "$view's";
    
    echo "<h3>$name Profile</h3>";
    showProfile($view);
    echo "<a class='button' href='messages.php?view=$view'>" .
         "View $name messages</a><br><br>";
    die("</div></body></html>");
  }


  //two Get variables add and remove are tested = username to add or drop in friends table
  if (isset($_GET['add']))
  {
    $add = sanitizeString($_GET['add']);

    $result = queryMysql("SELECT * FROM friends WHERE user='$add' AND friend='$user'");
    //if (!$result->num_rows)
	if (!$result->rowCount())
      queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
  }
  elseif (isset($_GET['remove']))
  {
    $remove = sanitizeString($_GET['remove']);
    queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
  }


  ?>
  <!-- L I N K S -->
  <p><a href="members.php?view=ss">For example to view ss's profile</a></p>
  <p><a href="members.php?add=usr2">For example to add usr2 to friends table</a>
  &nbsp; &nbsp; &nbsp; 
  <a href="members.php?remove=usr2">to remove usr2</a>
  </p>
  <!-- e n d  L I N K S -->



  <h3>Other Members</h3>

  <ul>
  <?php
  //list all (not logged in) usernames
  $result = queryMysql("SELECT user FROM members ORDER BY user");
  $num    = $result->rowCount() ; //$result->num_rows

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row = $result->fetch() ; //$result->fetch_array(MYSQLI_ASSOC)
    if ($row['user'] == $user) continue;
    
    echo "<li><a href='members.php?view=" .
      $row['user'] . "'>" . $row['user'] . "</a>";
    $follow = "follow";

    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='" . $row['user'] . "' AND friend='$user'");
    $t1      = $result1->rowCount() ; //$result1->num_rows
    $result1 = queryMysql("SELECT * FROM friends WHERE
      user='$user' AND friend='" . $row['user'] . "'");
    $t2      = $result1->rowCount() ;

    if (($t1 + $t2) > 1) echo " &harr; is a mutual friend";
    elseif ($t1)         echo " &larr; you are following";
    elseif ($t2)       { echo " &rarr; is following you";
      $follow = "recip"; }
    
    if (!$t1) echo " [<a href='members.php?add="   .$row['user'] . "'>$follow</a>]";
    else      echo " [<a href='members.php?remove=".$row['user'] . "'>drop</a>]";
  }
?>

    </ul></div>
  </body>
</html>
