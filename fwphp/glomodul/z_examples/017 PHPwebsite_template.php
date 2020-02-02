<?php
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
     // 2. URL_DOM AIN = dev1:8083 :
  . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

$curtime = date("Y-m-d H:i:s");

$title = 'First page';
$contnt = '<h2>Header 2</h2>
<p>pppppppp ppppppppp ppppppppp</p>


';


//include 'hdr.php'; //***************hdr.php****************** : ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1"> <!--shrink-to-fit=no-->
  <title><?=isset($title)?$title:'TMPL'?></title>
  <!-- 4.3.1 -->
  <link rel="stylesheet" href="<?=$wsroot_url?>zinc/themes/bootstrap/css/bootstrap.min.css">
<!--link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->

<style>
   body {
  padding-top: 5px;
}
</style>
</head>


<body>


<?php
//include 'nav.php'; // *************************nav.php ******************** : ?>
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





<div class="container">

<?=$contnt?>
</div><!-- e  n d  div class="container"-->






<?php //include 'ftr.php'; // *************************ftr.php ******************** : ?>


<br>
    <!-- FOOTER -->
    <footer class="bg-dark text-white">

      <div class="container">
        <div class="row">
          <div class="col">

            <p class="lead text-center"> 
              | <!--span id="year"></span--> <?=$curtime?> &copy; phporacle (Slavko Srakočić, Zagreb) MIT licence All right Reserved.</p>
            <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" 
              href="https://github.com/slavkoss/fwphp" 
              target="_blank">PHP 7 PDO DBI <?=''?> | Bootstrap 4.3.1 
              <br>&trade; B12phpfw on <?=PHP_OS.', '.php_uname()?></a></p>


           </div> <!-- e n d  c o l-->
         </div>
      </div>

    </footer>
    <!-- FOOTER END-->


<script type="text/javascript" src="<?=$wsroot_url?>zinc/themes/bootstrap/js/jquery.min.js"></script>
<!--script src="<?=$wsroot_url?>zinc/themes/bootstrap/js/popper.min.js"></script-->
<script type="text/javascript" src="<?=$wsroot_url?>zinc/themes/bootstrap/js/bootstrap.min.js"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body></html>
