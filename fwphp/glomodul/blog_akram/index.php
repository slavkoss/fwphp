<?php
$title='Blog' ;
require_once("ahdr.php");
?>

<div class="container"> <!--Container-->
	<div class="blog-header">

	<h1>The Complete Responsive CMS Blog  </h1>

	<p class="lead">The Complete blog using PHP by Jazeb Akram img-s width="640"; height="480"</p>

	</div>

	<div class="row"> <!--Row-->
		<div class="col-sm-8"> <!--Main Blog Area-->
		<?php

		// Query when Search Button is Active
		if(isset($_GET["SearchButton"]))
    {
			$Search=$_GET["Search"];
			
		  $ViewQuery=get_cursor("SELECT * FROM admin_panel
		  WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
		  OR category LIKE '%$Search%' OR post LIKE '%$Search%' ORDER BY id desc");

		} elseif(isset($_GET["Category"]))
    {
		  // QUery When Category is active URL Tab
		  $Category=$_GET["Category"];
	    $ViewQuery=get_cursor("SELECT * FROM admin_panel WHERE category='$Category' ORDER BY id desc");	

		} elseif(isset($_GET["Page"]))
    {
		// Query When Pagination is Active i.e index.php?Page=1
      $Page=$_GET["Page"];
      if($Page==0||$Page<1){
        $ShowPostFrom=0;
      }else{
        $ShowPostFrom=($Page*3)-3;}
         //ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,3";
         $ViewQuery = get_cursor("SELECT  * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,3") ;

		} else{
		// The Default Query for B log.php Page
      $ViewQuery = get_cursor("SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,3") ;
    }




		while($DataRows=$ViewQuery->fetch(PDO::FETCH_ASSOC))
    {
			$PostId=$DataRows["id"];
			$DateTime=$DataRows["datetime"];
			$Title=$DataRows["title"];
			$Category=$DataRows["category"];
			$Admin=$DataRows["author"];
			$Image=$DataRows["image"]??'NOT EXISTENT' ;
			$Post=$DataRows["post"];
		
          ?>
          <div class="blogpost thumbnail">
            <?php if (file_exists("Upload/$Image")) { ?>
            <img class="img-responsive img-rounded" alt="Upload/<?php echo $Image;  ?>"
                 src="Upload/<?php echo $Image;?>" 
                 width="640"; height="480"
            > <?php } else echo 'Upload/'. $Image .' does not exist'; 
            ?>
          <div class="caption">
            <h1 id="heading"> <?php echo htmlentities($Title); ?></h1>
          <p class="description">Category:<?php echo htmlentities($Category); ?> Published on
          <?php echo htmlentities($DateTime);?>
      <?php
      $QueryApproved = get_cursor("SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' AND status='ON'") ;
      $RowsApproved=$QueryApproved->fetch(PDO::FETCH_ASSOC);

      $TotalApproved=array_shift($RowsApproved);
      if($TotalApproved>0){
      ?>
      <span class="badge pull-right">
      Comments: <?php echo $TotalApproved;?>
      </span>
          
      <?php } ?>
          
          </p>
          <p class="post"><?php
          if(strlen($Post)>150){$Post=substr($Post,0,150).'...';}
          
          echo $Post; ?></p>
          </div>
          <a href="FullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">
            Read More &rsaquo;&rsaquo;
          </span></a>
            
          </div>
		<?php } ?>




		<nav>
			<ul class="pagination pull-left pagination-lg">
	<!-- Creating backward Button -->
	<?php
	if(isset($Page))
	{
	       if($Page>1){
		?>
		<li><a href="index.php?Page=<?php echo $Page-1; ?>"> &laquo; </a></li>
         <?php        }
	} ?>			
		<?php
      $QueryPagination = get_cursor("SELECT COUNT(*) FROM admin_panel") ;
      $RowPagination=$QueryPagination->fetch(PDO::FETCH_ASSOC);

		  $TotalPosts=array_shift($RowPagination);
		 // echo $TotalPosts;
		  $PostPagination=$TotalPosts/3;
		  $PostPagination=ceil($PostPagination);
		 // echo $PostPerPage;
		
		for($i=1;$i<=$PostPagination;$i++){
	if(isset($Page)){
		if($i==$Page){
		?>
		<li class="active"><a href="index.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php
		}else{ ?>
		<li><a href="index.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>	
		<?php
		}
	}
		} ?>
		<!-- Creating Forward Button -->
		<?php
	if(isset($Page))
	{
	       if($Page+1<=$PostPagination){
		?>
		<li><a href="index.php?Page=<?php echo $Page+1; ?>"> &raquo; </a></li>
         <?php        }
	} ?>	
		</ul>
		</nav>
		
		</div> <!--Main Blog Area Ending-->




<?php
require_once("aside.php");
?>


</div> <!--Row Ending-->
	
	
</div><!--Container Ending-->

<?php
require_once("aftr.php");
