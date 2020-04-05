
<article id="intro">
<h2>02. Introduction to PHP OOP 002</h2><?php displ_breadcrumbs('intro');?>
<img alt="" src="<?=$imgrelpath?>002_properties_behavior_diagram.jpg" onclick="window.open(this.src)">
<p>002_properties_behavior_diagram.jpg Some objects are same, their behavior is exactly same, but they are slightly different in their properties (for dog: name, color, breed-pasmina). Alan Kay discovered OOP : eg dog has properties and actions described in class Dog, and "new Dog" command occupies memory for them, ee creates object (instantiates class).</p>

<p>Objects can also interact with each other (hierarhically or containment).</p>


<h3>Advantages of an OOP approach to software development</h3>
<ol>
<li><b>Easy to map our classes</b> onto real-world objects (situations) like people, things and concepts. These classes have the same properties and behaviors as the real - world concepts they represent. Purpose of each object, as well as the relationship between objects, is already clear from the real life situation.
<li>Code Reuse in other applications (Recycling).
<li>Easy to write modular code in self-contained modules
<li>Easily upgraded from smaller to larger systems
<li>lots of other OOP benefits... book can be written, 
<br />--------------------------------------------------------------------
<br />but also against OOP ! Some say: "is OOP mistake ?" OOP minuses :
<li>For navigation (url-s, links) code is same - OOP does not help - compare mnu and msg module.
<li>Lack of reusability in OOP - to get banana (some method or attribute) you get also gorilla holding banana and whole gorillas jungle (<b>all higher classes</b> with complicated dependencies). Interfaces help to get ONLY banana, but coding is complicated - I could find only strong-talk-weak-work code examples about this subject.
<li>See <a href="https://phpthewrongway.com/">https://phpthewrongway.com/</a>, or Joe Armstrong why OOP sucks <a href="http://harmful.cat-v.org/software/OO_programming/why_oo_sucks">http://harmful.cat-v.org/software/OO_programming/why_oo_sucks</a>.</li>

</ol>

<h3>Procedural language</h3>
<p>For example "C" : execution of a C program begins from the function "main()". Compiler reads these lines one by one. For example one line of code calls a function A : compiler reads lines from that function than continues reading "main()".</p>
</article>






<article id="basics"><h2>03. Basics of OOP 003_012</h2><?php displ_breadcrumbs('basics');?>

<img alt="" src="<?=$imgrelpath?>003_Basics_OOPClasses_And_Obj_different_color_kitchen_appliances.jpg" onclick="window.open(this.src)">
<p>003_Basics_OOPClasses_And_Obj_different_color_kitchen_appliances.jpg  </p>

<img alt="" src="<?=$imgrelpath?>004_1Cls_members_Prop_Meth_different_color_fabric.jpg" onclick="window.open(this.src)"><p>004_1Prop_Meth_are_Cls_members_different_color_fabric_not_Design.jpg
<br />
There may be a possibility that the design of some dress will always be the same.</p>

<p>004 Properties And Methods</p>
<p><b>Properties</b> (attributes or fields) are characteristics of a class or object.</p>
<p>005 Creating Classes And Objects In PHP</p>
<p>006 Creating And Accessing Properties
  </p>


<h3>007_Print_Whole_Obj_print_r_var_dump</h3>

<button type="button" class="collapsible">Open/Close code
 &nbsp;  
</button>
<div class="content"><!--/div--><!-- collapsible -->
<pre><b>class, new, $dressObj->color = "Black";</b>

  class Dress{  
    public $color = "red";  //color MAY BE CONSTANT SAME AS SIZE (& FABRIC if not many) (see next example)
    Public $fabric = "linen"; //fabric of the dress 
    Public $design = "Slim Fit Blazer";//design of the dress
    
    Public function displayInfo(){ 
      // echo ...
    }
  }

  $dressObj = new Dress();
  $dressObj->color = "Black";
  



<b>var_dump or print_r or displayInfo() (see next example)</b>
  

var_dump($dressObj);

J:\xampp\htdocs\v_book\oop_code\011Dress.php:34:
object(Dress)[1]
  public 'color' => string 'Black' (length=5)
  public 'fabric' => string 'linen' (length=5)
  public 'design' => string 'Slim Fit Blazer' (length=15)

print_r($dressObj);

