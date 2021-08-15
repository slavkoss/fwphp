<?php
header('Content-Type: application/json');
require_once 'connection.php';

$response = array();

//get id
//what can be updated? box_office, stars, storyline

if( isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars'])
    && isset($_POST['box_office'])  ){


        //move on and update movie

        $id = $_POST['id'];
        $storyline = $_POST['storyline'];
        $stars = $_POST['stars'];
        $box_office = $_POST['box_office'];

        $stmt = $con->prepare("UPDATE movies SET storyline='$storyline', stars='$stars',
                               box_office='$box_office' WHERE id='$id'");

                  if($stmt->execute()){

                        //success
                        $response['error'] = false;
                        $response['message']= "Movie has been updated successfully";
                      


                  } else{

                    //failure
                    $response['error'] = true;
                    $response['message']= "faild to update Movie";
                

                  }            



}else{


    //we don't have info to update the movie
    $response['error'] = true;
    $response['message']= "Please provide us with id, storyline, box office and stars";
  

}

// 200 201 400 401

echo json_encode($response);










/*

1. end point -> /update_movie.php
2. request type : $_POST
3. id, storyline, box_office, stars


*/

?>


