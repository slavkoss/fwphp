<?php
namespace RefactoringGuru\Adapter\Conceptual;
?>
<a href="https://refactoring.guru/design-patterns/php">https://refactoring.guru/design-patterns/php</a>

<br /><br /><a href="https://designpatternsphp.readthedocs.io/en/latest/README.html">https://designpatternsphp.readthedocs.io/en/latest/README.html</a>

<br /><br /><a href="https://phpenthusiast.com/blog/strategy-pattern-the-power-of-interface">https://phpenthusiast.com/blog/strategy-pattern-the-power-of-interface</a>
 &nbsp; <a href="https://github.com/domnikl/DesignPatternsPHP">https://github.com/domnikl/DesignPatternsPHP</a>


<?php
/**
 * The Target defines the domain-specific interface used by the client code.
 */
class Target
{
    public function request(): string
    {
        return '<br />'. __METHOD__ .' SAYS : '. "Target: The default target's behavior.";
    }
}

/**
 * The To_be_adapted contains some useful behavior, but its interface is incompatible
 * with the existing client code. The To_be_adapted needs some adaptation before the
 * client code can use it.
 */
class To_be_adapted
{
    public function specificRequest(): string
    {
        return "ROIVAHEB LAICEPS";
    }
}

/**
 * The Adapter makes the To_be_adapted's interface compatible with the Target's
 * interface.
 */
class Adapter extends Target
{
    private $To_be_adapted;

    public function __construct(To_be_adapted $To_be_adapted)
    {
        $this->To_be_adapted = $To_be_adapted;
    }

    public function request(): string
    {
        $spec_request = $this->To_be_adapted->specificRequest() ;
        return '<br />'. __METHOD__ .' SAYS : '. "Adapter: (TRANSLATED) is :" 
           . '<br />'. __METHOD__ .' SAYS : '. strrev($spec_request)
           .'<br /><br />';
    }
}

/**
 * The client code supports all classes that follow the Target interface.
 */
function clientCode(Target $target)
{
    echo $target->request();
}

echo "<br /><br />";
echo 'Client code line '. __LINE__ .' SAYS : '; echo "I can work just fine with the Target objects:\n";
$target = new Target;
clientCode($target);
echo "<br /><br />";

$To_be_adapted = new To_be_adapted;
echo "Client code SAYS : : To_be_adapted cls has a weird interface I don't understand it:";
echo $To_be_adapted->specificRequest();
echo "<br /><br />";

echo "Client: But I can work with it via the Adapter:";
$adapter = new Adapter($To_be_adapted);
clientCode($adapter);
?>





<?php
//Original class
//==================
//PayWithPayzilla class is used for paying with the Payzilla payment provider company. It adds an item with the addItem method, and adds the item`s price to the total sum to be paid with the addPrice method.

class PayWithPayZilla_0 {
 
  function addItem($itemName)
  {
    echo '<br />'. __METHOD__ .' SAYS : '; var_dump("1 item added: " . $itemName );
  }
    
  function addPrice($itemPrice)
  {
    echo '<br />'. __METHOD__ .' SAYS : '; 
    var_dump("1 item added to total with the price of: " . $itemPrice );
  }
}

//Custome r class uses the PayWithPayZill a class in order to pay.
class Customer {
  private $pay;
   
  function __construct($pay)
  {
    $this -> pay = $pay;
  }
    
  function buy($itemName, $itemPrice)
  {
    $this -> pay -> addItem($itemName);
    $this -> pay -> addPrice($itemPrice);
  }
}
//Let`s test the code by making the custome r pay for a lollipop with the price of 2. For this purpose, we inject an instance of PayWithPayzill a to the Custome r class, and then use the custome r`s buy method in order to pay.
$pay = new PayWithPayZilla_0();
$customer = new Customer($pay);
$customer -> buy("lollipop", 2);
//And the result:
//string '1 item added: lollipop' (length=22) string '1 item added to total with the price of: 2' (length=42)

//The new class a.k.a. the problem
//================================
//It is all fine and dandy, but now for some reason we need to use another payment provider. The reason might be the need to support another payment platform (Alipay vs. Paypal), or because we can no longer work with the same payment service provider. Whatever the reason may be, we face an issue that might cause us to want to re-write everything in our code that consumes the payment library. Or maybe there`s a better way?

//Take for example, the PayKal class. This code is used for another payment platform, and functions (almost) exactly like PayWithPayzill a, but the names that the developers of PayKal chose for their methods names are different, and they also added a new method that doesnt exist in the PayWithPayzill a class.


class PayKal {
  function addOneItem($name)
  {
    echo '<br /><br />'. __METHOD__ .' SAYS : '; var_dump("1 item added: " . $name);
  }
   
  function addPriceToTotal($price)
  {
    echo '<br />'. __METHOD__ .' SAYS : '; var_dump("1 item added to total with the price of: " . $price);
  }
   
