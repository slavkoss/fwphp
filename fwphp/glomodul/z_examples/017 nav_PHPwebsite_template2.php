
  <!-- NAVBAR   $this->pp1->f ilter_page> 1-->
  <div style="height:5px; background:#27aae1;"></div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

      <a href="<?='$this->pp1->filter_page'?>1/i/home/" class="navbar-brand">Home</a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarcollapseCMS">

        <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a href="/fwphp/www" class="nav-link">SiteHome</a></li>
        <li class="nav-item"><a href="<?='$this->pp1->kalendar'?>" class="nav-link"
            title="Show all posts in months">Kalendar</a></li>
           <li class="nav-item"><a href="" class="nav-link">|</a></li>
        <li class="nav-item"><a href="<?='$this->pp1->about_us'?>" class="nav-link">About Us</a></li>
        <li class="nav-item"><a href="<?='$this->pp1->contact_us'?>" class="nav-link">Contact Us</a></li>
        <li class="nav-item"><a href="<?='$this->pp1->features'?>" class="nav-link">This Module</a></li>
           <li class="nav-item"><a href="" class="nav-link">|</a></li>
        </ul>

        <ul class="navbar-nav ml-auto">

          <form method="post" action="<?='$this->pp1->filter_page'?>1/i/home/"
                class="form-inline d-none d-sm-block" 
                title="$this->pp1->filter_page...=<?='$this->pp1->filter_page'?>1/i/home/"
          >
            <div class="form-group">
            <input class="form-control mr-2" type="text" name="Search" 
                   placeholder="Search here" value="">

            <button title="Find in title, summary (4000 chars), img desc (4000 chars), category, datetime TODO: Find in content in op.system file (multimilions chars)."
                    class="btn btn-primary" name="SearchButton"
            >Go</button>

            </div>
          </form>

        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <?php
                 if (isset($_SESSION["userid"])) { 
                    ?><a href="<?='$this->pp1->dashboard'?>" class="nav-link text-danger">
                    <?php
                    echo 'Tables';
                 } else { 
                    ?><a href="<?='$this->pp1->loginfrm'?>" class="nav-link text-danger">
                    <?php
                    echo 'Log in';
                 }
               ?>
            </a></li>
        </ul>
      </div>

    </div>
  </nav>

  <div style="height:5px; background:#27aae1;"></div>
    <!-- NAVBAR END -->




              <!-- navbar bootstrap 3.3.6 -->
              <!--
              <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                  </div>
                  <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
              -->
