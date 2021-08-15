<?php
// J:\awww\apl\dev1\04knjige\kalendar\kal\public\user_login_frm.php
//declare(strict_types=1); // php 7

//$dir = __DIR__ ; include_once 'inc/config.php';
// View Output hdr
$page_title = "Prijava";
$fmte = 'css'; $css_files = array("style.$fmte", "admin.$fmte");

include_once 'inc/hdr.php';
?>

<div id="content">

  <!--form action="inc/router.php" method="post"  PATHMODUL_REL-->
  <form action="?login" method="post">
    <fieldset>
    <legend>Prijavite se</legend>

       <label for="uname">Korisnik</label><input type="text" name="uname" id="uname"
              value="" placeholder="Korisnik" autofocus />
<label for="pword">Lozinka</label><input type="password" name="pword" id="pword" value="" />

<input type="hidden" name="token"  value="<?=$_SESSION['token']?>" />
<input type="hidden" name="action" value="loginusr" />


<input type="submit" value="Log In" /> ?login or <a href="?">cancel</a>
<!--input type="submit" name="login_submit" value="Log In" /> <=PATHMODUL_REL>?loginusr  -->

    </fieldset>
  </form>

</div><!-- end #content
-->
<?php 
include_once 'inc/ftr.php';
