<?php
/**
* J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\DbCrud.php
* 6.7.2016 J:\awww\www\fwphp\glomodul4\user\admin\DbCrud.php
J:\awww\www\fwphp\glomodul4\user\admin\DbCrud.php (8 hits)
* 01:  p u b l i c  __c onstruct()     $this->dbh  = n ew PDO
*
* 02:  p u b l i c  q uery($query){    $this->stmt = $this->dbh->p repare($query);
* 03:  p u b l i c  b indvalue($param, $value, $type){
*                               $this->stmt->b indValue($param, $value, $type);
* 04:  p u b l i c  e xecute(){        return $this->stmt->e xecute();
* 05:  p u b l i c  c onfirm_result(){ $this->dbh->l astInsertId();
*
* 06:  p u b l i c  f etchMultiple(){
*               $this->e xecute();
*               return $this->stmt->f etchAll(\PDO::FETCH_OBJ);  FETCH_ASSOC
* 07:  p u b l i c  f etchSingle(){    same but f etch
* 08:  p u b l i c  f etchNext(){      no e xecute, only f etch
*/
namespace B12phpfw ;
if (strnatcmp(phpversion(),'5.4.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { if(session_id() == '') { session_start(); } }

class DbCrud{
    // $db = new PDO('mysql:host=localhost;dbname=tema','root','');
    // c onnection Properties
    //Localhost Db information
        private $host       = "localhost";
        private $dbnm       = "tema"; //cus_app
        private $user       = "root";
        private $pass       = "";

        private $dbh;    //Handle our c onnection
        private $errmsg; //handle our error
        private $stmt;   //Statement Handler

    //01 method to open our c onnection
    public function __construct()
    {
        $dsn ="mysql:host=" . $this->host . "; dbname=" . $this->dbnm;
        $options = array(
            \PDO::ATTR_PERSISTENT    => true,
            \PDO::ATTR_ERRMODE       => \PDO::ERRMODE_EXCEPTION
        );

            try{
                $this->dbh  = new \PDO($dsn, $this->user, $this->pass, $options);
                //echo "Successfully Connected";
            }catch(PDOException $error){
                $this->errmsg = $error->getMessage();
                echo $this->errmsg;
            }
    }

    // 02 ***** prepare, bind, execute, check last I nsert Id *****
    public function prepareSQL($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    //03 bind method eg ':id', $id_posted, \PDO::PARAM_INT
    public function bindvalue($param, $value, $type){
         $this->stmt->bindValue($param, $value, $type);
    }
    //04 execute statement
    public function execute(){
      return $this->stmt->execute();
    }
    //05 check last I nsert Id
    public function confirm_result(){
        $this->dbh->lastInsertId();
    }


    //06    ***** fetch *****
    //fetch data in a result set in associative array
    public function fetchMultiple(){
       $this->execute();
       return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    //07 count fetched data in a result set
    public function fetchSingle(){
       $this->execute();
       return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }
    
    //08
    public function fetchNext(){
       //$this->execute();
       return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

} // e n d  c l s  D b C r u d
//$db = new DbCrud;