<?php
// J:\wamp64\www\fwphp\glomodul\help_sw\wishPDO\index.php
// http://sspc1:8083/fwphp/glomodul/help_sw/wishPDO/
session_start();  //$_SESSION=[];
//use PDOOCI\PDO as PDO;
$curpgpath = __FILE__ ; 
//require_once( 'z_utls.php'); // realpath // c n f vars & helper fns :
//require_once dirname(dirname(dirname(__DIR__ )))."/vendor/taq/pdooci/src/PDO.php";
require_once("includes/db.php");

if (isset($_SESSION['user'])) { $signedin = $_SESSION['user']; }
else { $signedin = 'nitko'; }
//err: if (!array_key_exists("user", $_SESSION)) { $signedin = $_SESSION['user']; }
//else { $signedin = 'nitko'; }

$logonSuccess = false;
$loginFormVisibility = "visible";

// verify user's credentials
echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
echo '<pre>$_SESSION='; print_r($_SESSION); echo '</pre>';
//$postedusr ='';
//$postedpsw ='';
if ($_SERVER['REQUEST_METHOD'] == "POST" 
  and (
    !isset($_SESSION["user"])
    or
    ( 
       isset($_SESSION["user"]) and isset($_POST['user']) 
       and $_SESSION["user"] and $_POST['user']
       and $_SESSION["user"] != $_POST['user'] 
    )
  )
  )
{
    echo '<h3>'.'BEFORE getInstance()->verify_credentials'.'<h3>' ;
    
    $logonSuccess = WishDB::getInstance()->verify_wisher_credentials(
            $_POST['user'], $_POST['userpassword']
    ) ;
    echo '<h3>'.'AFTER $logonSuccess='.($logonSuccess ? 'true':'false').'<h3>' ;
    if ($logonSuccess === true) {
        $_SESSION['user'] = $_POST['user'];
        //header('Location: B2_tbl_edit.php');
        //exit;
    }
} else {
    if (isset($_SESSION["user"])) {
        $logonSuccess = true;
    }
}
if ($logonSuccess === true) {
    $loginFormVisibility = "hidden";
    if (isset($_POST['B2_tbl_edit'])) {
      header('Location: B2_tbl_edit.php');
      exit;
    }
}


//                H D R
//$title   = $tblmeta[$tblname]['label'] ; 
$title   = '<h1>Users (teme, todo, forum, blog, threads, wish groups)</h1>' ; 
$title2  = $title; // ibrowser tab txt
$basecss = 'default' ; //$cnfgd.$DS.'style00.css'; 
//$basecss = 'style00.css' ; //$cnfgd.$DS.'style00.css'; 
include ('includes/hdr.php'); //later we can change PHP $ variables
//include ($cnfgd.$DS.'hdr.php'); //later we can change PHP $ variables

?>



</div>
<!--e n d d i v  i d="C o n t e n t"-->

<!--div class="logon"-->
<div id="Menu">

    <h2>Izabrana tema-user (logedin, signedin WISHER - master) je 
    <b style="font-size: 2em;"><?= $signedin; ?></b><h2>

    <!--input type="submit" name="myWishList" 
           value="Edit thread >>"
           onclick="javascript:showHideLogonForm()"/-->
    <form name="logon" action="index.php" method="POST"
            style="visibility:<?='visible'; 
                       //hiden or $loginFormVisibility; ?>">
      <?php                     
      echo '<table border="0" cellspacing="1" cellpadding="2">';
      
      echo '<tr>';
      //echo '<td style="border: black thin solid; vertical-align: top; background-color: white; color: #666666;">';
      echo '<td>User/tema npr aa'.'</td>';
      echo '<td><input type="text" name="user" value=""/>'.'</td>';
      echo '</tr>';
      
      echo '<tr>'; // #FFFFCC = zuto    lightgray
      //echo '<td style="border: black thin solid; vertical-align: top; background-color: white; color: #666666;">';
      echo '<td>Password npr aa'.'</td>';
      echo '<td> <input type="password" name="userpassword" value=""/>'
        .' press ENTER key to log in or button below'
        .'</td>';
      echo '</tr>';
      
      echo '</table>';
      ?>                    
        <div class="error">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (!$logonSuccess)
                    echo "Invalid name and/or password";
            }
            ?>
        </div>
        <!--div class="createWishList"-->
        <input type="hidden" name="B2_tbl_edit" value="" />
        <input class="btn" type="submit" value="Log in and/or Edit details - WISHES"/>
        <br /><br /><a class="btn" href="B1_add.php">New tema-user (register, signup, add WISHER - master)</a>
        &nbsp; &nbsp; 
        <a class="btn" href="B1_tbl_edit.php">Tablica tema-usera (WISHERS - masters)</a> 
        <hr />        
    </form>   


<!--div class="showWishList"  visibility:hidden -->
    <!--input type="submit" name="showWishList"
           value="Show thread >>"
           onclick="javascript:showHideShowWishListForm()"/-->
    <form name="wishList" action="B2_tbl.php"
          method="GET" style="visibility:visible">
        <input type="text" name="user" value="<?= $signedin; ?>"/>
        <!--input type="hidden" name="signedin" value="" /-->
        <input class="btn" type="submit" value="Show details (list of WISHER's WISHES)" />
    </form>

    

<!--logo1,2,3,5-->
    <br />
    <img src="includes/logo1.jpg" alt="logo"/>
</div>
</div>

<script type="text/javascript" src="includes/wishlist.js"></script>
        
        
    </body>
</html>