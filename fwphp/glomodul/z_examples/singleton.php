<?php
//SINGLETON PATTERN with a class that establishes a database connection, 
//and restricts the number of instances to only one.
//https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php

// Singleton to connect to db.
class ConnectDb {
  //$i nstance Hold class instance - is private so it won't be changed from outside cls. It is also static so it is shared by all instances
  //How singleton generates global variable : 
  //  static variable (if not also private) can be accessed from everywhere.
  private static $instance = null;
  private $dbobj; // or $conn
  private $conn_par_obj ;
  //private $host = 'localhost';  private $user = 'db user-name';  private $pass = 'db password'; private $name = 'db name';
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->conn_par_obj = (object)[
      'db_new_instance'=>'db_new_instance' // '' or 'db_new_instance' or '1'
    , 'dbi'=>'mysql','host'=>'localhost', 'dbnm'=>'cmsakram','user'=>'root', 'pass'=>''] ;
                      ?><SCRIPT LANGUAGE="JavaScript">
                         alert( "<?php echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                              .'\\n private function !! HERE IS new PDO(...' 
                              //.'\\n $this->uriq=' 
                              //. (isset($this->uriq) ? json_encode($this->uriq) : ' not set')
                           ?>"
                         ) ;
                      </SCRIPT><?php
    $this->dbobj = new PDO("mysql:host={$this->conn_par_obj->host};
    dbname={$this->conn_par_obj->dbnm}", $this->conn_par_obj->user,$this->conn_par_obj->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  }


  public static function get_or_new_dbobj()
  {
    if(!self::$instance) { self::$instance = new ConnectDb(); }
    return self::$instance;
  }


  public function getdbobj() {
                      ?><SCRIPT LANGUAGE="JavaScript">
                         alert( "<?php echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                              .'\\n public function called after $instance = ConnectDb::get_or_new_dbobj(); (public static function) so: \\n $dbobj = $instance->getdbobj(); !! HERE IS return $this->dbobj;' 
                              //.'\\n $this->uriq=' 
                              //. (isset($this->uriq) ? json_encode($this->uriq) : ' not set')
                           ?>"
                         ) ;
                      </SCRIPT><?php
    return $this->dbobj;
  }
}


//Since we use a class that checks if a connection already exists before it establishes a new one, it DOESN'T MATTER HOW MANY TIMES WE CREATE A NEW OBJECT OUT OF THE CLASS, WE STILL GET THE SAME CONNECTION. To prove the point, let's create three instances out of the class and var dump them.

$instance = ConnectDb::get_or_new_dbobj();
$dbobj = $instance->getdbobj();
print_r($dbobj);
var_dump($dbobj);

$instance = ConnectDb::get_or_new_dbobj();
$dbobj = $instance->getdbobj();
print_r($dbobj);
var_dump($dbobj);

//The result is the same connection for the three instances.
