<?php
/**
* I N C L U D E D  in f rm.php, a dd_photo.php, a ddress.php
*  J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\frm_func.php (4 hits)
*Line 4:   l inks(){
*Line 57:  u pdate_picture(){
*Line 90:  u ser_info(){
*Line 167: p ercentage() {
*/
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//include 'D bCrud.php';
//include 'D bCrud_module.php';

function links($db){
  //$db = new DbCrud_module; //G LOBAL $db;
  $r = $db->get_byid($db, $_SESSION['user_id_loggedin']);
     //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';

  if(empty($r->image)){
    $photo = "<img src='img/no_img.png' class='user_img'>";
    $photo_link = "<a href='index.php?add_photo'>Add Photo <i class='fa fa-pencil'></i></a>";
  }else{
    if (file_exists( __DIR__ ."/img/$r->image" )) {
      $photo = "<img src='img/$r->image' class='user_img'>";
      $photo_link = "<a href='index.php?add_photo'>Update Photo <i class='fa fa-pencil'></i></a>";
    }else {$photo = "<img src='img/no_img.png' class='user_img'>";
    $photo_link = "<a href='index.php?add_photo'>Add Photo <i class='fa fa-pencil'></i></a>";
    }
}

  if(empty($r->bio)){
        $bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fa fa-plus-circle'></i></a>";
  }else{
    $bio = "<a href='' data-target='#bio' data-toggle='modal'>Update Bio <i class='fa fa-pencil'></i></a>";
  }
  if(empty($r->address)){
    $address =  "<a href='index.php?address'>Add Address <i class='fa fa-plus-circle'></i></a>";
  } else {
    $address =  "<a href='index.php?address'>Update Address <i class='fa fa-pencil'></i></a>";
  }
  if(empty($r->facebook)){
    $facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
  } else {
    $facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Update Facebook <i class='fa fa-pencil'></i></a>";
  }
  if(empty($r->linkedin)){
    $linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
  } else {
    $linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Update Linkedin <i class='fa fa-pencil'></i></a>";
  }
?>
  <ul class='list-group'>
          <?=$photo?>
        <li class='list-group-item first-li'><?=$photo_link?></li>
         <li class='list-group-item'><a href='#' data-target='#update_password' data-toggle='modal'>Update Password <i class='fa fa-pencil'></i></a></li>
         <li class='list-group-item'><a href='#' data-target='#update_name' data-toggle='modal'>Update Name <i class='fa fa-pencil'></i></a></li>
         <li class='list-group-item'><?=$address?></li>
         <li class='list-group-item'><?=$bio?></li>
         <li class='list-group-item'><?=$facebook?></li>
         <li class='list-group-item'><?=$linkedin?></li>
  </ul>
<?php
}

function update_picture($db){
   //$db = new DbCrud_module; //G LOBAL $db;
   $user_id = $_SESSION['user_id_loggedin'];
   if(isset($_POST['picture'])){
     $img_name = $_FILES['file']['name'];
     $tmp_name = $_FILES['file']['tmp_name'];
     $store    = "img/";
     $extensions = array('png', 'PNG', 'jpg', 'jpeg');
     $split = explode(".", $img_name);
     $img_exten = $split[1];
     if(in_array($img_exten, $extensions)){
       move_uploaded_file($tmp_name, "$store/$img_name");

      $db->prepareSQL('UPDATE users SET image = ? WHERE user_id = ?'); //$Query = $ db->prepare(...
      $db->bindvalue(1,$img_name,\PDO::PARAM_STR);
      $db->bindvalue(2,$user_id,\PDO::PARAM_INT);
                //$Query->execute(array($img_name, $user_id));
                //if($Query){
       if($db->execute()){
         $_SESSION['image_success'] = "<i class='fa fa-check-circle'></i> Your image is successfully updated!";
         header("location:index.php"); //header("location:f rm.php");
       }else{
         echo "sorry query not work";
       }

     }else{
       echo "<div class='text-danger'>Invalid Image Extension!</div>";
     }

   }
}