  // Unique method
  function addItemAndPrice($name,$price)
  {
    $this -> addOneItem($name);
    $this -> addPriceToTotal($price);
  }
}
//The addOneItem method adds the name of the item in the PayKal class, in the same way that addItem do for the PayZilla class. And addPriceToTotal adds the item`s price to the total, just as the addPrice does in the old class. But if we try to pass a PayKal object to the Customer class, instead of a PayZilla object, we are going to face a fatal error.

// Let's give it a try:`
$pay = new PayKal();
?>
<p>$pay = new PayKal();
<br />$customer = new Customer($pay); ---- result is, not surprisingly, a fatal error:
<br />Fatal error: Call to undefined method PayKal::addItem()

<p>While the classes do essentially the same task, we cannot replace between the two classes because they have different names for their methods.

<p>The adapter pattern suggests that we solve the incompatibility problem by translating the new class interface to the old class interface.

<p>In our example, we need to translate the new PayKal class's methods to the old terminology which is used for the PayWithPayzill a class's methods names.

<p>In order to translate the new interface to the old interface, the adapter pattern suggests writing an adapter class with the following two main features:

<p>The adapter class needs to implement the interface of the original class.
<br />The adapter class needs to hold a reference to the new class.
<br />In order to write an adapter class we need the old class to have an interface, and since PayWithPayzill a doesn`t have any, we first need to extract one.
<?php
//$customer = new Customer($pay);
//$customer -> buy("lollipop", 2);



//1. Extract an interface
//=======================
//As we already explained, the old class needs to have an interface, but since it doesn't have an interface let`s extract a PayZilla interface from the PayWithPayzill a class. Like the PayWithPayzill a class, the interface will have the following two methods:

interface PayZilla {
  function addItem($itemName);
   
  function addPrice($itemPrice);
}

//Now, the original PayWithPayzill a class needs to implement the PayZilla interface that we have just extracted from it.

class PayWithPayZilla implements PayZilla {
 
  function addItem($itemName)
  {
    echo '<br />'. __METHOD__ .' SAYS : '; var_dump("1 item added: " . $itemName );
  }
 
  function addPrice($itemPrice)
  {
    echo '<br />'. __METHOD__ .' SAYS : '; var_dump("1 item added to total with the price of: " . $itemPrice );
  }
}

//2. Write the adapter class
//==========================
//Now, that the old PayWithPayzill a class has an interface to implement, we can write the adapter class. Let's call the adapter class PayKalToPayZillaAdapter, and make it implement the PayZilla interface.

//class PayKal2PayZillaAdapter implements PayZilla {}
//Except for implementing the interface, the adapter class needs to hold a reference to the new PayKal class. For this purpose, we'll inject the new class's object to the constructor, and hold a reference to it in the private $payObj variable.

/*
// The adapter implements the original class
class PayKal2PayZillaAdapter implements PayZilla {
           
  // The adapter holds a reference to the new class.
  private $payObj;
   
  // In order to hold a reference, we need to pass the new 
  //   class's object throught the constructor.
  function __construct($payObj)
  {
    $this -> payObj = $payObj; 
  }
}
*/
//The adapter class translates the old interface to the new one by giving the methods in the adapter class the names of the old class's methods, while using the new class's methods as the methods' bodies.

//Now, the adapter class will translate the old interface to the new one by giving the methods in the adapter class the names of the old class's methods, while using the new class's methods as the methods' bodies. For example, the addItem method from the old PayWithPayzill a class, will wrap the addOneItem method from the new PayKal class.


// The adapter implements the original class
class PayKal2PayZillaAdapter implements PayZilla {
               
  // The adapter holds a reference to the new class.
  private $payObj;
     
  // In order to hold a reference, we need to pass the new
  //   class's object throught the constructor.
  function __construct($payObj)
  {
    $this -> payObj = $payObj; 
  }
     
  // The name of the methods is that of the old class.
  // The code within the methods uses the code of the new class.
  function addItem($itemName)
  {
    $this -> payObj -> addOneItem($itemName);
  }

  function addPrice($itemName)
  {
    
  }
}

//Let's run the code:
$payKal = new PayKal();
$pay = new PayKal2PayZillaAdapter($payKal);
$customer = new Customer($pay);
$customer -> buy("lollipop", 2);





?>
<p>02. ADAPTER PATTERN, ADAPTER (WRAPPER) CLASS TO TRANSLATE THE INTERFACE of the new class to the interface of the existing class that we are used to use. We use the adapter pattern when two classes or more do essentially the same job, but have different names for their methods.
</p>


<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>methods of the adapter class, are constructed from the new class`s methods as bodies wrapped with the names of the old class`s methods. 
<li>By doing so, the adapter translates the new interface to the old interface, and so saves us the trouble of re-writing our existing code.
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');