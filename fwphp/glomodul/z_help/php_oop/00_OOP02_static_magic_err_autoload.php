
<article id="static"><h2>09 Static Properties And Methods  038_040</h2><?php displ_breadcrumbs('static');?>
<p>Static members of a class are independent of any particular object derived from that class.</p>
<p>Cre, Read static properties : see code below</p>
<p>Static properties are useful when we need a single copy of the property for all created objects. Non static properties lives in objects and static properties lives in class (ee is global).</p>
<pre>  class Student
    {
    public $name;
    private $id;
    public static $stuCount = 0;

    public function __construct( $name, $id)
    {
      <b>self::$stuCount</b> += 1;
      $this->name = $name;
      $this->id = $id;
    }


  }

//acess outside class :
echo 'Number of records=' . <b>Student::$stuCount</b>."&lt;br />"; //outputs 0

$stuObj = new Student( "name1", 1);
$stuObj = new Student( "name2", 2);
$stuObj = new Student( "name3", 3);

echo 'Number of records after 3 times: new Student( "nameId", Id); =' . Student::$stuCount; //outputs 3</pre>

<p>Like static properties, static methods are useful when we need some <b>functionality related to a class</b>, but that doesnt need to work with an actual object created from the class.</p>
<p>$this is not available inside the static method. Because $this represents the current object. So it means <b>non static properties and methods are not available inside static method</b>. Only static properties, static methods and constants are available in static methods.
</p>
<p></p>
</article>








<article id="magic"><h2>10 Magic Methods 041_047</h2><?php displ_breadcrumbs('magic');?>
<p>Are always defined inside classes, ee you cannot define them outside of classes.</p>
<p>There are 15 magic methods in php that you can define in your classes. Actually php only gives you the magic method names. It doesnt provide any implementation of these methods.</p>
<p>We cannot directly call any of these magic method like normal method of a class, ee <b>they are triggers, automatically triggered by php on different events (occasions)</b>. Eg __sleep() is called when an object is serialized. 15 magic methods in 5 groups :</p>

<ol>
<li>__construct(), __destruct() - see <a href="#constr_destr">constructor and destructor topic</a></li>
<li>__call(), __callStatic(), __get(), __set(), __isset() and  __unset() - see <a href="#overloading">overloading</a></li>
<li>__sleep() and __wakeup() - see <a href="#serialization">serialization</a></li>
<li>__clone() - see <a href="#cloning">cloning</a> object</li>

<li>__toString(), __invoke(), __set_state() and __debugInfo() - here</li>
</ol>

<h2>10.1 __toString() magic method</h2><?php displ_breadcrumbs('');?>
<p id="__toString">To set a string value for the object that will be used if the object is ever used as a string. When we use echo on any object this method is automatically called by php. Because echo treat any object as a string.</p>
<pre>  class Test
  {
    public $name;
    public function __construct($name)
    {
      $this->name= $name;
    }
    public function __toString()
    {
      return 'Name is '.$this->name ;
    }

  }

  $obj = new Test('Tim');
  echo $obj; // Displays "Name is Tim" or error if no __toString() in class</pre>



<h2>10.2 Static __set_state() magic method</h2><?php displ_breadcrumbs('');?>
<p>Most trickiest magic method called when the var_export() function is called on our object.</p>
<p>var_export() method takes two parameters. First one is variable or object, second one is an optional parameter, it should be boolean, default is false = output php code in browser.
</p>
<p>var_export() returns a parsable string representation of a variable or an object, ee it returns a string that represent a php code ee converts a variable or an object into a php code.</p>
<p>We can run that php code using PHP eval() function.</p>
<pre>  class Test
  {
    private $value1;
    private $value2;
    function __construct()
    {
      $this->value1 = 100;
      $this->value2 = "name";
    }
  }
  $testObj = new Test();
  var_export($testObj);
  //displays Test::__set_state(array( 'value1' => 100, 'value2' => 'name', ))
  //This code is calling set_state method of Test class and passing it an array of all properties and values
  //var_export($testObj, true); //returns the php code as a string instead of outputting it
  </pre>
