<!-- NAVBAR ADMIN-->
<div style="height:10px; background:#27aae1;"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="container">
    <a class="navbar-brand" href="<?=MODULE_URL?>">Home</a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarcollapseCMS">

      <ul class="navbar-nav mr-auto">
      <li class="nav-item "><a class="nav-link" href="<?=WSROOT_URL?>">SiteHome</a></li>
      </ul>


        <ul class="navbar-nav ml-auto">
        <?php
        if(isUserLoggedIn())
        { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=MODULE_URL?>profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=MODULE_URL?>logout.php">Logout</a>
            </li>
            <?php 
        } else
        { ?>
           <li class="nav-item ">
                <a class="nav-link" href="<?=MODULE_URL?>register.php">Register </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="<?=MODULE_URL?>login.php">Login</a>
            </li>
               <?php
        } ?>
        </ul>



    </div>

  </div>

</nav>
<div style="height:10px; background:#27aae1;"></div>
<!-- NAVBAR ADMIN END -->
