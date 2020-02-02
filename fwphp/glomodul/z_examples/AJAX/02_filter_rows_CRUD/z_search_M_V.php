<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\AJAX\01_cars_diaz\search_M_V.php
include("db.php");  //if($connection) {echo "Yes it is";}
                //test server response :
                if ('0') { echo '<pre>'.__FILE__ .', lin='. __LINE__
                   .'<br />     <b>*** '.__METHOD__ .'  SAYS ***</b>';
                echo '<br /><h3>$ _POST=</h3>'; print_r($_POST) ;
                echo '</pre>'; }
$search = $_POST['search'];
if(!empty($search)) {
    $query = "SELECT * FROM events WHERE event_title LIKE '%$search%' ";
    $search_query = mysqli_query($connection,$query);
    $count = mysqli_num_rows($search_query);    

    if(!$search_query) { die('QUERY FAILED' . mysqli_error($connection)); }
    if($count <= 0) { echo "Sorry not found"; } else {
       while($row = mysqli_fetch_array($search_query)) {
            ?><ul class='list-unstyled'>
               <?="<li>{$row['event_title']}</li>"?>  
             </ul>
       <?php  }
    }
}