<p>If we pass php code as a string to eval function it executes that code.</p>
<pre>  class Test
  {
    private $value1;
    private $value2;
    public function __construct()
    {
      $this->value1 = 100;
      $this->value2 = "name";
    }
    public static function __set_state(array $array) {
      // $array will be automatically given by php and it will be a key value pair of properties of current object of Test class.
      $tmp = new Test();
      $tmp->value1 = $array['value1'];
      $tmp->value2 = "my ".$array['value2'];
      echo '$tmp->value2 ='.$tmp->value2 ;
      return $tmp;
     }
  }
  $testObj = new Test();
  $strCode = var_export($testObj, true); // 111

  eval($strCode.';');</pre>
<p>111 : A fatal error that a call to undefined method of class Test if we haven't defined set_state method in our Test class.</p>
<p>What should we put in our __set_state() method? - any valid PHP code we wish.</p>
<p>Here we are creating a new test object and setting the value of its both properties just changing the second property value a little bit and then returning this object.</p>

<p>When we will call var_export function on our test object, php will prepare a string
that will be a php code and that code will be calling __set_state() method of the test class and an array of properties and their values will be passed to the method as an argument.
</p>
<p>And when this string will be passed to eval() function it will execute it and set_state function will be called which will return a new test class object.
<p>set_state method in our class is returning an object that is considered to be a valid php code.</p></p>
<p></p>
</article>




<h2>10.3 __invoke() magic method</h2><?php displ_breadcrumbs('');?>
<p>Allows us to call our object as a function. __invoke() is automatically called when we call object of our class as function.</p>
<pre>class test
  {
    public function __invoke()
    {
      echo "I can act as a function now.....";
    }
  }
  $obj = new test;
  $obj();
  var_dump(is_callable($obj));
  // displays :
  //I can act as a function now.....  and is callable
  //J:\xampp\htdocs\v_book\oop_code\__invoke3.php:11:boolean true</pre>
</p></p>



<h2>10.4 __debugInfo() magic method</h2><?php displ_breadcrumbs('');?>
<p>var_dump will print all properties and their values of an object either it is public, private or protected. We can change this behavior by defining __debuginfo() method in our class which is called by var_dump() if defined to show wht we wish.</p>
<pre>class Student
    {
    private $id;
    public $name;

    public function __construct( $id, $name)
    {
      $this->id = $id;
      $this->name = $name;
    }

    public function __debugInfo() {
        return [
        'Student Id' => $this->id * 2,
        'Address'=> 'abc'
         ];
    }
  }
  $stuObj = new Student(2, "name");
  var_dump($stuObj);
  //outputs :
  //J:\xampp\htdocs\v_book\oop_code\__debugInfo1.php:20:
  //object(Student)[1]
  //public 'Student Id' => int 4
  //public 'Address' => string 'abc' (length=3)</pre>
</p></p>










<article id="errors"><h2>11 Errors and exceptions in PHP 048_075</h2><?php displ_breadcrumbs('errors');?>
Errors are most important topic in OOP.

<p>In php 7 both errors and exceptions are <b>inherited from same throwable interface - are siblings now</b>. Earlier versions of php did not have throwable interface (root of the hierarchy was \Exception only).
</p>
<p>Error means that code could not run properly. Five basic types of errors in PHP :</p>

  <pre>  function errorHandler($errno, $errstr) {
    error_log( "This is Error message." ); 
    error_log( "This is Error message.", 1, "abc@hotmail.com", 
               "Subject: Foo\nFrom: efg@gmail.com" );
    error_log( "This is Error message.\n", 3, "c://custom_errors.log" ); 
    die();
  }

  set_error_handler("errorHandler");

  //example of Warning errors 
  //Try to open a file that doesn't exists 
  $fh = fopen('none-existing-file', 'r');</pre>

  <pre>To show errors set to be reported (error reporting configuration) -:)
