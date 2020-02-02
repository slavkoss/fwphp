<?php
/**
* //I N C L U D E D  only i n  i n d e x.p h p
* J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\DbCrud_module.php
*/
namespace B12phpfw ;
//session_start();
class DbCrud_module extends DbCrud{
    //public function __construct()
    //{
    //}

    public function getall($db){
      $db->prepareSQL('SELECT * FROM users'); //$Query = $ db->prepare("S ELECT * FROM users");
      return($db->fetchMultiple());
                      /* $Query->execute(); //array($email)
                         $rows = $Query->fetchAll(\PDO::FETCH_OBJ); //FETCH_ASSOC */
                //if($Query->rowCount() != 0){
                //$db_password = $r->user_pass; 
    }

    public function get_byid($db, $user_id = -1){
            //hash 32 char eg my long psw with first uppercase: f31dbc75d39b92d5c1c0fba2bb2d7584
      $db->prepareSQL('SELECT * FROM users WHERE user_id = ?');
      $db->bindvalue(1,$user_id,\PDO::PARAM_INT); //':id', $id_posted, \PDO::PARAM_INT
      return($db->fetchSingle());
                               //echo '<pre>$r='; print_r($r); echo '</pre><br />';
    }

    public function get_byemail($db, $email = ''){
      $db->prepareSQL('SELECT * FROM users WHERE user_email = ?');
      $db->bindvalue(1,$email,\PDO::PARAM_STR); //or eg ':id', $id_posted, \PDO::PARAM_INT
      return($db->fetchSingle());
    }
} // e n d  c l s  D b C r u d
//$db = new DbCrud_module;