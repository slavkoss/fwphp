<?php
namespace B12phpfw ;
include 'DbCrud.php'; include 'DbCrud_module.php'; $db = new DbCrud_module;
if (isset($_POST['id'])) {$id_posted = $_POST['id'];} else {$id_posted='';}
//$_SESSION['msg'] = 'xxxxxxxxxxxxxx';
if(isset($_POST['delete_msg'])) 
{
  if (!$id_posted)
  {
      echo '<div class="alert alert-danger text-center"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sorry </strong>User ID ' . ' to d elete is not posted.</div>' ;
  } else {
             //$stmt = $ db->prepare('DELETE FROM users WHERE user_id=:id');
    $db->prepareSQL('DELETE FROM users WHERE user_id=?');
    $db->bindValue(1, $id_posted, \PDO::PARAM_INT);
    if($db->execute()){
      echo '<div class="alert alert-success text-center"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success </strong>User ID=' . $id_posted . ' erased, F5 to refresh page. </div>' ;
    }else{
      echo '<div class="alert alert-danger text-center"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sorry </strong>User ID ' . $id_posted. ' could not be erased.</div>' ;
    }
  }

} //e n d  isset($_P OST['d e l e t e _ r o w'])

        echo '<pre>'.__FILE__ .', lin='. __LINE__ .'  <b>*** '.__METHOD__ 
          .'<br />'.'called from jQuery JS so: $(".d elete_btn").on(\'click\', function(){ ...  (d elete_btn is button class) SAYS ***</b>';
          echo '<br />$_GET='; print_r($_GET) ; echo '<br />$_POST='; print_r($_POST) ; 
          echo '<br />$_SESSION='; print_r($_SESSION) ; 
        echo '</pre>'; 
                         //echo 'aaaaa bbbbbb';
    ?><SCRIPT LANGUAGE="JavaScript">
       //alert( "<?= 'aaaaaaa' ?>" ) ;
    </SCRIPT><?php