$errorsActive = [ 
  //ERRNAME                SET    ERRLEVEL  SEVERITY
    E_ERROR             => FALSE,  // =1    fatal 
    E_WARNING           => TRUE,   // =2    warning
    E_PARSE             => TRUE,   // =4    parser
    E_NOTICE            => TRUE,   // =8    notice

    E_CORE_ERROR        => FALSE,  // =16   fatal 
    E_CORE_WARNING      => FALSE,  // =32   warning

    E_COMPILE_ERROR     => FALSE,  // =64   fatal 
    E_COMPILE_WARNING   => FALSE,  // =128  warning

    E_USER_ERROR        => TRUE,   // =256  fatal 
    E_USER_WARNING      => TRUE,   // =512  warning
    E_USER_NOTICE       => TRUE,   // =1024 notice

    E_STRICT            => FALSE,  // =2048 strict standards notice
    E_RECOVERABLE_ERROR => TRUE,   // =4096 fatal 

    E_DEPRECATED        => FALSE,  // =8192 warning
    E_USER_DEPRECATED   => TRUE,   //=16384 warning

    E_ALL               => FALSE,  // =8191
];

error_reporting(
    array_sum(
        array_keys($errorsActive, $search = true)
    )
);</pre>
<p>Errors BY LEVEL : 056_E_ALL_And_Error_Level_Constants. Each err level has a value.</p>



<ol>
<li>notices are non-critical errors, do not result in script termination, from the PHP interpreter. By default, these errors are not displayed, to display them, change php.ini eg display_errors=on and error_reporting=E_ALL (also log_errors=On or Off, error_log="C:\... or syslog", or own log msgs to default log file, to any file, to email - error_log() fn) .

<?php displ_breadcrumbs('');?><!--a href="#content">GoTop</a-->

<li>warnings are more severe errors. By default, these errors are displayed to the user, but they do not result in script termination.

<li>fatal errors are critical errors. These errors cause the immediate termination of the script, and PHP's default behavior is to display them to the user when they take place.

<li>parser errors or syntax errors are grammar errors in the use of the programming language.
The interpreter stops running your program when it encounters a parse error.

<li>Strict Standards Notices are not errors. These are only suggestions according to good php coding standards.PHP suggest changes to your code that will ensure the best interoperability and forward compatibility of your code.
</ol>

<img alt="" src="<?=$img_url_dir?>050_Sub_Types_Of_5Errors.jpg" onclick="window.open(this.src)">
<p>Errors BY SEVERITY : 050_Sub_Types_Of_5Errors.jpg</p>
<?php displ_breadcrumbs('');?><!--a href="#content">GoTop</a-->

<p>These Subtypes are called error levels. Each level is also represented by an integer value and an associated constant.</p>


<img alt="" src="<?=$img_url_dir?>058_When_Err_Occur_In_Life_Cycle_Of_Your_Script.jpg" onclick="window.open(this.src)">
<p>Errors BY WHEN : 058_When_Err_Occur_In_Life_Cycle_Of_Your_Script.jpg</p>

