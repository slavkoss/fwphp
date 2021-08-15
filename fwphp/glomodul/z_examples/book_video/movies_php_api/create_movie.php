<?php
header('Content-Type: application/json');
require_once 'connection.php';

$response = array();

 
 //title, storyline, box_office, stars, lang, genre, release date,run_time

 //id --> will be created by the db

 if( isset($_POST['title']) && isset($_POST['storyline'])  && isset($_POST['lang'])
      && isset($_POST['genre']) && isset($_POST['release_date']) && isset($_POST['box_office'])
       && isset($_POST['run_time'])
      && isset($_POST['stars']) ){

        //store paramerts in variables
        $title = $_POST['title'];
        $storyline = $_POST['storyline'];
        $lang = $_POST['lang'];
        $genre = $_POST['genre'];
        $release_date = $_POST['release_date'];
        $box_office = $_POST['box_office'];
        $stars = $_POST['stars'];
        $run_time = $_POST['run_time'];

        //we have all paramerts

      $stmt =   $con->prepare("INSERT INTO movies (title, storyline, lang, genre, release_date, box_office, run_time, stars)
                       VALUES (?,?,?,?,?,?,?,?)");

        $stmt->bind_param('sssssdsd',$title, $storyline, $lang, $genre, $release_date, $box_office, $run_time, $stars);               

        //execute query
        if($stmt->execute()){

            //success
            $response['error'] = false;
            $response['message'] = "movie inserted successfully";
            $response['response_code'] = 201; //created - success

            $stmt->close();

        }else{

            //failure
            $response['error'] = true;
            $response['message'] = "failed to inserted to the database";
            $response['response_code'] = 400;

        }


}else{

    //we cannot insert a movies that doesn't have all of this info
    $response['error'] = true;
    $response['message'] = "please provide all parameters";
    $response['response_code'] = 400;
}



echo json_encode($response);




?>