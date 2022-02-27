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
          <li><a title="Paginated posts with summary" class="contrast" href="index.php">Home</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->kalendar?>">Calendar</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->about_us?>">About</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->features?>">Module</a></li>
          <li><a title="" class="contrast" href="<?=$pp1->contact_us?>">Contact us</a></li>

          <?php if(!empty($_SESSION['username'])){ ?>
             &nbsp; &nbsp; &nbsp; 
             <li><a title="Posts & other tables with CRUD functionality" class="contrast" href="<?=$pp1->posts?>">Dashboard</a></li>
             <li><a class="contrast" href="<?=$pp1->logout?>">Logout</a></li>
          <?php }else{  ?>
             <li><a class="contrast" href="<?=$pp1->loginfrm?>">Login</a></li>
          <?php  } ?>

          <!-- $pp1->dashboard - method -not needed    $pp1->posts - was incscript -->
          <!--li><a class="contrast" href="add.php">Add Post</a></li-->

        </ul>
    </nav>



    <!--header class="container">
        <hgroup>
          <h1>Blog 5</h1>
          <h2>A classic company or blog layout with a sidebar, usr:john pasw:john123</h2>
        </hgroup>
    </header-->
        <!--p><a href="#" role="button" onclick="event.preventDefault()">Call to action</a></p-->


  </div><!-- ./ Hero -->




<!--div style="height:5px; background:#27aae1;"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand active" href="<?=$pp1->home_blog.$pp1->filter_page?>1/" 
           >Msg (Blog) Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/fwphp/www">Site Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$pp1->kalendar?>"
                    title="Show all posts in months">Kalendar</a></li>
                <li class="nav-item"><a href="" class="nav-link">|</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="<?=$pp1->features?>">About Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$pp1->about_us?>">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$pp1->contact_us?>">Contact us</a></li>
                <li class="nav-item"><a href="" class="nav-link">|</a></li>
            </ul>


            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                   <?php
                     if (isset($_SESSION['userid'])) { 
                        ?><a href="<?=$pp1->dashboard?>" class="nav-link text-danger">
                        <?php
                        echo 'Tables';
                     } else { 
                        ?><a href="<?=$pp1->loginfrm?>" class="nav-link text-danger">
                        <?php
                        echo 'Log in';
                     }
                   ?>
                </a></li>
            </ul>


        </div>
    </div>
</nav>
<div style="height:5px; background:#27aae1;"></div-->

<!-- NAVBAR END -->