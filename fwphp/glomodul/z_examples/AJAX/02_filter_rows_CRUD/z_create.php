<?php

include("db.php");

if(isset($_POST['name'])) {
  //data received from JS
    echo $name = $_POST['name'];
    $query = "INSERT INTO events(event_title) VALUES('$name') ";
    $return = mysqli_query($connection, $query);
        
    if(!$return) {
       die("INSERT FAILED");
    }

    header("Location: index.html"); //see ob_start();
}
