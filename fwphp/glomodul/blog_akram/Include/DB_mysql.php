<?php

    try {
        $host = "localhost";
        $dbname = "z_phpcms"; // z_blogcms  z_cleanblog
        $user = "root";
        $pass = "";

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } catch(PDOException $e) {
        echo $e->getMessage();
    }
    

    // if($conn == true) {
    //     echo "conn works fine";
    // } else {
    //     echo "conn err";
    // }
