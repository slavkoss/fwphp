<?php
// J:\awww\www\fwphp\glomodul4\blog\login_frm.php
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL :
namespace B12phpfw\module\user ;

//$u riq = $this->g etp('u riq') ;
//$pp1  = $this->pp1 ;
                if ('1') {self::jsmsg( [ //basename(__FILE__).
                   __FILE__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>';
                      //echo '$_SESSION["username"]=' . $_SESSION["username"]
                      //.'<br />'.'$username=' .  $username
                      // //.'<br />'.'$password='.isset($password)?$password:'NOT SET' 
                      // .'<br />';
                      echo '</pre>'; }
                    if ('') {self::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                       .', line '. __LINE__ .' SAYS'=>' '
                       ,'aaaaaaa'=>'bbbbbbb'
                    ] ) ; }
if(isset($_SESSION["userid"]) and $_SESSION["userid"]){ 
   utl::Redirect_to($pp1->dashboard);
} else {
                    if ('') {self::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                    .', line '. __LINE__ .' SAYS'=>' '
                       ,'$_SESSION["userid"]'=>'is not > ""'
                    ] ) ; }
}

if(!isset($_SESSION["username"])){ $_SESSION["username"] = $username = ''; }
else { $username = $_SESSION["username"] ; }

                    if ('') {self::jsmsg( [ //basename(__FILE__).
                       __METHOD__ .', line '. __LINE__ .' SAYS'=>' '
                       ,'$_SESSION["username"]'=>$_SESSION["username"]
                       ,'$username'=>$username
                       //,'$password'=>isset($password)?$password:'NOT SET'
                    ] ) ; }
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>';
                      echo '$_SESSION["username"]=' . $_SESSION["username"]
                      .'<br />'.'$username=' .  $username
                       //.'<br />'.'$password='.isset($password)?$password:'NOT SET' 
                       .'<br />';
                      echo '</pre>'; }



$title = 'Log in' ;
      require $pp1->shares_path . 'hdr.php';
?>
  <!-- NAVBAR -->
<div style="height:10px; background:#27aae1;"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="<?=$pp1->filter_page?>1/i/home/" class="navbar-brand">Home</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      </div>
    </div>
</nav>
<div style="height:10px; background:#27aae1;"></div>
<!-- NAVBAR END -->

<!-- HEADER -->
<header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>
      </div>
</header>
<!-- HEADER END -->


<!-- Main Area Start -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-sm-3 col-sm-6" style="min-height:500px;">
      <br><br><br>
          <?php
           echo (isset($_SESSION["MsgErr"])?$_SESSION["MsgErr"]:'' );
           echo (isset($_SESSION["MsgSuccess"])?$_SESSION["MsgSuccess"]:'' );
           ?>
      <div class="card bg-secondary text-light">
        <div class="card-header">
              <h4>Wellcome Back !</h4>
        </div>

        <div class="card-body bg-dark">



          <form class="" action="<?=$pp1->login?>" method="post">

            <div class="form-group">
              <label for="username"><span class="FieldInfo">USERNAME eg a or w (first add such user Tables->Admins page or in in phpMyAdmin) :</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-info"> 
                        <i class="fas fa-user"></i> </span>
                </div>
                <input type="text" class="form-control" name="username" id="username" 
                       value="<?=$username?>">
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
                       value="">
              </div>
            </div>

            <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">

          </form>




        </div><!--div class="card-body bg-dark"-->
      </div><!--div class="card bg-secondary text-light"-->
    </div><!--div class="offset-sm-3 col-sm-6" style="min-height:500px;"-->
  </div><!--div class="row"-->
</section><!--section class="container py-2 mb-4"-->
<!-- Main Area End -->
<?php  require $pp1->shares_path . 'ftr.php'; ?>