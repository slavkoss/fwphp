      <!-- Old pagination, was in index.php before $pgn_links['navbar'] -->
      <nav>

        <ul class="pagination pull-left pagination-lg">

          <!-- Creating backward Button -->
          <?php
          //if(isset($pgordno_from_url))
          //{
            if($pgordno_from_url>1){
              ?>
              <li><a href="index.php?p=<?php echo ($pgordno_from_url - 1) ; ?>"> &laquo; </a></li>
              <?php
            }
          //}       
            
            
          for($i=1;$i<=$total_pages;$i++){
            //if(isset($pgordno_from_url))
            //{
              if($i==$pgordno_from_url){
              ?>
              <li class="active"><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
              }else{ ?>
              <li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>  
              <?php
              }
            //}
          } ?>

          <!-- Creating Forward Button -->
          <?php
          //if(isset($pgordno_from_url))
          //{
            if($pgordno_from_url+1<=$total_pages)
            { ?>
              <li><a href="index.php?p=<?php echo $pgordno_from_url+1; ?>"> &raquo; </a></li>
              <?php
            }
          //} ?>  
        </ul>
      </nav>