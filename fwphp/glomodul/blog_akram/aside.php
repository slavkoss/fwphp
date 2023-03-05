<div class="col-sm-offset-1 col-sm-3"> <!--Side Area -->

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h2 class="panel-title">Categories</h2>
    </div>
    <div class="panel-body">
  <?php
        $ViewQuery = get_cursor("SELECT * FROM category ORDER BY id desc") ;
  while($DataRows=$ViewQuery->fetch(PDO::FETCH_ASSOC))
  {
    $Id=$DataRows['id'];
    $Category=$DataRows['name'];
  ?>
  <a href="index.php?Category=<?php echo $Category; ?>">
  <span id="heading"><?php echo $Category."<br>"; ?></span>
  </a>
  <?php } ?>
      
    </div>
    <div class="panel-footer">
      
      
    </div>
  </div>




  <div class="panel panel-primary">
    <div class="panel-heading">
      <h2 class="panel-title">Recent Posts</h2>
    </div>
    <div class="panel-body background">
      <?php
      $ViewQuery = get_cursor("SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5") ;
      while($DataRows=$ViewQuery->fetch(PDO::FETCH_ASSOC))
      {
        $Id=$DataRows["id"];
        $Title=$DataRows["title"];
        $DateTime=$DataRows["datetime"];
        $Image=$DataRows["image"];
        if(strlen($DateTime)>11){$DateTime=substr($DateTime,0,12);}
        ?>
        <div>
        <img class="pull-left" style="margin-top: 10px; margin-left: 0px;"  src="Upload/<?php echo htmlentities($Image); ?>" width=120; height=60;>
            <a href="FullPost.php?id=<?php echo $Id;?>">
             <p id="heading" style="margin-left: 130px; padding-top: 10px;"><?php echo htmlentities($Title); ?></p>
             </a>
             <p class="description" style="margin-left: 130px;"><?php echo htmlentities($DateTime);?></p>
          <hr>
        </div>	
      
    
    
       <?php } ?>		
		
	  </div>
	  <div class="panel-footer">
		
		
	  </div>
  </div>
		
		
    
			<h2>About me </h2>
	<img class=" img-responsive img-circle imageicon" src="images/comment.jpg">		
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
		, sed do eiusmod tempor incididunt ut labore et dolore magna
		aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul
		lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a
		ute irure dolor in reprehenderit in voluptate velit esse cill
		um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c
		upidatat non proi
		dent, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
		
		
</div> <!--Side Area Ending-->
