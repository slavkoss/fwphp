<?php
/**
 * action- container is toolbar at first row: buttons upd, del, close
 *                  - bad for more rows
*/
include("db.php");
/***************** Read - Displaying Action Box Data **************/
if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "SELECT * FROM events WHERE event_id = {$id}";
    $query_car_info = mysqli_query($connection, $query);

    if(!$query_car_info) {
       die("Query Failed for event_id=".$id.' '. mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($query_car_info)) {
        /* echo '<p id="feedback" class="bg-success"></p>';
        echo "<input rel='". $row['event_id']."' type='text' class='form-control title-input'
                     value='".$row['event_title']."'>";
        echo "<input type='button'  class='btn btn-success update' value='Update'>";
        echo "<input type='button' class='btn btn-danger delete' value='Delete'>";
        echo "<input type='button' class='btn btn-close' value='Close'>"; */
    }
}

/*********************** Updating Data ********************/
if(isset($_POST['changethis'])) {
   $id =   mysqli_real_escape_string($connection, $_POST['id']);
   $tittle =   mysqli_real_escape_string($connection, $_POST['title']);
   $id    =  $_POST['id'];
   $title =  $_POST['title'];

    $query = "UPDATE events SET event_title = '$title' WHERE event_id = $id ";
    $result_set = mysqli_query($connection, $query);
    if(!$result_set) {
       die("QUERY FAILED" . mysqli_error($connection));
    }
}

/*********************** Deleting Data ********************/
if(isset($_POST['deletethis'])) {
    $id =   mysqli_real_escape_string($connection, $_POST['id']);
    $id    =  $_POST['id'];
    $query = "DELETE FROM events WHERE event_id = $id ";
    $result_set = mysqli_query($connection, $query);
    if(!$result_set) {
       die("QUERY FAILED" . mysqli_error($connection));
    }
}

?>



<script>
   $(document).ready(function(){
       var id;
       var title;
       var changethis = "update";
       var deletethis = "delete";

       //  ***********Extract  i d  and t i t l e *************
       $(".title-input").on('input', function(){
          id    = $(this).attr('rel');
          title = $(this).val();
       });

       // *********** Update Button Function *************
       $(".update").on('click', function(){
          $.post(
               "process.php"                                  //server script
             , {id: id, title: title, changethis: changethis} //s.script params
             , function(data){                         //s.script returned data
                 $("#feedback").text("Record updated successfully");
               }
          )
       });

       // *********** Delete Button Function *************
       $(".delete").on('click', function(){
          if(confirm('Are you sure you want to delete this')) {
             id = $(".title-link").attr('rel');
                $.post("process.php", {id: id, deletethis: deletethis}, function(data){
                    //$("#action-container").hide();
                });
          }
       });

       // *********** Close Button Function *************
       /* $(".btn-close").on('click', function(){
          $("#action-container").hide();
       }); */
   }); // Document ready end tags
</script>






