<?php
header('Content-Type: application/json');
require_once 'connection.php';

$response = array();


//movie was provided through get request
if(isset($_GET['title'])){

    //go ahead and get the move
     $title = $_GET['title']; //get request parameter, which has the title

     $stmt = $con->prepare("SELECT id, title, storyline, lang, genre,release_date,box_office, run_time, stars  
                        FROM movies WHERE title = ? ");
      $stmt->bind_param("s",$title); 
      
      if($stmt->execute()){

            //success
            $stmt->bind_result($id,$title,$storyline,$lang,$genre, $release_date,$box_office,$run_time,$stars);
            $stmt->fetch();

            $movie = array(
                'id'=>$id,
                'title'=>$title,
                'storyline'=>$storyline,
                'lang'=>$lang,
                'genre'=>$genre,
                'release_date'=>$release_date,
                'box_office'=>$box_office,
                'run_time'=>$run_time,
                'stars'=>$stars
            );

            $response['error'] = false;
            $response['movie'] = $movie;
            $response['message']="movie has been returned successfully";
            $response['response_code'] = 200;


      }else{
          //failure
          $response['error']= true;
          $response['message']= "we could not get the movie";
          $response['response_code'] = 400;

      }



}else{

    //no movie title was provided, we cannot get the movie

    $response['error']=true;
    $response['message']="Please provide a movie title";
    $response['response_code'] = 400;

}


echo json_encode($response);






?>