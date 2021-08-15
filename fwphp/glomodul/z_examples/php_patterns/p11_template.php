<?php
namespace RefactoringGuru\TemplateMethod\Conceptual;
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html

?>
<a href="http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/p11_template.php">http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/p11_template.php</a>

<br /><br /><a href="https://phpenthusiast.com/blog/the-template-pattern-the-power-of-abstraction">https://phpenthusiast.com/blog/the-template-pattern-the-power-of-abstraction</a>

<?php
/**
 * The Abstract Class defines a template method that contains a skeleton of some
 * algorithm, composed of calls to (usually) abstract primitive operations.
 *
 * Concrete subclasses should implement these operations, but leave the template
 * method itself intact.
 */
abstract class AbstractClass
{
    /**
     * The template method defines the skeleton of an algorithm.
     */
    final public function templateMethod(): void
    {
        $this->baseOperation1();
        $this->requiredOperations1();
        $this->baseOperation2();
        $this->hook1();
        $this->requiredOperation2();
        $this->baseOperation3();
        $this->hook2();
    }

    /**
     * These operations already have implementations.
     */
    protected function baseOperation1(): void
    {
        echo "AbstractClass says: I am doing the bulk of the work<br />";
    }

    protected function baseOperation2(): void
    {
        echo "AbstractClass says: But I let subclasses override some operations<br />";
    }

    protected function baseOperation3(): void
    {
        echo "AbstractClass says: But I am doing the bulk of the work anyway<br />";
    }

    /**
     * These operations have to be implemented in subclasses.
     */
    abstract protected function requiredOperations1(): void;

    abstract protected function requiredOperation2(): void;

    /**
     * These are "hooks." Subclasses may override them, but it's not mandatory
     * since the hooks already have default (but empty) implementation. Hooks
     * provide additional extension points in some crucial places of the
     * algorithm.
     */
    protected function hook1(): void { }

    protected function hook2(): void { }
}

/**
 * Concrete classes have to implement all abstract operations of the base class.
 * They can also override some operations with a default implementation.
 */
class ConcreteClass1 extends AbstractClass
{
    protected function requiredOperations1(): void
    {
        echo "ConcreteClass1 says: Implemented Operation1<br />";
    }

    protected function requiredOperation2(): void
    {
        echo "ConcreteClass1 says: Implemented Operation2<br />";
    }
}

/**
 * Usually, concrete classes override only a fraction of base class' operations.
 */
class ConcreteClass2 extends AbstractClass
{
    protected function requiredOperations1(): void
    {
        echo "ConcreteClass2 says: Implemented Operation1<br />";
    }

    protected function requiredOperation2(): void
    {
        echo "ConcreteClass2 says: Implemented Operation2<br />";
    }

    protected function hook1(): void
    {
        echo "ConcreteClass2 says: Overridden Hook1<br />";
    }
}

/**
 * The client code calls the template method to execute the algorithm. Client
 * code does not have to know the concrete class of an object it works with, as
 * long as it works with objects through the interface of their base class.
 */
function clientCode(AbstractClass $class)
{
    // ...
    $class->templateMethod();
    // ...
}

echo "<br /><br />Same client code can work with different subclasses:<br />";
clientCode(new ConcreteClass1);
echo "<br />";

echo "<br />Same client code can work with different subclasses:<br />";
clientCode(new ConcreteClass2);

?>
<br /><br />
<p>11. TEMPLATE PATTERN is a behavioral design pattern that allows you to defines a skeleton of an algorithm in a base class and let subclasses override the steps without changing the overall algorithm's structure.</p>

<p>Usage examples: The Template Method pattern is quite common in PHP frameworks. The pattern simplifies the extension of a default framework's behavior using the class inheritance.</p>

<p>Identification: Template Method can be recognized by behavioral methods that already have a "default" behavior defined by the base class.</p>


<p>Pros (benefits, advantages) and Cons</p>
<p>Structure of the Template Method</p>
<ol>
<li>What classes does it consist of?
<li>What roles do these classes play?
<li>In what way the elements of the pattern are related?
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');