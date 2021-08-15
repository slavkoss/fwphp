<?php
header('Content-Type: application/json');
require_once 'connection.php';

$response = array();

$stmt = $con->prepare("SELECT * FROM movies"); //mysql statement/query

if($stmt->execute()){
    //statement was executed successfully
    
    //this array stores all of the results
    $movies = array();
    //get all results from db
    $result = $stmt->get_result();

    //loop and get each single row
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

        $movies[] = $row;
    }

    $response['error'] = false; //this is no error
    $response['movies'] = $movies;
    $response['message'] = "movies returned successfully";
    $response['response_code'] = 200; //success
  
    $stmt->close();

    /*
      [
          "error" => false,
          "movies"=> [{},{},{}],
          "message"=>"string"
      ]
    */
  


}else{
    //we have an error
    $response['error'] = true;
    $response['message']= "could not execute query";
    $response['response_code'] = 400;


}


//display results

echo json_encode($response);





?>