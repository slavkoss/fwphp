<?php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php">https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php</a>


<?php
// General singleton class.
class Singleton {
  // Hold the class instance.
  private static $instance = null;
  
  // The constructor is private to prevent initiation with outer code.
  private function __construct()
  {
    // The expensive process (e.g.,db connection) goes here.
  }
 
  // The object is created from within the class itself
  // only if class Singleton has no instance.
  public static function getInstance()
  {
    if (self::$instance == null)
    {
      self::$instance = new Singleton();
    }
 
    return self::$instance;
  }
}

?><h4>Since we restrict the number of objects that can be created from a class to only one, both variables $objectx = Singleton::getInstance(); point to the same object :</h4><?php
$object1 = Singleton::getInstance();
echo '$object1='; var_dump($object1); echo '';

$object2 = Singleton::getInstance();
echo '<br />$object2='; var_dump($object2); echo '';




?><h4>Singleton to connect DB. DB conn $this->conn is established in private constructor.
We use public static function getInstance() that checks if self::$instance (ee conn) exists before it establishes a new one.
</h4><?php

class ConnectDb {
  // Hold the class instance.
  private static $instance = null;
  private $conn;
  
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $name = 'z_blogcms';
   
  // The expensive process (e.g.,db connection) goes here.
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->conn = new PDO(
       "mysql:host={$this->host}; dbname={$this->name}"
       , $this->user, $this->pass
       , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
    );
  }
  
  public static function getInstance()
  {
    if(!self::$instance) {
                if ('1') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>'; echo '!self::$instance' ; echo '</pre>';
                }
      self::$instance = new ConnectDb();
    }
    return self::$instance;
  }
  
  public function getConnection() { return $this->conn; }
}

//Since getInstance() checks if a conn already exists before creates a new one, it doesn't matter how many times we call getInstance(), we allways get the same connection :
$instance = ConnectDb::getInstance();
$conn     = $instance->getConnection();
?>
<ol>
  <li>$instance = ConnectDb::getInstance(); // public static function getInstance()
      <?php echo '<pre>$instance='; var_dump($instance); echo '</pre>'; //print_r($conn); ?>
  <li>$conn = $instance->getConnection();   // public function getConnection() { return $this->conn; }, where $this->conn; is assigned in private function __construct() of class ConnectDb 
      <br /><b>Output</b> of var_dump($conn); : <b>is</b> SAME CONNECTION FOR NEXT TWO INSTANCES: <?php var_dump($conn); ?>
</ol>

<?php
$instance = ConnectDb::getInstance();
$conn     = $instance->getConnection();
echo 'Same is: '; var_dump($conn);

$instance = ConnectDb::getInstance();
$conn     = $instance->getConnection();
echo '<br /><br />Same is: '; var_dump($conn);
//The result is the SAME CONNECTION FOR THE THREE INSTANCES.

$dbobj = $conn; //$conn not $instance
//$sql = "SELECT * FROM posts ORDER BY datetime desc LIMIT 1, 5";
$sql = "SELECT COUNT(*) COUNT_ROWS FROM posts";
$cursor = $dbobj->prepare($sql); //$this->dbobj->prepare($sql); 
$cursor->execute();
//$c_r = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM $tbl") ;
//while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
$row = $cursor->fetch(\PDO::FETCH_OBJ);
//$this::disconnect();
echo '<br />posts COUNT_ROWS='. $row->COUNT_ROWS ;


?>
<p>06. SINGLETON PATTERN - to restrict the number of instances that can be created from a resource_consuming class to only one. EG Some external service providers (APIs) charge money per each use. Some classes that detect mobile devices might slow down our website.
Establishing a connection with a database is time consuming and slows down our app.</p>

<p>A private constructor is used to prevent the direct creation of objects from the class.</p>

<p>The expensive process is performed within the private constructor.</p>

<p>The only way to create an instance from the class is by using a static method that creates the object only if it wasn't already created.</p>



<p>Benefits : In order to implement the code, we need to:</p>
<ol>
<li>Create an object from one of the basic classes (in our example, it is the Suv class).
<li>Pass the object that was created from the basic class as a parameter to the class that adds the first feature (i.e., the SunRoof class).
<li>Pass the object that was created from the first feature class to the second feature class, and so on until we finish adding all the optional features.
<li>Run the methods on the last object that we created in the process of decoration.
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/zinc/showsource.php');