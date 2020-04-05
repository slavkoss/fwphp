<?php 

$movie_type = $_POST["movie_type"]; 
$customer_name = $_POST["customer_name"];

if (is_array($movie_type)) {
    foreach ($movie_type as $key => $value) {
        print "$customer_name likes $value movies.<br>";        
    }
}

?>
