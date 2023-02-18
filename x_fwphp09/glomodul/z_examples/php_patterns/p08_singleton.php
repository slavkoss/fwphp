<?php
namespace RefactoringGuru\Singleton\RealWorld;
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://refactoring.guru/design-patterns/singleton/php/example#example-1">https://refactoring.guru/design-patterns/singleton/php/example#example-1</a>

<br /><br /><a href="https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php">https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php</a>
<br /><br />


<br />
<h2>Example 1: with logger</h2>
<?php

/**
 * If you need to support several types of Singletons in your app, you can
 * define the basic features of the Singleton in a base class, while moving the
 * actual business logic (like logging) to subclasses.
 */
class Singleton
{
    /**
     * The actual singleton's instance almost always resides inside a static
     * field. In this case, the static field is an array, where each subclass of
     * the Singleton stores its own instance.
     */
    private static $instances = [];

    /**
     * Singleton's constructor should not be public. However, it can't be
     * private either if we want to allow subclassing.
     */
    protected function __construct() { }

    /**
     * Cloning and unserialization are not permitted for singletons.
     */
    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    /**
     * The method you use to get the Singleton's instance.
     */
    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            // Note that here we use the "static" keyword instead of the actual
            // class name. In this context, the "static" keyword means "the name
            // of the current class". That detail is important because when the
            // method is called on the subclass, we want an instance of that
            // subclass to be created here.
           
            self::$instances[$subclass] = new static;
        }
        return self::$instances[$subclass];
    }
}

/**
 * The logging class is the most known and praised use of the Singleton pattern.
 * In most cases, you need a single logging object that writes to a single log
 * file (control over shared resource). You also need a convenient way to access
 * that instance from any context of your app (global access point).
 */
class Logger extends Singleton
{
    /**
     * A file pointer resource of the log file.
     */
    private $fileHandle;

    /**
     * Since the Singleton's constructor is called only once, just a single file
     * resource is opened at all times.
     *
     * Note, for the sake of simplicity, we open the console stream instead of
     * the actual file here.
     */
    protected function __construct()
    {
        //$this->fileHandle = fopen('php://stdout', 'w');
        $this->fileHandle = fopen('p08_singleton.php_log.txt', 'w');
    }

    /**
     * Write a log entry to the opened file resource.
     */
    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    /**
     * Just a handy shortcut to reduce the amount of code needed to log messages
     * from the client code.
     */
    public static function log(string $message): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}

/**
 * Applying the Singleton pattern to the configuration storage is also a common
 * practice. Often you need to access application configurations from a lot of
 * different places of the program. Singleton gives you that comfort.
 */
class Config extends Singleton
{
    private $hashmap = [];

    public function getValue(string $key): string
    {
        return $this->hashmap[$key];
    }

    public function setValue(string $key, string $value): void
    {
        $this->hashmap[$key] = $value;
    }
}

/**
 * The client code.
 */
Logger::log("Started!");
print("<br />Started!");

// Compare values of Logger singleton.
$l1 = Logger::getInstance();
$l2 = Logger::getInstance();
if ($l1 === $l2) {
    Logger::log("Logger has a single instance.");
    print("<br />Logger has a single instance.");
} else {
    Logger::log("Loggers are different.");
    print("<br />Loggers are different.");
}

// Check how Config singleton saves data...
$config1 = Config::getInstance();

$login = "test_login";
$password = "test_password";

$config1->setValue("login", $login);
$config1->setValue("password", $password);
// ...and restores it.
$config2 = Config::getInstance();
if ($login == $config2->getValue("login") &&
    $password == $config2->getValue("password")
) {
    Logger::log("Config singleton also works fine.");
    print("<br />Config singleton also works fine.");
}

Logger::log("Finished!");
print("<br />Finished!");





?>
<br /><br />
<h2>Example 2: </h2>
<?php


// General singleton class.
class Singleton2 {
  // Hold the class instance.
  private static $instance = null;
  
  // The constructor is private to prevent initiation with outer code.
  private function __construct()
  {
    // The expensive process (e.g.,db connection) goes here.
  }
 
  // The object is created from within the class itself
  // only if class Singleto n has no instance.
  public static function getInstance()
  {
    if (self::$instance == null)
    {
      self::$instance = new Singleton2();
    }
 
    return self::$instance;
  }
}

?><h4>Since we restrict the number of objects that can be created from a class to only one, both variables $objectx = Singleton2::getInstance(); point to the same object :</h4><?php
$object1 = Singleton2::getInstance();
echo '$object1='; var_dump($object1); echo '';

$object2 = Singleton2::getInstance();
echo '<br />$object2='; var_dump($object2); echo '';




?><h4>Singleton2 to connect DB. DB conn $this->conn is established in private constructor.
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
    $this->conn = new \PDO(
       "mysql:host={$this->host}; dbname={$this->name}"
       , $this->user, $this->pass
       , array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
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
<p>08. SINGLETON PATTERN - to restrict the number of instances that can be created from a resource_consuming class to only one. EG Some external service providers (APIs) charge money per each use. Some classes that detect mobile devices might slow down our website.
Establishing a connection with a database is time consuming and slows down our app.</p>

<p>A private constructor is used to prevent the direct creation of objects from the class.</p>

<p>The expensive process is performed within the private constructor.</p>

<p>The only way to create an instance from the class is by using a static method that creates the object only if it wasn't already created.</p>


<p>Pros (benefits, advantages) and Cons</p>
<p>In order to implement the code, we need to:</p>
<ol>
<li>Create an object from one of the basic classes (in our example, it is the Suv class).
<li>Pass the object that was created from the basic class as a parameter to the class that adds the first feature (i.e., the SunRoof class).
<li>Pass the object that was created from the first feature class to the second feature class, and so on until we finish adding all the optional features.
<li>Run the methods on the last object that we created in the process of decoration.
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/vendor/b12phpfw/showsource.php');
//include($pp1->shares_path .'showsource.php');
