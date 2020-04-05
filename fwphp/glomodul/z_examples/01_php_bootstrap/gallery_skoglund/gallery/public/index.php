<?php
 require_once("../includes/initialize.php");

  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1; //1. curr. pg num. ($current_page)
  $per_page = 3;                          //2. records per page ($per_page)
  $total_count = Photograph::count_all(); //3. total record count ($total_count)

  // Find all photos: use pagination instead $photos = Photograph::find_all();
  $pgn = new Pagination($page, $per_page, $total_count);
  
  // Instead of finding all records, just find the records for this page
  // Need to add ?page=$page to all links we want to 
  // maintain the current page (or store $page in $session)
  $sql = "SELECT * FROM photographs ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pgn->first_inpg()}";

  $photos = Photograph::find_by_sql($sql);

?>

<?php include_layout_template('header.php'); ?>

<?php foreach($photos as $photo): ?>
  <div style="float: left; margin-left: 20px;">
    <a href="photo.php?id=<?php echo $photo->id; ?>" 
       title="<?='$image_path='.$photo->image_path()?>">
      <img src="<?php echo $photo->image_path(); ?>" width="200" />
    </a>
    <p><?php echo $photo->caption; ?></p>
  </div>
<?php
  //$image_path = $photo->image_path();
endforeach; 
?>


<div id="pagination" style="clear: both;">
<?php
  if($pgn->tot_pgs() > 1) {
    
    if($pgn->has_prev_pg()) { 
      echo "<a href=\"index.php?page=";
      echo $pgn->prev_pg();
      echo "\">&laquo; Previous</a> "; 
    }

    for($i=1; $i <= $pgn->tot_pgs(); $i++) {
      if($i == $page) {
        echo " <span class=\"selected\">{$i}</span> ";
      } else {
        echo " <a href=\"index.php?page={$i}\">{$i}</a> "; 
      }
    }

    if($pgn->has_next_pg()) { 
      echo " <a href=\"index.php?page=";
      echo $pgn->next_pg();
      echo "\">Next &raquo;</a> "; 
    }
    
  }

?>
</div>



<?php 
//echo '$image_path='.$image_path;
include_layout_template('footer.php'); ?>
