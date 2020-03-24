<?php
/**
* step 3 - display user profile
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\read.php
* called from Home_ ctr cls method  r() when usr clicks link/button or any URL is entered in ibrowser  
* calls Tbl_ crud cls method rr() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*/
namespace B12phpfw ;

use Parsedown ; //in global namespace (version 1.7.4 stil has no namespace)

//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
require $pp1->wsroot_path . 'vendor/erusev/parsedown/Parsedown.php' ;
$Parsedown = new Parsedown(); //OR NO use : \Parsedown() where "\" means global namespace
          //echo $Parsedown->text('Hello _Parsedown_!'); # prints: <p>Hello <em>Parsedown</em>!</p>
          ///////// You can also parse inline markdown only:
          //echo $Parsedown->line('Hello _Parsedown_!'); # prints: Hello <em>Parsedown</em>!

$id = (int)$this->uriq->id ;
if ( null==$id ) { header("Location: index.php"); exit(0) ; }

/*
//<!-- Fetching Existing Data -->
$usrname_requested=$this->uriq->username ;
    $c_r = $this->rr("SELECT * FROM admins WHERE username=:username" 
        , [ ['placeh'=>':username', 'valph'=>$usrname_requested, 'tip'=>'str']
          ] 
    , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_

if (isset($r->username) and $r->username == $usrname_requested) {
}else {
  $_SESSION["ErrorMessage"]="Bad Request !!";
  $this->Redirect_to($pp1->filter_page."1/i/home/");
}

*/


$Tbl_crud = new Tbl_crud ;
$cursor = $Tbl_crud->rr($this, $id) ;
while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile;

$img_path = str_replace('/',DS,$pp1->module_path) .'Uploads'.DS ; //. 'post'.DS
if (file_exists($img_path . $r->aimage)) { } else {
  if (file_exists($img_path . 'avatar.jpg'))  { $r->aimage = 'avatar.jpg' ; }
}
                   //$r->aimage = 'avatar.jpg' ;
                   //echo '<pre>$tmp_img='; print_r($tmp_img); echo '</pre><br />';
                   //echo '<pre>$r->aimage='; print_r($r->aimage); echo '</pre><br />';

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



<?php
/*
?>
<div class="container">

      <div class="span10 offset1">
        <div class="row">
            <h3>Admin <?=$r->aname?>, id <?=$id?> profile</h3>
        </div>

        <div class="form-horizontal" >

          <div class="control-group">
            <label class="control-label">User name</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $r->username;?>
                </label>
            </div>
          </div>

        <div class="control-group">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $r->email;?>
                </label>
            </div>
          </div>

        <div class="control-group">
            <label class="control-label">Biography</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $Parsedown->text($r->abio);?>
                </label>
            </div>
          </div>



          <div class="form-actions">
              <a class="btn" href="index.php">Back</a>
           </div>


        </div>
    </div>

</div> <!-- /container -->
<?php
*/