<?php
//J:\awww\www\fwphp\glomodul4\blog\read_user.php
//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
require $this->pp1->wsroot_path .'vendor/erusev/parsedown/Parsedown.php' ;
$Parsedown = new Parsedown();

//<!-- Fetching Existing Data -->
$usrname_requested=$this->uriq->username ;
    $c_r = $this->rr("SELECT * FROM admins WHERE username=:username" 
        , [ ['placeh'=>':username', 'valph'=>$usrname_requested, 'tip'=>'str']
          ] 
    , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_

$tmp_img = str_replace('/',DS,$this->pp1->module_path) . 'post'.DS.'Uploads'.DS ;
if (file_exists($tmp_img.$r->aimage)) { } else {
  if (file_exists($tmp_img.'avatar.jpg'))  { $r->aimage = 'avatar.jpg' ; }
}
                   //$r->aimage = 'avatar.jpg' ;
                   //echo '<pre>$tmp_img='; print_r($tmp_img); echo '</pre><br />';
                   //echo '<pre>$r->aimage='; print_r($r->aimage); echo '</pre><br />';

if (isset($r->username) and $r->username == $usrname_requested) {
}else {
  $_SESSION["ErrorMessage"]="Bad Request !!";
  $this->Redirect_to($this->pp1->filter_page."1/i/home/");
}






?>
    <!-- HEADER $_SESSION["username"] -->
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


<?php //require_once($this->pp1->wsroot_path.'zinc/ftr.php'); ?>

