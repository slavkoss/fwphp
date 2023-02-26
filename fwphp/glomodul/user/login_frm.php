<?php
// J:\awww\www\fwphp\glomodul4\blog\login_frm.php
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL :
namespace B12phpfw\module\user ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;

                if ('1') {self::jsmsg( [ //basename(__FILE__).
                   __FILE__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>';
                      //echo '$_SESSION['username']=' . $_SESSION['username']
                      //.'<br />'.'$ username=' .  $ username
                      // //.'<br />'.'$password='.isset($password)?$password:'NOT SET' 
                      // .'<br />';
                      echo '</pre>'; }
                    if ('') {self::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                       .', line '. __LINE__ .' SAYS'=>' '
                       ,'aaaaaaa'=>'bbbbbbb'
                    ] ) ; }
if(isset($_SESSION['userid']) and $_SESSION['userid']){ 
   utl::Redirect_to($pp1->home); //dashboard
} else {
                    if ('') {self::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                    .', line '. __LINE__ .' SAYS'=>' '
                       ,"\$_SESSION['userid']"=>'is not > ""'
                    ] ) ; }
}

if(!isset($_SESSION['username'])){ $_SESSION['username'] = $username = ''; }
else { $username = $_SESSION['username'] ; }

                    if ('') {self::jsmsg( [ //basename(__FILE__).
                       __METHOD__ .', line '. __LINE__ .' SAYS'=>' '
                       ,"\$_SESSION['username']"=>$_SESSION['username']
                       ,'$username'=>$username
                       //,'$password'=>isset($password)?$password:'NOT SET'
                    ] ) ; }
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>';
                      echo "\$_SESSION['username']=" . $_SESSION['username']
                      .'<br />'.'$username=' .  $username
                       //.'<br />'.'$password='.isset($password)?$password:'NOT SET' 
                       .'<br />';
                      echo '</pre>'; }


?>
  <!-- NAVBAR end -->

<!-- Main Area Start -->
    <!-- Main -->
<main class="container">
  <div class="grid">

    <section>
          <?php
           echo (isset($_SESSION["MsgErr"][0])?$_SESSION["MsgErr"][0]:'' );
           echo (isset($_SESSION["MsgSuccess"][0])?$_SESSION["MsgSuccess"][0]:'' );
           ?>
      <div>
        <!--h4>Wellcome Back !</h4-->

          <form action="<?=$pp1->glomodul_url .'/'. $pp1->dir_user.'/'. QS .'i/login'?>" 
                method="post">

            <div class="form-group">
              <label for="username"><span class="FieldInfo">USERNAME eg a or w (first add user Tables->Admins page or in phpMyAdmin) :</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-info"> 
                        <i class="fas fa-user"></i> </span>
                </div>
                <input type="text" class="form-control" name="username" id="username" 
                       value="<?=$username ? $username : 'a' ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="password"><span class="FieldInfo">PASSWORD eg aaaa or wwww :</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-info"> 
                        <i class="fas fa-lock"></i> </span>
                </div>
                <input type="password" class="form-control" name="password" id="password" 
                       value="aaaa">
              </div>
            </div>

            <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">

          </form>





      </div><!--e n d  f o r m-->
    </section>


        <!--aside>

        </aside-->

  </div><!-- grid -->
</main><!-- Main -->
<!-- Main Area End -->


<?php  require $pp1->shares_path . '/ftr.php'; ?>