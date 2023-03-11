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
    //echo $pgn_links['navbar']; // see below
    $first_rinblock = $pgn_links['first_rinblock'] ;
    $last_rinblock  = $pgn_links['last_rinblock'] ;



    if(isset($_GET["SearchButton"]))
    {
      // 1. Query when SEARCH Button is Active
      $Search=$_GET["Search"];
      
      $ViewQuery=get_cursor("SELECT * FROM admin_panel
      WHERE datetim LIKE '%$Search%' 
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
                  /* $pgordno_from_url = $_GET["p"];
                  if($pgordno_from_url == 0 or $pgordno_from_url < 1){
                    $ShowPostFrom = 0 ;
                  }else{
                    $ShowPostFrom = ($pgordno_from_url*$rblk) - $rblk;
                  } */
                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$pgn_links ='; print_r($pgn_links) ;
                        //echo '$cdml ='; print_r($cdml) ;
                      echo '</pre>';
                      //exit(0) ;
                    }
      switch (true) { 
        case DBI==='mysql':
        $rrfrom = $first_rinblock - 1 ;
          $cdml="SELECT posts.*, null rnum FROM admin_panel posts ORDER BY id desc LIMIT $rrfrom, $rblk" ;
          //$cdml = "SELECT posts.*, null rnum FROM admin_panel posts ORDER BY id desc LIMIT $ShowPostFrom, $rblk" ;
          break;
        default: // oracle rnum is 1...n
          $cdml = "SELECT a.*, rnum from (
              SELECT a.*, ROWNUM rnum FROM (SELECT * FROM admin_panel ORDER BY id desc) a 
          ) a where a.rnum between $first_rinblock and $last_rinblock";
          break;
      }
                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        //echo '$pgn_links ='; print_r($pgn_links) ;
                        echo '$cdml ='; print_r($cdml) ;
                      echo '</pre>';
                      //exit(0) ;
                    }
      $ViewQuery = get_cursor($cdml) ;



    } else{
    // 4. DEFAULT Query for this Page
      $ViewQuery = get_cursor("SELECT * FROM admin_panel ORDER BY id desc") ;
      //$ViewQuery = get_cursor("SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,$rblk") ;
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
        
        $rowt = rlows($rowt) ;

        ++$ii ;
        $rnum=$rowt["rnum"]??$ii;
        $PostId=(int)$rowt["id"];
        $Date_Time=$rowt["datetim"];
        $Title=$rowt["title"];
        $Category=$rowt["category"];
        $Admin=$rowt["author"];
        $Im_age=$rowt["imag"]??'NOT EXISTENT IMG' ;
          if ($Im_age<'0') $Im_age='NOT EXISTENT IMG' ;
        $Post=$rowt["post"];
      
            ?>
        <div class="blogpost thumbnail">

              <?php if (file_exists("Upload/$Im_age")) { ?>
                <img class="img-responsive img-rounded" alt="file exists Upload/<?=$Im_age?>"
                     src="Upload/<?=$Im_age?>" 
                     width="640"; height="480"
                > <?php 
                echo 'Upload/'. $Im_age;
              } else { echo 'Upload/'. $Im_age .' does not exist'; }
              ?>

            <div class="caption">

              <h1 id="heading"> <?php echo escp($Title); ?></h1>

              <p class="description"><?=$rnum?>. Category: <?=escp($Category) 
                     .', id: '. $PostId?>
                 , Published on <?=escp($Date_Time)?>
                 , By <?=escp($Admin)?>

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
