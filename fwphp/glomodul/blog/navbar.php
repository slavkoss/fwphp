<?php

//$u riq = $this->g etp('u riq') ;
$pp1  = $this->getp('pp1') ;

?>
  <!-- NAVBAR  -->
  <div style="height:10px; background:#27aae1;"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

      <a href="<?=$pp1->home_blog.$pp1->filter_page?>1/" class="navbar-brand">Home</a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarcollapseCMS">

        <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a href="/fwphp/www" class="nav-link">SiteHome</a></li>
        <li class="nav-item"><a href="<?=$pp1->kalendar?>" class="nav-link"
            title="Show all posts in months">Kalendar</a></li>
           <li class="nav-item"><a href="" class="nav-link">|</a></li>
        <li class="nav-item"><a href="<?=$pp1->about_us?>" class="nav-link">About Us</a></li>
        <li class="nav-item"><a href="<?=$pp1->contact_us?>" class="nav-link">Contact Us</a></li>
        <li class="nav-item"><a href="<?=$pp1->features?>" class="nav-link">This Module</a></li>
           <li class="nav-item"><a href="" class="nav-link">|</a></li>
        </ul>

        <ul class="navbar-nav ml-auto">

          <!-- 
             http://dev1:8083/fwphp/glomodul/blog/?Search=Nobody+made&SearchButton=  = method="get"
             http://dev1:8083/fwphp/glomodul/blog/?p/1  = method="post", but :
             $_POST=Array (
                [Search] => Nobody made
                [SearchButton] => 
             )
          -->
          <form method="post" action="<?=$pp1->filter_page?>1/i/home/"
                class="form-inline d-none d-sm-block" 
                title="$this->p p1->filter_page...=<?=$pp1->filter_page?>1/i/home/"
          >
            <div class="form-group">
            <input class="form-control mr-2" type="text" name="Search" 
                   placeholder="Search here" value="">

            <button title="Find in title, summary (4000 chars), img desc (4000 chars), category, datetime
 TODO: Find in content in op.system file (multimilions chars)."
                    class="btn btn-primary" name="SearchButton"
            >Go</button>

            </div>
          </form>

        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <?php
                 if (isset($_SESSION["userid"])) { 
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
    <div style="height:10px; background:#27aae1;"></div>
    <!-- NAVBAR END -->