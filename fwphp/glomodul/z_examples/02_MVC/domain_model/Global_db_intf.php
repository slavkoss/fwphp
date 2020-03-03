<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Global_db_intf.php
// was DatabaseAdapterInterface.php
namespace CoreDB;

interface Global_db_intf
{
    public function connect();
    public function disconnect();
    
    public function prepareSql($sql, array $options = array());
    public function execute(array $parameters = array());
    
    //public function fetch($fetchStyle = null, 
    //    $cursorOrientation = null, $cursorOffset = null);
    //public function fetchAll($fetchStyle = null, $column = 0);
          // C R U D :
    public function cc($table, array $bind);
    public function rr($table, array $bind, $boolOperator = "AND");
    public function uu($table, array $bind, $where = "");
    public function dd($table, $where = "");
}

// step 1 basic mapping module which allow to move data between blog’s M and MySQL DB, 
//    while keeping them isolated from one other.
