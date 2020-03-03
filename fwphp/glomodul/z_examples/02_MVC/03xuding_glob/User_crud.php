<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\User_db.php
//see J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\User_db.php  was UserMapper.php

namespace B12phpfw ; //ModelMapper
//use Model\UserInterface,
//    Model\User ;

class User_crud //extends AbstractDataMapper implements User_db_intf
{
  protected $tbl = "admins";

  public function rr_all($db) {
    $cursor = $db->rr("SELECT * FROM $this->tbl ORDER BY username"
       , [], __FILE__ .' '.', ln '. __LINE__ ) ;
    return $cursor ;
  }


  //public function cc(UserInterface $user) {
  public function cc($db, $vv) {
    //  1. c r e  r o w   
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "username,email" ;
    $qrywhat = "VALUES(:username,:email)" ;
    $binds = [
      ['placeh'=>':username', 'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':email',    'valph'=>$vv[1], 'tip'=>'str']
    ] ;
    $cursor = $db->cc($db, $this->tbl, $flds, $qrywhat, $binds);

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !"; }
    //$db->Redirect_to($db->pp1->admins);

    // 2. g e t  i d
    $c_r = $db->rr("SELECT max(id) id FROM $this->tbl" 
        , [] //[ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int'] ]
        , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $db->rrnext($c_r)): {$r = $row ;} endwhile; 

    $db::disconnect();

    return $r->id;
  }

  /*
  public function dd($id) {
      if ($id instanceof UserInterface) {
          $id = $id->id;
      }

      return $this->globdb_obj->dd($this->entityTable,
          array("id = $id"));
  }

  protected function newrow_obj(array $row) {
      return new User($row["name"], $row["email"]);
  } 
  */

}