<br />
<ol>



  <h2>11.1 Notices are not errors </h2><?php displ_breadcrumbs('');?>
  <li>E_NOTICE is generated by php engine, and E_USER_NOTICE is generated by the programmer using PHP fn trigger_error().
  <pre>  //Simple example of user generated error
  $test=2;
  if ($test>1) { trigger_error("Value must be 1 or below"); }
  //examples of user generated error
  trigger_error("User generated notice.", E_USER_NOTICE);
  trigger_error("User generated Warning. ", E_USER_WARNING);
  trigger_error("User generated Dep Warning.",E_USER_DEPRECATED);
  trigger_error("User generated fatal error", E_USER_ERROR);
  </pre>
  We can set error reporting to E_NOTICE to show these type of errors to users :
  <pre>  error_reporting(E_ALL & ~E_NOTICE);
  $x = $y + 5;
  echo "\$x = \$y + 5; accessing \$y before it is declared - Script is not terminated.";</pre>

  error_reporting(E_ALL); show all errors, warnings and notices including coding standards.
  if error_reporting setting is not working from your script than you can directly change it from php.ini just open php.ini configuration file from your php folder and search for the word error_reporting and set it according to your need. When you change some configuration settings from php.ini file, then you have to stop the server and restart it the changes to work.
  <br /><br />



  <h2>11.2 Warnings</h2><?php displ_breadcrumbs('');?>
  <li>E_WARNING (most frequent err. category) is runtime warning, eg if we try to :
    <ol>
    <li>open a file that doesn't exist
    <li>divide a variable by zero
    </ol>
  <pre>  $fh = fopen('none-existing-file', 'r'); 
  $a = 10; $c = $a/0 ; 
  echo"&lt;/br>&lt;/br>By default : this text will be shown because this is a warning type error and script execution will not be stopped";</pre>

  <li>E_CORE_WARNING is like E_WARNING, except it is generated during the PHP engines startup. We cannot generate these errors from code.<br /><br />

  <li>E_COMPILE_WARNING is like E_WARNING, except it occurred while the script is compiled. It is generated by the Zend Scripting Engine.
  <br /><br />

  <li>E_USER_WARNING is user-generated warning using PHP fn trigger_error() - see later.
    <br /><br />

  <li>E_DEPRECATED is warning about code that will not work in future versions of PHPcode in the process of being replaced by newer ones. By default these warnings will not halt the remaining script, and are not shown to the user. But we can set error reporting to E_ALL to show this type of warnings to users.
    <br /><br />
  Eg in php 4 constructors have the same name as the class they are defined in. It is deprecated now. PHP 7 will emit E_DEPRECATED warning if a PHP 4 constructor is the only constructor defined within a class.
    <pre>  class TestClass {
    function TestClass() { echo "Old php 4 style constructor."; }

    //if class has both old and new constructor OLD STYLE CONSTRUCTOR IS IGNORED
    //add __construct() method to get rid of E_DEPRECATED warning
    function __construct() { echo "new style constructor."; }
  }
  echo "&lt;/br>&lt;/br> Script is not halted.";</pre>

  <br /><br />
  <li>E_USER_DEPRECATED warning is like E_DEPRECATED warning but generated by the programmer from code using the PHP function trigger_error().
  <br /><br />






  <h2>11.3 Fatal errors</h2><?php displ_breadcrumbs('');?>

  <li>E_ERROR runtime err, cant be recovered from. Script stops running immediately. We cannot generate it from code. Eg :
  <pre>  // 1. require non-existent script (E_COMPILE_ERROR compile time err)
  require 'main_page.php'; 
  // 2. instantiating object of non-existent class (E_ERROR runtime err)
  $obj = new TestClass(); 
  // 3. calling a non-existent function (E_ERROR runtime err)
  hello();
  echo "This message will never be shown."; </pre>

  <br />
  <li>
  E_CORE_ERROR is like an E_ERROR, except it is generated during the PHP engines startup. We cannot generate it from code.

  <br /><br />
  <li>
  E_COMPILE_ERROR is like an E_ERROR, except it occurred while the script is being compiled. We cannot generate it from code.
  <br /><br />
  Include statement - if the file is not available compiler dont mind it..
  <br />Require statement - if the file is not available the script is not gona compile - first PHP is giving us a warning and second fatal error is generated. Script execution is not even started.

  <br /><br />
  <li>E_USER_ERROR - see trigger_error() fn.

  <br /><br />
  <li>
  E_RECOVERABLE_ERROR is Catchable fatal error like an E_ERROR but it can be caught by a user defined error handler. See error handler. To generate this recoverable fatal error see <a href="#__toString">__toString()</a> magic method - allows you to set a string value for the object.
  <pre>  Class Test{
      //add __toString() magic method to get rid of E_RECOVERABLE_ERROR
      /*
      function __toString(){
        return "Object is a string.";
      }
      */
  }
  $objTest = new Test();
  echo (string)$objTest;</pre>
  
  if __toString() method is not implemented in a class and we try to cast its object to a string, eg echo (string)$obj or echo $obj - it will generate E_RECOVERABLE_ERROR that Object of class Test could not be converted to string.








  <h2>11.4 Parser Errors (or Syntax Errors)</h2><?php displ_breadcrumbs('');?>
  <li>E_PARSE - grammar errors in the use of the programming language. Misspelled variable and function names, Missing semicolons, Improperly matches parentheses, square brackets, and curly braces... Interpreter stops running your program when it encounters a parse error.








  <h2>11.5 Strict standard notices are not errors</h2><?php displ_breadcrumbs('');?>
  <li>E_STRICT - Suggestions according to good php coding standards to ensure the best interoperability and forward compatibility of your code. Eg we access static property non-statically (with an arrow operator ->).
  <pre>  class Test {  
    public static $hello="hello";
  }
  $obj = new Test();
  echo $obj->hello;</pre>







  <h2>11.6 User generated error</h2><?php displ_breadcrumbs('');?>
  <li><pre>  //<b>err06_01simpleTriggerError.php - user generated error</b>
  $test=2;
  if ($test>1) {
    trigger_error("Value must be 1 or below");
    //examples of user generated error
    //trigger_error("User generated notice.", E_USER_NOTICE);
    //trigger_error("User generated Warning. ", E_USER_WARNING);
    //trigger_error("User generated Dep Warning.",E_USER_DEPRECATED);
    //trigger_error("User generated fatal error", E_USER_ERROR);
  }</pre>

  <pre>  //<b>err07_01errorLog.php</b>
  function errorHandler($errno, $errstr) {
    error_log( "This is Error message." ); 
    error_log( "This is Error message.", 1, "abc@hotmail.com", 
          "Subject: Foo\nFrom: efg@gmail.com" );
    error_log( "This is Error message.\n", 3, "c://custom_errors.log" ); 
    die();
  }

  set_error_handler("errorHandler");

  //example of Warning errors 
  //Try to open a file that doesn't exists 
  $fh = fopen('none-existing-file', 'r'); </pre>


  <pre>  //<b>err08_01customErrorHandler.php</b>
  function errorHandler($errno, $errstr) {
    echo "error is $errno and error message is $errstr";
    die();
  }
  set_error_handler("errorHandler");
  $fh = fopen('none-existing-file', 'r'); </pre>


  <pre>  //<b>err09_01ExceptionSyntax.php</b>
  $file = "C:/folder/testFile.txt";
  try {
    if(!file_exists( $file)  ) {
      throw new Exception("File $file doesn't exists");
    }
    echo"If file $file exists this message will be printed.";
  }
  catch(Exception $e) {
    echo '$e->getMessage() displays : ' .$e->getMessage();
  }</pre>



  <li><pre>  //<b>err10_01stackTrace.php</b>
  function z(){ throw new exception("This is exception in fn z."); }
  function y(){ z(); }
  //function x(){ y(); } //...

  try{
    y('p1','p2'); //x();
  }catch(Exception $e){
    echo '&lt;h3>print_r($e->getTrace());  //outputs :&lt;/h3>';
    echo '&lt;pre>'; <b>print_r($e->getTrace());</b> echo '&lt;/pre>';
              // ( or var_dump($e->getTrace()) )
  }
  /*
<b>print_r($e->getTrace()); //outputs :</b>
Array
(
  [0] => Array
    (
      [file] => J:\xampp\htdocs\v_book\oop_code\err10_01stackTrace.php
      [line] => 4
      [function] => z
      [args] => Array
          (
          )

    )

  [1] => Array
    (
      [file] => J:\xampp\htdocs\v_book\oop_code\err10_01stackTrace.php
      [line] => 8
      [function] => y
     [args] => Array
          (
              [0] => p1
              [1] => p2
          )

    )
)

  */</pre>




  <li><?php displ_breadcrumbs('');?><!--a href="#content">GoTop</a-->
  <pre>  //<b>err11_01extendingExceptions.php</b>
    /*
    outputs:
    ___________________222. catch(FileException $e), $e->fileErrorMessage() displays :

    ___________________333.1 CLS::METHOD FileException::fileErrorMessage SAYS: line 7:

    <b>333.2 File error *****111. File C:/folder/NON_EXISTS.txt doesn't exists***** (SAYS: throw new FileException in try {... line 18)</b>

    ___________________~~~~~333.3 Error on line 18 in $this->getFile() J:\xampp\htdocs\v_book\oop_code\err11_01extendingExceptions.php
    */


  class FileException extends Exception {

    public function fileErrorMessage() {
    //error message
    $errorMsg='___________________333.1 CLS::METHOD '. __METHOD__ .' SAYS: line '
       . __LINE__ . ':&lt;br />&lt;br />333.2 File error ' . $this->getMessage() 
       . '&lt;/br>___________________~~~~~333.3 Error on line '.$this->getLine() 
       . ' in $this->getFile() '.$this->getFile();
    
    return $errorMsg;
    }
  }

  $file = "C:/folder/NON_EXISTS.txt";
  try {
    if ( !file_exists( $file)){
     throw new FileException("*****111. File $file doesn't exists***** (SAYS: throw new FileException in try {... line " . __LINE__ .')&lt;br />');
    }
    echo"If file exists $file, this message will be printed.";
  }

  catch(FileException $e) {
    //echo 'Message: ' .$e->fileErrorMessage();
    //echo '$e->getMessage() displays : ' .$e->getMessage();
    echo '___________________222. catch(FileException $e), $e->fileErrorMessage() displays :&lt;br />&lt;br /> '
         .$e->fileErrorMessage();
  }</pre>




  <li><pre>  //<b>err12_01multipleCatchBlocks.php</b>
    //outputs : "Message in catch1: Database problem"

    class DBException   extends Exception{ }
    class FileException extends Exception{ }

    try {
      $x = 1;
      if($x == 1){ throw new DBException("Database problem");
      }else{ throw new FileException("File system problem"); }

    }catch (DBException $exception) {
        echo "Message in catch1: {$exception->getMessage()}\n";
    
    }catch (FileException $exception) {
        echo "Message in catch2: {$exception->getMessage()}\n";
    }</pre>



