<?php
/**
* step 4 (pre) CRUD class
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Admin_crud.php
*    or User_db.php, or UserMapper.php
* called from view CRUD scripts c reate.php, r ead.php... 
*    when usr clicks link/button or any (CRUD) URL is entered in ibrowser  
* calls Db_ allsites method cc() (=on-insert tbl-row), rr()...
*
* Admin_ crud separates CRUD code skeleton (B12phpfw) from data source (DB or web service or...).
* Admin_ crud is ORM (TBL ADAPTER) CLASS. When instantiated it is DM object of row in memory
*    Where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
* Admin_ crud maps (adapts) model of tbl row in memory to tbl row in DM data source (DB, web service...)
* Admin_ crud is used to move data to/from data source.
*
* REASON WHY EACH DB TBL SHOULD HAVE DM CLASS NAMED EG TblNAME_crud :
* CRUD code should be separated from C and V code ee should be in TblNAME_crud.
* TblNAME_crud is FAT MODEL - When business logic is complicated here is lot of code
* - most importand module code (can not be in global model cls) !!
* C and V are tiny. HTML in V is eg one of bootstrap templates - PHP CRUD code in it is tiny,
* only calls TblNAME_crud methods.
*
* So this example is not MVC, it is DMVC
*
* Domain Model definition 
* =======================
* 1. System of abstractions that describes selected aspects of a sphere of knowledge,
*    influence or activity (a domain). DM can be used to solve problems related to domain.
* 
* 2. An object model of the domain that incorporates both behavior and data.
*    Creates a web of interconnected objects, where each object represents some
*    meaningful individual, whether as large as a corporation or as small as a 
*    single line on an order form.
*/

namespace B12phpfw ; //ModelMapper
//use Model\UserInterface,
//    Model\User ;

class Admin_crud //extends AbstractDataMapper implements User_db_intf
{
  protected $tbl = "admins";

  // pre-query
  public function rr_all($db) {
    // open cursor (execute-query loop is in view script)
    $cursor = $db->rr("SELECT * FROM $this->tbl ORDER BY username", [], __FILE__ .', ln '. __LINE__ ) ;
    $db::disconnect();
    return $cursor ;
  }

  // pre-query
  public function rr($db, $id) {
    // open cursor (execute-query loop is in view script)
    $cursor = $db->rr("SELECT * FROM admins WHERE id=:AdminId"
        , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
          ] , __FILE__ .' '.', ln '. __LINE__) ;
    //while ($row = $db->rrnext($cursor)): {$r = $row ;} endwhile;
    $db::disconnect();
    return $cursor ;
  }

  // on-insert
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

  // on-update
  public function uu($db, $vv) {
    //  1. u p d  r o w   
    $flds     = "SET aname=:AName, email=:Aemail, abio=:abio" ;
    $qrywhere = "WHERE id=:AdminId" ;
    $binds = [
      ['placeh'=>':AName',  'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':Aemail', 'valph'=>$vv[1], 'tip'=>'str']
     ,['placeh'=>':AdminId','valph'=>$vv[2], 'tip'=>'int']
     ,['placeh'=>':abio',   'valph'=>$vv[3], 'tip'=>'str']
    ] ;
    $cursor = $db->uu($db, $this->tbl, $flds, $qrywhere, $binds);
    $db::disconnect();
    //header("Location: index.php");
    return null ;
  }


  //public function dd($id) {  } //no need, 
  //dd is jsmsgyn dialog in home.php + call dd() in Home_ctr d() method


}
