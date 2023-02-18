<?php
namespace RefactoringGuru\Strategy\Conceptual;
?>
<a href="https://refactoring.guru/design-patterns/php">https://refactoring.guru/design-patterns/php</a>

<br /><br /><a href="https://designpatternsphp.readthedocs.io/en/latest/README.html">https://designpatternsphp.readthedocs.io/en/latest/README.html</a>

<br /><br /><a href="https://phpenthusiast.com/blog/strategy-pattern-the-power-of-interface">https://phpenthusiast.com/blog/strategy-pattern-the-power-of-interface</a>
 &nbsp; <a href="https://github.com/domnikl/DesignPatternsPHP">https://github.com/domnikl/DesignPatternsPHP</a>




<br /><br />
<h2>Example 1: context cls uses multiple concrete strategies to sort array</h2>
<?php

/**
 * The Context defines the interface of interest to clients.
 */
class MySort //SortContext
{
    /**
     * @var Strategy The Context maintains a reference to one of the Strategy
     * objects. The Context does not know the concrete class of a strategy. It
     * should work with all strategies via the Strategy interface.
     */
    private $strategy;

    /**
     * Usually, the Context accepts a strategy through the constructor, but also
     * provides a setter to change it at runtime.
     */
    public function __construct(iSortStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Usually, the Context allows replacing a Strategy object at runtime.
     */
    public function setStrategy(iSortStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * The Context delegates some work to the Strategy object instead of
     * implementing multiple versions of the algorithm on its own.
     */
    public function doSomeBusinessLogic(): void
    {
        echo __METHOD__ .' SAYS : asc or desc is defined in Client call eg 
        <br /> &nbsp;  &nbsp; $contextMySort = new MySort(new ConcreteStrategyAsc);
        <br /> &nbsp;  &nbsp; echo "Client: Strategy is set to normal (ascending) sorting.";
        <br /> &nbsp;  &nbsp; $contextMySort->doSomeBusinessLogic();
        <br />';
        
        $result = $this->strategy->doAlgorithm(["a", "b", "c", "d", "e"]);
        echo implode(",", $result) . '<br />';
    }
}

/**
 * The Strategy interface declares operations common to all supported versions
 * of some algorithm.
 *
 * The Context uses this interface to call the algorithm defined by Concrete
 * Strategies.
 */
interface iSortStrategy
{
    public function doAlgorithm(array $data): array;
}

/**
 * Concrete Strategies implement the algorithm while following the base Strategy
 * interface. The interface makes them interchangeable in the Context.
 */
class ConcreteStrategyAsc implements iSortStrategy {
  public function doAlgorithm(array $data): array { sort($data); return $data; } }

class ConcreteStrategyDesc implements iSortStrategy {
  public function doAlgorithm(array $data): array { rsort($data); return $data; } }

/**
 * The client code picks a concrete strategy and passes it to the context. The
 * client should be aware of the differences between strategies in order to make
 * the right choice.
 */
$contextMySort = new MySort(new ConcreteStrategyAsc);
echo "Client: Strategy is set to normal (ascending) sorting.<br />";
$contextMySort->doSomeBusinessLogic();

echo "<br />";

echo "Client: Strategy is set to reverse (descending) sorting.<br />";
$contextMySort->setStrategy(new ConcreteStrategyDesc);
$contextMySort->doSomeBusinessLogic();
?>



<br /><br />
<h2>Example 2: context cls uses multiple concrete strategies to execute arithmetic operations</h2>


<?php
// 1. STRATEGY INTERFACE declares operations common to all
//    supported versions of some algorithm. Context cls uses this
//    interface to call algorithm defined by concrete strategies.
interface iStrategy {
    public function execute($a, $b) ;
}

// 2. CONCRETE STRATEGIES implement the algorithm while following
//    the base strategy interface. The interface makes them
//    interchangeable in the context.
class ConcreteStrategyAdd implements iStrategy {
  public function execute($a, $b) {return $a + $b ;} }

class ConcreteStrategySubtract implements iStrategy {
  public function execute($a, $b) {return $a - $b ;} }

class ConcreteStrategyMultiply implements iStrategy {
  public function execute($a, $b) {return $a * $b ;} }

class ConcreteStrategyDivide implements iStrategy {
  public function execute($a, $b) {return $a / $b ;} }


// 3. CONTEXT CLS defines the interface of interest to clients.
class CalcContext
{
    // Context cls :
    //   - Maintains a reference to one of the strategy objects
    //   - Doesn't know the concrete strategie class
    //   - It should work with all strategies via the strategy interface
    private $strategy ; //private $strategy: Strategy ;

    // Usually context accepts a strategy through the
    // constructor, and also provides a setter so that the
    // strategy can be switched at runtime.
    public function setStrategy(iStrategy $Strategy) {
      $this->strategy = $Strategy ; }

    // The context delegates some work to the strategy object
    // instead of implementing multiple versions of the algorithm on its own.
    public function executeStrategy(int $a, int $b) {
      return $this->strategy->execute($a, $b) ; }
}

// 4. CLIENT CODE picks a concrete strategy and passes it to Context cls.
//    Client should be AWARE OF DIFFERENCES between concrete strategies to choose one.
class MyCalc //ExampleApp
{
    public function __construct($action ='+', $a=10, $b=5 ) //method main() is
    {
      //Create context object :
      $contextCalc = new CalcContext ;

      switch ($action) {
        case '+': $contextCalc->setStrategy(new ConcreteStrategyAdd()) ; break;
        case '-': $contextCalc->setStrategy(new ConcreteStrategySubtract()) ; break;
        case '*': $contextCalc->setStrategy(new ConcreteStrategyMultiply()) ; break;
        case '/': $contextCalc->setStrategy(new ConcreteStrategyDivide()) ; break;
        default: echo "********* ERROR : Bad action";
      }
      $result = $contextCalc->executeStrategy($a, $b) ;
      echo "$a $action $b =" . $result;
    }
}

echo 'Client call : $client_obj = new MyCalc(\'+\',10, 5) ;'; 
echo '<br />'; $client_obj = new MyCalc('+',10, 5) ;
echo '<br />'; $client_obj = new MyCalc('-',10, 5) ;
echo '<br />'; $client_obj = new MyCalc('*',10, 5) ;
echo '<br />'; $client_obj = new MyCalc('/',10, 5) ;
?>


<br /><br />
<p>04. STRATEGY BEHAVIORAL DESIGN PATTERN - select code alternative, when we need to CHOOSE BETWEEN SIMILAR CLASSES (implement same interface) that are DIFFERENT ONLY IN THEIR IMPLEMENTATION. Good ALTERNATIVE TO INHERITANCE (instead of having an abstract class that is extended).</p>

<p>Strategy lets you define a family of algorithms, put each of them into a separate class, and make their objects interchangeable - take a class (manager called context) that does something specific in a lot of different ways and extract all of these algorithms into SEPARATE CLASSES CALLED STRATEGIES. Strategy pattern instructs us to create an INTERFACE that the classes can implement, while the CHOICE FROM WHICH OF THE CLASSES TO CREATE AN OBJECT is done during the program runtime. Context delegates the work to a linked strategy object instead of executing it on its own. This way the context (its primary job is to render a set of checkpoints on the map) becomes independent of concrete strategies, so you can add new algorithms or modify existing ones without changing the code of the context or other strategies. Context class has a method for switching the active routing strategy, so its clients, such as the BUTTONS IN THE USER INTERFACE, can replace the currently selected routing behavior with another one.</p>

<p>CLIENT CLASS is fed with the object, and performs the task that the program is meant to do.</p>


<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>Methods of the ADAPTER CLASS, are constructed from the new class`s methods as bodies wrapped with the names of the old class`s methods. 
By doing so, the adapter translates the new interface to the old interface, and so saves us the trouble of re-writing our existing code.
<li>App to enter an address and see the fastest route to that destination displayed on the map.
TRANSPORTATION STRATEGIES eg you have to get to the airport : Build car routes over roads. Walking routes. Public transport routes. Cyclists routes. City's tourist attractions routes. Each time you added a new routing algorithm, the main class of the navigator doubled in size. At some point, the beast became too hard to maintain.
</ol>



<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');