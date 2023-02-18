<?php
declare(strict_types=1);
//J:\awww\www\fwphp\glomodul4\blog\read_user.php
//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>'; echo '$uriq='; print_r($uriq) ; echo '</pre>'; 
                      //exit(0) ;
                      }
//<!-- Fetching Existing Data -->
    //$c_r = $this->rr("SELECT * FROM admins WHERE username=:username" 
    //    , [ ['placeh'=>':username', 'valph'=>$usrname_requested, 'tip'=>'str']
    //      ] 
    //, $other=['caller' => __FILE__ .' '.', ln '. __LINE__] ) ;
//while ($row = $this->r rnext($c_r)): {$r = $row ;} endwhile;

$cursor_admins = Tbl_crud_admin::get_cursor($sellst='*', $qrywhere= "username=:username"
    , $binds=[ ['placeh'=>':username', 'valph'=>$usrname_requested, 'tip'=>'str'] ]
    , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
$SrNo = 0;
while ( $row = Tbl_crud_admin::rrnext($cursor_admins) and isset($r->id) ): {
  $r = $row ;
} endwhile;

if (!isset($r)) {  //if ($module_ arr->dbg) {
echo '<h4>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h4>'
   .'<span style="color: violet; font-size: large; font-weight: bold;">'
       .'username '.$usrname_requested.' does not exist in admins table'
   .'</span>' ; 
exit(0) ; }



$tmp_img_dir_path = str_replace('/',DS,$pp1->module_path) . 'post'.DS.'Uploads'.DS ;
if (file_exists($tmp_img_dir_path . $r->aimage)) { } else {
  if (file_exists($tmp_img_dir_path.'avatar.jpg'))  { $r->aimage = 'avatar.jpg' ; }
}
                   //echo '<pre>$tmp_img_dir_path='; print_r($tmp_img_dir_path); echo '</pre><br />';
                   //echo '<pre>$r->aimage='; print_r($r->aimage); echo '</pre><br />';
                      if ('') {  //if ($module_ arr->dbg) {
                      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>';
                      echo '' //'$_SESSION['username']=' . $_SESSION['username']
                      .'<br />'.'$usrname_requested=' .  $usrname_requested
                      .'<br />'.'$r->aimage=' .  $r->aimage
                      ;
                      echo '<br />$r='; print_r($r) ;
                      //.'<br />'.'$password='.isset($password)?$password:'NOT SET' 
                      echo '</pre>'; 
                      //exit(0) ;
                      }
                    if ('') { self::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                               . ', line '. __LINE__ .' SAYS'=>' '
                       ,'aaaaaaa'=>'bbbbbbb'
                    ] ) ; }

if (isset($r->username) and $r->username == $usrname_requested) {
}else {
  $_SESSION["MsgErr"]="Bad Request !!";
  utl::Redirect_to($pp1->filter_page."1/i/home/");
}






?>
    <!-- HEADER $_SESSION['username'] -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          <h1><i class="fas fa-user text-success mr-2" style="color:#27aae1;"></i><?='User`s '.$r->username.' name is '.$r->aname?>
          </h1>
          <h3><?php echo $r->aheadline; ?></h3>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->
    <section class="container py-2 mb-4">
      <div class="row">
        <div class="col-md-3">
          <img src="Uploads/<?=$r->aimage?>" class="d-block img-fluid mb-3 rounded-circle" alt="">
        </div>
        <div class="col-md-9" style="min-height:400px;">
          <div class="card">
            <div class="card-body">
              <p class="lead"> Biography: <?=$Parsedown->text($r->abio)?> </p>
            </div>

          </div>

        </div>

      </div>

    </section>
