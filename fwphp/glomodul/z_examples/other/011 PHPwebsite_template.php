<?php
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
     // 2. URL_DOM AIN = dev1:8083 :
  . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

$title = 'First page';
$contnt = '<h2>Redbad, King of the Frisians movie 2018, rates ~7 out of 10</h2>
<p>In the Netherlands and northern Germany, especially among supporters of the Frisian independence movement, Redbad is a familiar name. Since it was 1300 years ago, not as much is known. Most of the struggles were lead against the impending Christian rule. <a href="https://en.wikipedia.org/wiki/Redbad,_King_of_the_Frisians">https://en.wikipedia.org/wiki/Redbad,_King_of_the_Frisians</a></p>

<p>The 8th Century was a time of significant religious tension in northern Europe as the new Middle Eastern god sought to supplant those native to the region. Neither side is portrayed here in a flattering manner, at least not from the point of view of a modern audience. The Vikings practise human sacrifice, partly in an attempt to ensue good harvests and military victories, partly for political expedience - the public gets what the public wants. The Christian Franks consider themselves more civilised but are not averse to a spot of torture or wife beating and have no qualms about slaughter in battle. They use a shield wall technique that relies on cooperation, but they are ill-disciplined. The Vikings mostly rely on running at their enemies whilst roaring a waving swords, a technique that worked well for them for several centuries (though better with axes). Somewhere in the midst of all this, Redbad finds himself wondering about philosophy and strategy and better ways of doing things. He is remembered as a warrior, but as with Genghis Khan or Robert the Bruce, it is really his intellect that matters.</p>

<p>700 AD. Northern Europe is divided into two worlds: the Frisians, Saxons and Danes live above the rivers, below the rivers live the Franks. They want to achieve what even the Romans did not succeed: conquer all of Europe. They put in a new weapon to enslave the Gentiles: Christianity. They target Europe`s main trading center, where the Frisian king Aldigisl rules.</p>

<p>Historical significance aside, Roel again uses artistry and imagery to tell a compelling story. Again this was an entirely Dutch production with mainly Dutch actors and a budget of only around 9 million Euros (APPX 10.5 mil USD) Comparing that to Alexander which was released in 2004, adjusted for inflation the budget would be around 200mil, it was already 155mil. To make a massive scale historical drama on this budget is quite impressive. Sadly due to poor release schedule, Summertime, virtually zero promotion, the movie was a bomb, garnering only 400,000 euros in the box office.</p>

<p>The acting in Redbad is quite good. Film should please fans of historical and foreign films. There is some action, again though it is not an action film. Honestly, Redbad is a difficult sell to much of the U.S.A., as seems are attention spans are too short. The film is good, and deserves to be seen by a wider audience, and rates a 7 out of 10. </p>

<p>What makes this film significant beyond its focus on a neglected European hero is its treatment of his religious ideas. Without wanting to give too much away, one might note that this could lead to it having problems getting screened in parts of the US. Epic heroes making the particular impassioned arguments that Redbad does here have been absent from cinema for most of its history, judiciously ignored as Redbad was by those who came to power after he died, and it is good to see that their time has finally come - cinema is, with this film, a little closer to growing up and looking squarely at the world in all its diversity.</p>
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


<?php //include 'nav.php'; // *************************nav.php ******************** : ?>
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
              | <span id="year"></span> &copy; phporacle (Slavko Srakoèiæ, Zagreb) MIT licence All right Reserved.</p>
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