function user_info($db)
{
  //$db = new DbCrud_module; //G LOBAL $db;
  $r = $db->get_byid($db, $_SESSION['user_id_loggedin']); //$r = get_ byid($_ SESSION['user_ id']);
              //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';

  //if(!isset($r->bio)){
  $_SESSION['user_name_loggedin'] = $r->user_name;
  $name = ucwords($r->user_name);

  if(empty($r->address)){
    $address = "<a href='index.php?address'>Add Address</a>";
  } else {
    $address = $r->address;
  }
  if(empty($r->bio)){
    $bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fa fa-plus-circle'></i></a>";
  } else {
    $bio = $r->bio;
  }
  if(empty($r->facebook)){
    $facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
  } else {
    $facebook = "<a href='$r->facebook' target='_blank'><i class='fa fa-facebook'></i> Connected</a>";
  }
  if(empty($r->linkedin)) {
    $linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
  } else {
    $linkedin = "<a href='$r->linkedin' target='_blank'><i class='fa fa-linkedin'></i> Connected</a>";
  }
?>


  <div class='row user-info'>
          <div class='col-md-3'><span>Logged in user</span></div>
          <div class='col-md-9'><?=$name . ', id=' . $_SESSION['user_id_loggedin']?></div>
  </div>
  <div class='row user-info'>
      <div class='col-md-3'><span>Address</span></div>
      <div class='col-md-9'><?=$address?></div>
  </div>
  <div class='row user-info'>
    <div class='col-md-3'><span>Biography</span></div>
    <div class='col-md-9'><?=$bio?></div>
  </div>
  <div class='row user-info'>
    <div class='col-md-3'><span>Facebook</span></div>
    <div class='col-md-9'><?=$facebook?></div>
  </div>
  <div class='row user-info'>
    <div class='col-md-3'><span>Linkedin</span></div>
    <div class='col-md-9'><?=$linkedin?></div>
  </div>
<?php
}

function percentage($db) {
  //$db = new DbCrud_module; //G LOBAL $db;
  $r = $db->get_byid($db, $_SESSION['user_id_loggedin']); 
              //echo __FILE__ .' SAYS: <pre>$r='; if (isset($r)) print_r($r); else echo 'NOT SET'; echo '</pre><br />';
  //if(!isset($r->bio)){   // 100/8 = 12.5
  if(!empty($r->user_name)){ $name = 12.5; } else { $name = 0; }
  if(!empty($r->user_email)) { $email = 12.5; } else { $email = 0; }
  if(!empty($r->user_pass)) { $password = 12.5; } else { $password = 0; }
  if(!empty($r->image)) { $image = 12.5; } else { $image = 0; }
  if(!empty($r->address)) { $address = 12.5; } else { $address = 0; }
  if(!empty($r->bio)) { $bio = 12.5; } else { $bio = 0; }
  if(!empty($r->facebook)){ $facebook = 12.5; } else { $facebook = 0; }
  if(!empty($r->linkedin)) { $linkedin = 12.5; } else { $linkedin = 0; }

  if(!empty($name) && !empty($email) && !empty($password) && !empty($image) 
       && !empty($bio) && !empty($facebook) && !empty($linkedin) && !empty($address))
  {
    echo $per = "<div class='green-per'><i class='fa fa-check-circle'></i> 100%</div>";
  } else {
        $per = $name + $email + $image + $password + $bio + $facebook + $linkedin + $address;
        $split = explode(".", $per);
        //echo "<div class='orange-per'>". $split[0]. " %</div>";
        echo "<div class='orange-per'>". $per
        . ' %</div> = 100%/8 cols : image, password, name, email (is PK), address, bio, facebook, linkedin'
        //."<br />&nbsp;"
        ;
  }

}


 ?>