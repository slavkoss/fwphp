<!-- N A V B A R  A D M I N   J:\awww\www\fwphp\glomodul\user\navbar.php  onclick="event.preventDefault()"-->
  <!-- Hero -->
  <div class="hero" data-theme="dark">

    <nav class="container-fluid">
        <ul>
          <li><a href="<?=$pp1->sitehome?>" class="contrast"><strong>Sitehome</strong></a></li>
        </ul>

        <ul>
          <!--li><a href="#" class="contrast" data-theme-switcher="auto">Auto</a></li-->
          <li><a class="contrast" href="<?=$pp1->home_url?>" title="Refresh this page">Home</a></li>
          <!--li><a href="#" class="contrast" data-theme-switcher="light">Light</a></li>
          <li><a href="#" class="contrast" data-theme-switcher="dark">Dark</a></li-->
          &nbsp; &nbsp; &nbsp; 
          <!--li><a class="contrast" href="<?=$pp1->sitehome?>">Sitehome</a></li>
          <li><a class="contrast" href="result.php">Dashboard</a></li-->
          <?php if(!empty($_SESSION['username'])){ ?>
             <li><a class="contrast" href="<?=$pp1->logout?>">Logout</a></li>
          <?php }else{  ?>
             <li><a class="contrast" href="<?=$pp1->login?>">Login</a></li>
          <?php  } ?>


        </ul>
    </nav>


  </div><!-- Hero -->

<!-- NAVBAR ADMIN END -->