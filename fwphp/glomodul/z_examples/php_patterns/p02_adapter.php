<?php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html

?>
<a href="https://phpenthusiast.com/blog/the-adpater-design-pattern-in-php">https://phpenthusiast.com/blog/the-adpater-design-pattern-in-php</a>

<?php
//Original class
//==================
//PayWithPayzilla class is used for paying with the Payzilla payment provider company. It adds an item with the addItem method, and adds the item`s price to the total sum to be paid with the addPrice method.

class PayWithPayZilla {
 
  function addItem($itemName)
  {
    var_dump("1 item added: " . $itemName );
  }
    
  function addPrice($itemPrice)
  {
    var_dump("1 item added to total with the price of: " . $itemPrice );
  }
}

//Customer class uses the PayWithPayZilla class in order to pay.
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
//Let`s test the code by making the customer pay for a lollipop with the price of 2. For this purpose, we inject an instance of PayWithPayzilla to the Customer class, and then use the customer`s buy method in order to pay.
$pay = new PayWithPayZilla();
$customer = new Customer($pay);
$customer -> buy("lollipop", 2);
//And the result:
//string '1 item added: lollipop' (length=22) string '1 item added to total with the price of: 2' (length=42)

//The new class a.k.a. the problem
//================================
//It is all fine and dandy, but now for some reason we need to use another payment provider. The reason might be the need to support another payment platform (Alipay vs. Paypal), or because we can no longer work with the same payment service provider. Whatever the reason may be, we face an issue that might cause us to want to re-write everything in our code that consumes the payment library. Or maybe there`s a better way?

//Take for example, the PayKal class. This code is used for another payment platform, and functions (almost) exactly like PayWithPayzilla, but the names that the developers of PayKal chose for their methods names are different, and they also added a new method that doesnt exist in the PayWithPayzilla class.


class PayKal {
  function addOneItem($name)
  {
    var_dump("1 item added: " . $name);
  }
   
  function addPriceToTotal($price)
  {
    var_dump("1 item added to total with the price of: " . $price);
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
$customer = new Customer($pay);
$customer -> buy("lollipop", 2);
/*
And the result is, not surprisingly, a fatal error:
Fatal error: Call to undefined method PayKal::addItem()

While the classes do essentially the same task, we cannot replace between the two classes because they have different names for their methods.

The adapter pattern suggests that we solve the incompatibility problem by translating the new class interface to the old class interface.

In our example, we need to translate the new PayKal class's methods to the old terminology which is used for the PayWithPayzilla class's methods names.

In order to translate the new interface to the old interface, the adapter pattern suggests writing an adapter class with the following two main features:

The adapter class needs to implement the interface of the original class.
The adapter class needs to hold a reference to the new class.
In order to write an adapter class we need the old class to have an interface, and since PayWithPayzilla doesn`t have any, we first need to extract one.
*/
//1. Extract an interface
//=======================
//As we already explained, the old class needs to have an interface, but since it doesn't have an interface let`s extract a PayZilla interface from the PayWithPayzilla class. Like the PayWithPayzilla class, the interface will have the following two methods:

interface PayZilla {
  function addItem($itemName);
   
  function addPrice($itemPrice);
}

//Now, the original PayWithPayzilla class needs to implement the PayZilla interface that we have just extracted from it.

class PayWithPayZilla implements PayZilla {
 
  function addItem($itemName)
  {
    var_dump("1 item added: " . $itemName );
  }
 
  function addPrice($itemPrice)
  {
    var_dump("1 item added to total with the price of: " . $itemPrice );
  }
}

//2. Write the adapter class
//==========================
//Now, that the old PayWithPayzilla class has an interface to implement, we can write the adapter class. Let's call the adapter class PayKalToPayZillaAdapter, and make it implement the PayZilla interface.

class PayKal2PayZillaAdapter implements PayZilla {}
//Except for implementing the interface, the adapter class needs to hold a reference to the new PayKal class. For this purpose, we'll inject the new class's object to the constructor, and hold a reference to it in the private $payObj variable.


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
//The adapter class translates the old interface to the new one by giving the methods in the adapter class the names of the old class's methods, while using the new class's methods as the methods' bodies.

//Now, the adapter class will translate the old interface to the new one by giving the methods in the adapter class the names of the old class's methods, while using the new class's methods as the methods' bodies. For example, the addItem method from the old PayWithPayzilla class, will wrap the addOneItem method from the new PayKal class.


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
}

//Let's run the code:
$payKal = new PayKal();
$pay = new PayKal2PayZillaAdapter($payKal);
$customer = new Customer($pay);
$customer -> buy("lollipop", 2);


echo '<p>03. ADAPTER PATTERN, ADAPTER CLASS TO TRANSLATE THE INTERFACE of the new class to the interface of the existing class that we are used to use. We use the adapter pattern when two classes or more do essentially the same job, but have different names for their methods.
</p>';
// have the factory create the Automobile object
$veyron = AutomobileFactory::create('Bugatti', 'Veyron');
print_r('Output (maker, model) : ' . $veyron->getMakeAndModel()); // outputs "Bugatti Veyron"


echo '<p>Benefits :</p>';
echo '<ol>
<li>methods of the adapter class, are constructed from the new class`s methods as bodies wrapped with the names of the old class`s methods. 
<li>By doing so, the adapter translates the new interface to the old interface, and so saves us the trouble of re-writing our existing code.
</ol>';


echo '<br /><br />';
include(dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/zinc/showsource.php');