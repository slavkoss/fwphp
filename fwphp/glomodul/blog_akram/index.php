<?php
$title='Blog' ;
require_once("ahdr.php");

require_once '../../../vendor/erusev/parsedown/Parsedown.php';
$pdown = new \Parsedown; // Parsedown cls has no namespace

$rblk = 5;
          $c_cnt_admin_panel = get_cursor("SELECT COUNT(*) FROM admin_panel") ;
          $row_cnt_admin_panel=$c_cnt_admin_panel->fetch(PDO::FETCH_ASSOC);

          $rtbl=array_shift($row_cnt_admin_panel);
         // echo $rtbl;
          $total_pages=ceil($rtbl/$rblk); 
          // echo $PostPerPage;
$pgordno_from_url = $_GET['p']??1 ;



    //P A G I N A T O R  step 1. Create navigation bar (step 2. is click page in n avbar, read page)
    $pgn_links = get_pgnnav($pgordno_from_url, $rtbl, 'index.php', $rblk);
    //$pgn_links = get_pgnnav($pgordno_from_url, $rcnt_filtered_posts, 'index.php', $rblk);
                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$pgn_links ='; print_r($pgn_links) ;
                      echo '</pre>';
                      exit(0) ;
                    }
    //echo $pgn_links['navbar']; // see below



    if(isset($_GET["SearchButton"]))
    {
      // 1. Query when SEARCH Button is Active
      $Search=$_GET["Search"];
      
      $ViewQuery=get_cursor("SELECT * FROM admin_panel
      WHERE datetime LIKE '%$Search%' 
            OR title LIKE '%$Search%'
            OR category LIKE '%$Search%' 
            OR post LIKE '%$Search%'
            ORDER BY id desc");


    } elseif(isset($_GET["Category"]))
    {
      // 2. QUery When CATEGORY is active URL Tab
      $Category=$_GET["Category"];
      $ViewQuery=get_cursor("SELECT * FROM admin_panel WHERE category='$Category' ORDER BY id desc");  


    } elseif(isset($_GET["p"]))
    {
    // 3. Query When PAGINATION is Active i.e index.php?p=1
      $pgordno_from_url = $_GET["p"];
      if($pgordno_from_url == 0 or $pgordno_from_url < 1){
        $ShowPostFrom=0;
      }else{
        $ShowPostFrom = ($pgordno_from_url*$rblk) - $rblk;}
        $ViewQuery = get_cursor("SELECT  * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,$rblk") ;


    } else{
    // 4. DEFAULT Query for this Page
      $ViewQuery = get_cursor("SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,$rblk") ;
    }

?>


  <!--p class="lead">Img-s width="640"; height="480"</p-->
    <?=$pgn_links['navbar']?>

  </div><!-- e n d  div class="blog-header" -->

  <div class="row"> <!--Row-->
    <div class="col-sm-8"> <!--Main Blog Area-->

      <?php
      $ii = 0 ;
      while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC))
      {
        $PostId=(int)$rowt["id"];
        $DateTime=$rowt["datetime"];
        $Title=$rowt["title"];
        $Category=$rowt["category"];
        $Admin=$rowt["author"];
        $Image=$rowt["image"]??'NOT EXISTENT IMG' ;
          if ($Image<'0') $Image='NOT EXISTENT IMG' ;
        $Post=$rowt["post"];
      
            ?>
        <div class="blogpost thumbnail">
              <?php if (file_exists("Upload/$Image")) { ?>
                <img class="img-responsive img-rounded" alt="file exists Upload/<?=$Image?>"
                     src="Upload/<?=$Image?>" 
                     width="640"; height="480"
                > <?php 
                echo 'Upload/'. $Image;
              } else { echo 'Upload/'. $Image .' does not exist'; }
              ?>
            <div class="caption">

              <h1 id="heading"> <?php echo htmlentities($Title); ?></h1>

              <p class="description"><?=++$ii?>. Category: <?=htmlentities($Category) .', id: '. $PostId?>
                 , Published on <?=htmlentities($DateTime)?>
                 , By <?=htmlentities($Admin)?>

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
                if(strlen($Post)>150){$Post=substr($Post,0,300).'...';}


                //echo $Post;
                $htmltxt = $pdown->text($Post) ;
                echo $pdown->text($htmltxt) ;

                ?>
              </p>
            </div>
            <a href="FullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">
              Read More &rsaquo;&rsaquo;
            </span></a>
              
        </div>
        <?php 
      } ?>


      <?=$pgn_links['navbar']?>



    </div> <!--Main Blog Area Ending-->




<?php
require_once("aside.php");
?>


</div> <!--Row Ending-->
  
  
</div><!--Container Ending-->

<?php
require_once("aftr.php");
