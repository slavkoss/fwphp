<div class="col-sm-offset-1 col-sm-3"> <!--Side Area -->



  <div class="panel panel-primary">

    <div class="panel-heading">

        <!-- **************************** -->
        <h2 class="panel-title">Categories</h2>
        <!-- **************************** -->

    </div>

    <div class="panel-body">
        <?php
        $ViewQuery = get_cursor("SELECT * FROM category ORDER BY 
          case 
            when name='PHP' then '0000'
            when name='HTML' then '1111'
            when name='CSS' then '2222'
            when name='Technology ' then '3333'
            when name='Other ' then '9999'
            else '5555'
          end, name"
        ) ;
          //if(name='PHP','0000', '1111'), name"
          //decode(name, 'PHP','0000', '1111'), name // MariaDB has DECODE_ORACLE()
 
        while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC))
        {

          $rowt = rlows($rowt) ;

          $Id=$rowt['id'];
          $Category=$rowt['name'];
          ?>
          <a href="index.php?Category=<?=$Category?>">
             <span id="heading"><?=$Category."<br>"?></span>
          </a>
          <?php
        } ?>
    </div>
    <div class="panel-footer">
      
      
    </div>
  </div>





  <div class="panel panel-primary">

    <div class="panel-heading">
       <!-- **************************** -->
       <h2 class="panel-title">Recent Posts</h2>
       <!-- **************************** -->
    </div>

    <div class="panel-body background">
      <?php
      /*
            'SELECT *
            FROM (SELECT a.*, ROWNUM AS rnum
                  FROM (' . $sql . ') a
                  WHERE ROWNUM <= :sq_last
                 )
            WHERE :sq_first <= RNUM';

            SELECT *
            FROM (SELECT a.*, ROWNUM AS rnum
                  FROM (SELECT id FROM category ORDER BY id desc) a
                  WHERE ROWNUM <= 5
                 )
            WHERE rnum >= 1 ;

      */


      switch (true) { 
        case DBI==='mysql':
          $cdml = "SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5" ;
          break;
        default: // oracle
          $cdml = "SELECT * FROM (SELECT * FROM admin_panel ORDER BY id desc) where ROWNUM < 6";
          break;
      }
      $ViewQuery = get_cursor($cdml) ;


      while($rowt=$ViewQuery->fetch(PDO::FETCH_ASSOC))
      {
        
        $rowt = rlows($rowt) ;
        
        $Id=$rowt["id"];
        $Title=$rowt["title"];
        $Date_Time=$rowt["datetim"];
        $Im_age=$rowt["imag"];
        if(strlen($Date_Time)>11){$Date_Time=substr($Date_Time,0,12);}
        ?>
        <div>
        <img class="pull-left" style="margin-top: 10px; margin-left: 0px;"  
             src="Upload/<?php echo escp($Im_age); ?>" width=70; height=60;>
            <a href="FullPost.php?id=<?php echo $Id;?>">
             <p id="heading" style="margin-left: 80px; padding-top: 10px;">
                <?php echo escp($Title); ?></p>
             </a>
             <p class="description" style="margin-left: 80px;">
                 <?php echo escp($Date_Time);?></p>
          <hr>
        </div>  
      
    
    
       <?php } ?>    
    
    </div>
    <div class="panel-footer">
    
    
    </div>
  </div>
    
    
  <!-- **************************** --> 
  <h2>About me </h2>
  <!-- **************************** -->
  <img class=" img-responsive img-circle imagicon" src="imags/comment.jpg">    
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
    , sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ul
    lamco laboris nisi ut aliquip ex ea commodo consequat. Duis a
    ute irure dolor in reprehenderit in voluptate velit esse cill
    um dolore eu fugiat nulla pariatur. Excepteur sint occaecat c
    upidatat non proi
    dent, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
    
    
</div> <!--Side Area Ending-->