Dress Object
(
    [color] => Black
    [fabric] => linen
    [design] => Slim Fit Blazer
)</pre>
</div><!-- collapsible -->
<p>008 Defining And Calling Methods</p>
<p>009 Accessing Object Properties From Methods</p>
<p>010 Parameters And Return Value Of Methods.mp4</p>
</article>




<article id="visibility"><h2>04. Visibility 013_014</h2><?php displ_breadcrumbs('visibility');?>

<article><img alt="" src="<?=$imgrelpath?>021_Visibility_Level_Protected_In_Inheritance.jpg" onclick="window.open(this.src)">
<p>013_Visibility_acess_cls_members_public_is_default_protected_priv</p>
</article>







<article id="class_constants"><h2>05 Class Constants 015_016 </h2><?php displ_breadcrumbs('class_constants');?>
<!--h3>015_1Class_Constants</h3-->
<p>Class constants we use to define a fixed value, eg configuration option, thats specific to some class. Eg we can define class constants to represent various sizes of dress, then we can use these constants when creating dress objects.</p>

<p>If we dont define any visibility level like public private or protected it will be public. </p>
<p>Class constant value is same for all objects of that class because <b>class constants are allocated once per class (self)</b>, before we create cls object variable with "new Clsname", and not for each class object ($this). 
Outside class we access class constant so: Clsname::CNSTNAME (double colons is scope resolution operator), inside class self::CNSTNAME instead of this which is object variable. </p>
<p>One cls (Cobol termnology: table row description) eg Tipdoc(#id, tipdoc_name...) may have more objects (concrete rows) : (1,'Order'), (2,'invoice')... <span style="color:fuchsia;"><b> 

Inside class $this refers to the current object and self refers to the class itself</span>. </b>Outside class: $Tipdocrow1=new Tipdoc, $Tipdocrow2=new Tipdoc and $Tipdocrow1->tipdoc_name...
</p>

<button type="button" class="collapsible">Open/Close code
 &nbsp;  
</button>
<div class="content"><!--/div--><!-- collapsible -->
<pre>class Dress{
    const SMALL= ", Small";   
    const MEDIUM= ", size (is const)=Medium";   
    const LARGE= ", Large";   
    public $size;   

    public $color = "red";              // The color of the dress 
    private $fabric = ", fabric=linen"; // The fabric of the dress 
    private $design = ", design=Slim Fit Blazer";//The design of the dress   

    Public function displayInfo(){ 
      echo "DRESS INFO: "; 
      echo $this->color; 
      echo $this->fabric ; 
      <b>echo $this->design; echo self::MEDIUM;</b>
    } 
    private function helloWorld($number1, $number2){ 
      return $number1 + $number2; 
    } 
  }
  
  $dressObj = new Dress();
  $dressObj->size = <b>Dress::MEDIUM</b>; 
  
  $dressObj->displayInfo(); //The info about the dress.redlinenSlim Fit Blazer
  
  echo $dressObj->fabric."&lt;br />"; //Cannot access private property Dress::$fabric
  
  $dressObj->helloWorld(); //not executed</pre>
</div><!-- collapsible -->
</article>








<article id="data_encapsulation"><h2>06 Data Encapsulation 017_018</h2><?php displ_breadcrumbs('data_encapsulation');?>
<button type="button" class="collapsible">Open/Close code
 &nbsp;  
</button>
<div class="content"><!--/div--><!-- collapsible -->
<pre>class Account   
    {    
      private $balance = 0; 
      
      public function deposit($amount){
        $this->balance += $amount;
        echo "Amount $amount is been deposited in your account, ";
        echo "new balance is ".$this->balance."&lt;br />";
      }
      
      public function getBalance(){
        return 'Balance=' . $this->balance . '<br />';
      }
      
      public function withdraw($amount){
        if($amount<= $this->balance){
          $this->balance -= $amount;
          echo "Amount $amount is withdrawn, ";
          echo "remaining balance is ".$this->balance ;
        }else{
          echo "Insufficient Balance";
        }
      }

    }   

  $accObj = new Account(); 
  echo $accObj->getBalance();
  $accObj->deposit(100);
  $accObj->withdraw(30); </pre>
</div><!-- collapsible -->

<p>017 Data_Encaps_prop_as_private_then_getter_setter_bank_account</p>
<p>Dress class contains some public properties like size and color, so the code that is outside the class, can directly access and change the values of these public properties.</p>
<p>Data encapsulation is one of the most important concept in object oriented programming.</p>
<p>It is a process of hiding the class data from outside world and only the code that is inside the class can access and change the data.</p>
<p>Using data Encapsulation we keep the data safe from outside the world.</p>
<p>HOW : mark all properties private, Provide public getters, setters for private properties.</p>


<h3>Real Benefit Of Encapsulation is to manage changes</h3>
<p>Imagine that everyone is using your class with public properties, and one day you suddenly make properties private and switch to public getters, setters to deal with properties - so you break everyones code.</p>


</article>







<article id="inheritance"><h2>07 Inheritance 019-023</h2><?php displ_breadcrumbs('inheritance');?>

Clses hierarhy BY BEHAVIOR (3 levels). See below "Interfaces " - Clses hierarhy BY CONSTRUCTION (Toy, Fan Vehicle &lt;- 4wheeler).
<ol>
<li>Vehicle cls categorie (record type)
<li>TransportationVehicle and PassengerVehicle cls subcategories (record subtype)
<li>Concrete vehicles (existing in real word)
</ol>


<p>Inheritance allows a subclass to use the properties and methods of base class. Subclass extends the base class. We tell compiler "class Car extends Vehicle" and compiler knows that everything we've defined for Vehicle class automatically applies to Car class as well. Huge benefit to the programmer is that we're saved from re-typing all of the vehicle code in our new car class.</p>

<p>Simmilar are statements: "class Home_ctr extends Config_allsites", "abstract class Config_allsites extends Db_allsites", "abstract class Db_allsites extends Dbconn_allsites" and "abstract class Dbconn_allsites"</p>



<h4>Overriding accelerate and break</h4>
<p>Bike : its accelerate and break behavior is different from car, truck, and van.</p>
<p>In our bike class we will add accelerate and break methods (will override parent class methods). When we will call overriden method on child class object, then the child class method version will be called instead of the parent (grandpa) class one.</p>




<br /><img alt="" src="<?=$imgrelpath?>029_6Abstract_and_concrete_c_2nd_level_is_abstract_without_word_abstract_as_no_domaintain_m.jpg" onclick="window.open(this.src)">
<p>029_6Abstract_and_concrete_c_2nd_level_is_abstract_without_word_abstract_as_no_domaintain_m.jpg
</p>


<button type="button" class="collapsible">Open/Close 020 Vehicle class hierarchy code
 &nbsp; <a href="#content">GoTop</a></button>
<div class="content"><!--/div--><!-- collapsible -->
<pre>//CarHireService.php
  $bikeObj = new Bike();
    $bikeObj->setNoOfWheels(2);
    $bikeObj->setColor("Black");
    $bikeObj->setFuel("Patrol");
    $bikeObj->setSpeed(0);
    $bikeObj->setPassengerSeats(2);
    $bikeObj->setSaddleHeight(2);


    $bikeObj->start();      //not in bike cls
    // ********************** overriden : !!!!!!!!!!!!!!
    $bikeObj->accelerate(); //from bike cls
    $bikeObj->brake();      //from bike cls



  $carObj = new Car();
  $vanObj = new Van();
  $truckObj = new Truck();

  $bikeObj->doMaintenance();
  $carObj->doMaintenance();
  $vanObj->doMaintenance();
  $truckObj->doMaintenance();


abstract class Vehicle
{
    private $noOfWheels;
    private $color;
    private $fuel;
    private $speed;

    abstract public function doMaintenance();

    public function getNoOfWheels(){
      return $this->noOfWheels;
    }
    public function setNoOfWheels($wheels){
      $this->noOfWheels = $wheels;
      echo __METHOD__ . ' SAYS: '."No of Wheels are ". $this->noOfWheels.'&lt;br />';
    }
    public function getColor(){
      return $this->color;
    }
    public function setColor($color){
      $this->color = $color;
      echo __METHOD__ . ' SAYS: '. "Color is ". $this->color.'&lt;br />';
    }
    public function getFuel(){
      return $this->fuel;
    }
    public function setFuel($fuel){
      $this->fuel = $fuel;
      echo __METHOD__ . ' SAYS: '. "Fuel is ". $this->fuel.'&lt;br />';
    }
    public function getSpeed(){
      return $this->speed;
    }
    public function setSpeed($speed){
      $this->speed = $speed;
      echo __METHOD__ . ' SAYS: '. "Speed is ". $this->speed.'&lt;br />';
    }
    public function start(){
      echo __METHOD__ . ' SAYS: '. "vehicle is starting...&lt;br />";
    }
    public function accelerate(){
      echo __METHOD__ . ' SAYS: '. "vehicle is accelerating...&lt;br />";
    }
    public function brake(){
      echo __METHOD__ . ' SAYS: '. "vehicle is Stoping...&lt;br />";
    }
}




  abstract class PassengerVehicle extends Vehicle{
      private $passengerSeats;

      public function getPassengerSeats(){
        return $this->passengerSeats;
      }
      public function setPassengerSeats($seats){
        return $this->passengerSeats = $seats;
        echo __METHOD__ . ' SAYS: '. "No of seats are ". $this->passengerSeats.'&lt;br />';
      }
    }

  abstract class TransportationVehicle extends Vehicle{
      private $noOfDoors;
      private $loadCapacity;

      public function getNoOfDoors (){
        return $this->noOfDoors ;
      }
      public function setNoOfDoors($doors){
        return $this->noOfDoors  = $doors;
      }
      public function getLoadCapacity (){
        return $this->loadCapacity ;
      }
      public function setLoadCapacity($loadCapacity){
        return $this->loadCapacity  = $loadCapacity;
      }
    }





  class Bike extends PassengerVehicle{
    private $saddleHeight;

    public function getSaddleHeight(){
      return $this->saddleHeight ;
    }
    public function setSaddleHeight($saddleHeight){
      return $this->saddleHeight  = $saddleHeight;
    }

      public function accelerate(){
        echo __METHOD__ . ' SAYS: '. "Bike is accelerating...".'&lt;br />';
      }

      public function brake(){
        parent::brake();
        echo __METHOD__ . ' SAYS: '. "Bike is Stoping...".'&lt;br />';
      }

    public function doMaintenance(){
      echo __METHOD__ . ' SAYS: '. "Bike Maintenance.&lt;br />";
    }
  }

  class Car extends PassengerVehicle{
    private $noOfDoors;
    public function getNoOfDoors(){
      return $this->noOfDoors ;
    }
    public function setNoOfDoors($noOfDoors){
      return $this->noOfDoors  = $noOfDoors;
      echo __METHOD__ . ' SAYS: '. __METHOD__ . ' SAYS: '."No of Doors are ". $this->noOfDoors.'&lt;br />';
    }
    public function doMaintenance(){
      echo __METHOD__ . ' SAYS: '. "Car Maintenance.&lt;br />";
    }
  }
  class Van extends TransportationVehicle{
    private $noOfBoxes;
    public function getNoOfBoxes(){
      return $this->noOfBoxes ;
    }
    public function setNoOfBoxes($noOfBoxes){
      return $this->noOfBoxes  = $noOfBoxes;
    }

    public function doMaintenance(){
      echo __METHOD__ . ' SAYS: '. "Van Maintenance.&lt;br />";
    }
  }

  class Truck extends TransportationVehicle{
    private $sizeOfContainer;
    public function getSizeOfContainer(){
      return $this->sizeOfContainer ;
    }
    public function setSizeOfContainer($sizeOfContainer){
      return $this->sizeOfContainer  = $sizeOfContainer;
    }

    public function doMaintenance(){
      echo __METHOD__ . ' SAYS: '. "Truck Maintenance.&lt;br />";
    }
  }</pre>
<?php displ_breadcrumbs('');?><!--a href="#content">GoTop</a-->
</div><!-- collapsible -->
</article>





<article>
<p>022_Rel_subcls_supercls_ISA_HIERARCHY_Vs_HASA_CONTAIN <a href="#content">GoTop</a></p>

<p>When one class "extends" another class we can say that the first class ISA (is a) second class. Orange is a citrus fruit, saving account is an account, square is a shape, lion is an animal, car ISA vehicle.
</p>

<p>If <b>"is a" relationship does not exist</b> between a subclass and superclass, we should not use inheritance.</p>

<p>A car is a vehicle. So it is okay to write a car class that is a subclass of a Vehicle class. Anywhere that a vehicle can be used, a car can be used. IF YOU CAN "DRIVE" (OR "STOP") A VEHICLE, THEN YOU CAN "DRIVE" A CAR.
</p>
<p>This is not true in reverse (subclass actions may not be valid for superclass or other subclasses) ! Eg you can drive a car on the highway, but CAN NOT DRIVE ANY VEHICLE ON THE HIGHWAY.</p>

<?php displ_breadcrumbs('');?><!--a href="#content">GoTop</a-->

<h3>When to use CLSES HIERARCHY (ISA, "inherit")
<br />and when to use cls member variable (HASA, COMPOSITION, CONTAIN)</h3>

<p>It is one of the key issues in Inheritance. Eg should a 2-door honda or 4 door honda be a separate (child) classes from a honda class ? Or should the number of doors be a property of Honda class ? In this case, we say : honda HAS 2 or 4 doors. Here HAS A RELATIONSHIP makes more sense, so the number of doors should be a property of the honda class, not as a special sub-class.</p>

<p>Another example is kitchen has a sink relationship. It would not make sense to say a kitchen is a sink or that a sink is a kitchen. Inheritance is not gona work here. So here SINK IS PROPERTY IN KITCHEN CLASS AND CAN BE A CLASS BECAUSE IT HAS SOME PROPERTIES AND METHODS. So here this has a relationship indicates composition. It means an object contains another object. A kitchen object contains a sink object. So, we will use composition here rather than inheritance.</p>
<p></p>


</article>







<article id="overriding"><h2>07.1 Overriding parent classs method with same named child class method 024_026</h2><?php displ_breadcrumbs('overriding');?>

<p>See <a href="#inheritance">07 Inheritance</a> (ISA relation subclass - superclass).
  </p>
</article>








<article id="final_keyword"><h2>07.2 Final keyword (PHP 5) 027_028</h2><?php displ_breadcrumbs('final_keyword');?>
<p>027_1Final_Classes_And_Methods_block_cls_inher_and_m_overr</p>
<p>Blocking classs Inheritance and method Overrides with Final Classes and Methods  - to behave the same way. PHP 5 introduces final keyword, if class is defined final then it cannot be extended and if a method is defined final then child classes cannot override that method.</p>
<pre>
  final class A{
    final public function test(){
      echo "Class A test method.&lt;br />";
    }
  }
  //fatal error that Class B may not inherit from final class A
  class B extends A{
    public function test(){
      //fatal error that we cannot override final method of class A 
      //   (if A is not final and A.test() is final)
      echo "Class B test method.&lt;br />";
    }
  }
</pre>


</article>









<article id="abstract"><h2>07.3 Abstract classes and methods 029_030</h2><?php displ_breadcrumbs('abstract');?>
<p>See <a href="#inheritance">07 Inheritance</a> (ISA relation subclass - superclass).
  </p>

<h4>Abstract classes and methods</h4>
<p>Abstract painting represent something that physically doesnt exists, that exists in thought, doesnt represent a person, a place or a thing in a real world.</p>

<ol>
<li>An abstract class has no use, unless it is extended. It is for inheritance to avoid code redundancy, not to create object ! Abstract eg vehicle object or transportation vehicle or passenger vehicle is something you can't understand clearly, is it van or truck or car or bike or... ? So it doesnt make any sense to create an object of a vehicle class or other two vehicle record types classess.

<li><p>Abstract domaintain method with no body - <b>child class must implement it</b>.

<li>You cant have abstract method in a non-abstract class, ee if you declare an abstract method in a class, you must declare the class abstract as well
<li>If a class is not having any abstract method even then it can be marked as abstract.
<li>Abstract class can have non-abstract method (concrete) as well
</ol>
</article>











<article id="interfaces"><h2>07.4 Interfaces 031_033</h2><?php displ_breadcrumbs('interfaces');?>
<pre>  interface TestInterface{
    public function helloWorld();
    
  }
  class TestClass implements TestInterface{
    public function helloWorld(){
      echo "This is method implementation. Metod's description (contract how MUST be used) is in interface description.";
    }
  }
  
  $o1 = new TestClass;
  $o1->helloWorld();</pre>
<p>031 What is interface  </p>

<ol>
<li>For example, testinterface has one method helloworld(). If testclass implements this testinterface then it has to <b>define all interface methods</b> ee here helloworld() method. So interface commands us what method names and parameters we must have.</li>

<li>An interface is similar to an abstract class, that allows you to declare zero or more methods without providing the implementation of those methods. Abstract methods may have implementation (fn body), interfaces may not !</li>

<li>PHP is a single parent language - parent-child relationship is such : class is half-orphan, can have ONLY ONE PARENT class, ee CLASS CANNOT EXTEND TWO CLASSESS !
This relationship doesn't exist with interfaces.
</li>

<li>At the same time, class can extend another class and implement an interface.</li>
<li>Interfaces lie outside the inheritance hierarchy ee classes from totally different inheritance hierarchies can implement the same interface.</li>
<li>So interface is a way of <b>communicating between two unlike objects</b>. If two classes are completely unrelated, and they need some similar behaviour we can use an interface.</li>
</ol>
</article>


<article>
<p>For example here we have three very different cls inheritance hierarchies :</p>
<ol>
<li>Toy is a parent class and its child classes are "stuff toys", "electric car toys" and "water toy".
<li>in Fan cls inheritance tree "fan" is the parent class and "ceiling fan", "pedestal fan" and portable fan are its child classes and 
<li>in Vehicle cls hierarchy child classes are "2 wheeler" "4 wheeler" and childs
</ol>
Portable fan, electric toy car and electric car are from different inheritance hierarchies, and their parents are different. But there is one common thing in all of them. "They are chargeable", they use batteries, which need electric charging. <b>All "electric" classes need charge() method which is in chargeable interface :</b>

<img alt="" src="<?=$imgrelpath?>031_Interfaces_common_method_for_different_cls_hier.jpg" onclick="window.open(this.src)">
<p>031_Interfaces_common_method_for_different_cls_hier.jpg</p>
<p>We create a chargeable interface with the method charge().</p>
<p>Now all three classes implement chargeable interface. Just like abstract methods of abstract classes, we can declare method in interface with no implementation.</p>

</article>








<article id="constr_destr"><h2>08 Constructor and Destructor 034_037</h2><?php displ_breadcrumbs('constr_destr');?>
<ul>
<li>PHP7
<li>PHP5.6
<li>PHP5.5
<li>PHP5.3
<li>PHP5.1
<li>PHP5.0 Constructor and Destructor
<li>PHP4
<li>PHP/FI
</ul>

<p>When we say new on a class to create its object its constructor magic method __construct() is called (automatic trigerring) if we have defined any in that class. Why :</p>
<ol>
<li>to set initial values of some properties
<li>to fetch some information from a database to populate the object
<li>to register the object in some way
</ol>
<p>Destructor magic method __destruct() is called just before an object dies. Why :</p>
<ol>
<li>closing any related open files and database connections
<li>unsetting other related objects
</ol>
<p>Unlike a constructor, a destructor cant accept arguments.</p>

<button type="button" class="collapsible">Open/Close code &nbsp; <a href="#content">GoTop</a>
</button>
<div class="content"><!--/div--><!-- collapsible -->
<pre>class A 
  { 
    function __construct()  
    { 
      echo "This is output from 'new classname;', meaning : I am a newborn object. &lt;br /> ";  
    }  
  } 
 $obj = new A;</pre>
<pre>class Student 
    {  
    public $name;  

    public function __construct( $name)  
    { 
      $this->name = $name;   
    }  
    public function __destruct(){
      echo "I am dying...AAAAAAAAA.....";
    }
 
  }  
 
$stuObj = new Student( "Tim");  

unset($stuObj);</pre>

<pre>  class Student 
    {  
    private $firstName;  
    private $lastName; 
    private $age; 
    
    public function __construct( $fName, $lName, $age)  
    { 
      $this->firstName = $fName;   
      $this->lastName = $lName;   
      $this->age = $age;   
    }  
    
    public function showDetails()  
    { 
      echo $this->firstName."&lt;br />";   
      echo $this->lastName."&lt;br />";   
      echo $this->age."&lt;br />";   
    }  
  }  
 
  $stuObj = new Student('$fName', '$lName', '$age');  
  $stuObj->showDetails();</pre>
</div><!-- collapsible -->
  <pre>class A{
   public function __construct(){
    echo "Class A Constructor.&lt;br />";
   }
  }
  class B extends A{
    public function __construct(){
      parent::__construct();
      echo "Class B Constructor.&lt;br />";
    }
  }
  
  $objB = new B();</pre>
<p></p>
</article>

<!-- 2*********************************** -->
