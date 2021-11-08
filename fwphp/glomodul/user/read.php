<?php
/**
* step 3 - display user profile
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\read.php
* called from Home_ ctr cls method  r() when usr clicks link/button or any URL is entered in ibrowser  
* calls Tbl_ crud cls method r r() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\user ;
use B12phpfw\dbadapter\user\Tbl_crud   as Tbl_crud_admin ;

use Parsedown ; //in global namespace (version 1.7.4 stil has no namespace)

//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
require $pp1->wsroot_path . 'vendor/erusev/parsedown/Parsedown.php' ;
$Parsedown = new Parsedown(); //OR NO use : \Parsedown() where "\" means global namespace
          //echo $Parsedown->text('Hello _Parsedown_!'); # prints: <p>Hello <em>Parsedown</em>!</p>
          ///////// You can also parse inline markdown only:
          //echo $Parsedown->line('Hello _Parsedown_!'); # prints: Hello <em>Parsedown</em>!
                if ('') { 
                  echo '<h3>'. __FILE__ .' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>';
                  //echo '$_GET='; print_r($_GET);
                  //echo '$_POST='; print_r($_POST); 
                  echo 'URL query array $pp1->uriq='; print_r($pp1->uriq);
                        // $pp1->uriq=stdClass Object( [i] => u  [d] => 79 )
                  echo '</pre>';
                  exit(0);
                }
$id = (int)$pp1->uriq->id ;
//if ( null == $id ) { header("Location: index.php"); exit(0) ; }
if ( null == $id ) { $this->Redirect_to($pp1->home_usr) ; }

$rr = Tbl_crud_admin::rr_byid( $id, $other=[ 'caller' => __FILE__ .' '.', ln '. __LINE__ ] );

$img_path = str_replace('/',DS,$pp1->module_path) .'Uploads'.DS ; //. 'post'.DS
if (file_exists($img_path . $rr->aimage)) { } else {
  if (file_exists($img_path . 'avatar.jpg'))  { $rr->aimage = 'avatar.jpg' ; }
}
                   //echo '<pre>$rr->aimage='; print_r($rr->aimage); echo '</pre><br />';

?>


    <!-- H E A D E R  $_S ESSION["u sern ame"] -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">

          <h1><!--i class="fas fa-user text-success mr-2" style="color:#27aae1;"></i-->
             Profile of admin username <?=$rr->username?>
          </h1>
 
           <h3><?php echo $rr->aheadline; ?></h3>
          </div>
        </div>
      </div>
    </header>
    <!-- H E A D E R  E N D -->


    <section class="container py-2 mb-4">
      <div class="row">

        <!-- l e f t  c o l -->
        <div class="col-md-3">
          <img src="Uploads/<?=$rr->aimage?>" class="d-block img-fluid mb-3 rounded-circle" alt="">
          Admin id <?=$id?>, name :<br /><?=$rr->aname?><br />
          <br />Email Address :<br /><?php echo $rr->email;?>

          <div class="form-actions">
              <a class="btn btn-link btn-block" href="index.php">Back</a>
           </div>

        </div>

        <!-- r i g h t  c o l -->
        <div class="col-md-9" style="min-height:400px;">
          <div class="card">
            <div class="card-body">
              <p class="lead"> Biography: <?=$Parsedown->text($rr->abio)?> </p>
            </div>

          </div>
        </div>

      </div><?php //<!-- e n d  row --> ?>

    </section>