</ol>
<p></p>


</article>











<article id="autoloading"><h2>12 Autoloading 076_083</h2><?php displ_breadcrumbs('autoloading');?>
<pre>// index.php
  function loader($class) {
    $filename = $class. '.php';
    $file ='classes/' . $filename;
    if (!file_exists($file)) { return false; }
    <b>include $file ;</b>
  }
  spl_autoload_register('loader');
  $prod = new Product();</pre>

<pre>// ...classes\Product.php
  class Product{
  function __construct() {
    print "In Product Class constructor&lt;/br>";
  }
}</pre>


<h3>PSR4</h3>
<pre>// index.php
  include 'Psr4Autoloader.php';

  $userObj = new  \MyProject\MyNamespace\User();
  $dbTableObj = new  \MyProject\MyNamespace\SubNS\Db_Table();
  $fWObj = new  \MyProject\MyNamespace\SubNS\File_Writer();
  $proObj = new  \MyProject\MyNamespace\SubNS\SubSubNS\Product();
  $reqObj = new  \MyProject\MyNamespace\SubNS\SubSubNS\Request();</pre>


<pre>// ...Classes\Psr4Autoloader.php
  spl_autoload_register(
  function ($class) 
  {

    // project-specific namespace prefix
    $prefix = 'MyProject\\MyNamespace\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';


    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';


    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
  }
);</pre>


<pre>  // ...Classes\src\User.php
  namespace MyProject\MyNamespace;
  class User{
    function __construct() {
       print "In User Class constructor</br>";
     }
  }</pre>



<pre>// ...src\SubNS\Db_Table.php
namespace MyProject\MyNamespace\SubNS;
class Db_Table{
  function __construct() {
       print "In Db_Table Class constructor</br>";
   }
}
</pre>



<pre>...src\SubNS\SubSubNS\Product.php
namespace MyProject\MyNamespace\SubNS\SubSubNS;
class Product{
  function __construct() {
       print "In Product Class constructor</br>";
   }
}</pre>


<p></p>
</article>
