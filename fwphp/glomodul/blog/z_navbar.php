<?php
//J:\awww\www\fwphp\glomodul\blog\navbar.php
use B12phpfw\core\b12phpfw\Config_allsites as utl ; // init, setings, utilities
?>
<!-- Responsive NAVBAR-->

  <div class="hero" data-theme="dark">

    <nav class="container-fluid">
        <ul>
          <li><a href="<?=$pp1->sitehome?>" class="contrast"><strong>Sitehome</strong></a></li>
        </ul>

        <ul>
          <?php if(empty($_SESSION['username'])){ ?>
          <li><a title="Paginated posts with summary" class="contrast" href="index.php">Home</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->kalendar?>">Calendar</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->about_us?>">About</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->features?>">Module</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->contact_us?>">Contact us</a></li>
          <?php  } ?>



          <?php if(!empty($_SESSION['username'])){ ?>
             &nbsp; &nbsp; &nbsp; 
             <li><a title="Posts & other tables with CRUD functionality" class="contrast" 
                    href="<?=$pp1->posts?>">Dashboard</a></li>
             <li><a class="contrast" href="<?=$pp1->logout?>">Logout</a></li>

          <?php }else{  ?>
             <li><a class="contrast" href="<?=$pp1->loginfrm?>">Login</a></li>
          <?php  } ?>



        </ul>
    </nav>


  </div><!-- ./ Hero -->

<!-- NAVBAR END -->