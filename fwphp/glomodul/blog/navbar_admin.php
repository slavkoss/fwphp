<?php

//$u riq = $this->g etp('u riq') ;
//$pp1  = $this->pp1 ;

?>
<!-- NAVBAR ADMIN-->
<div style="height:10px; background:#27aae1;"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="container">
    <a href="<?=$pp1->home_blog.$pp1->filter_page?>1/" class="navbar-brand">Home</a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarcollapseCMS">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item"><a href="<?=$pp1->dashboard?>" class="nav-link">Dashboard</a></li>

      <li class="nav-item"><a href="" class="nav-link">|</a></li>

      <li class="nav-item"><a target="_blank"  href="<?=$pp1->admins?>" 
        title="ctrl key + click to open link in new tab" class="nav-link">Admins</a></li>

      <li class="nav-item"><a target="_blank" href="<?=$pp1->categories?>" class="nav-link">Categories</a></li>

      <li class="nav-item"><a target="_blank" href="<?=$pp1->posts?>" class="nav-link">Msgs (Posts)</a></li>

      <li class="nav-item"><a target="_blank" href="<?=$pp1->comments?>" class="nav-link">Comments</a></li>

      <li class="nav-item"><a href="" class="nav-link">|</a></li>

    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- $pp1->upd_user_loggedin
           http://dev1:8083/fwphp/glomodul/user/?i/upd_user_loggedin/id/30
      -->
      <li class="nav-item"><a target="_blank" href="<?=$pp1->upd_user_loggedin?>" class="nav-link">My Profile</a></li>
      <li class="nav-item"><a href="<?=$pp1->logout?>" class="nav-link text-danger">
        <i class="fas fa-user-times"></i> Logout</a></li>
    </ul>
    </div>

  </div>

</nav>
<div style="height:10px; background:#27aae1;"></div>
<!-- NAVBAR ADMIN END -->