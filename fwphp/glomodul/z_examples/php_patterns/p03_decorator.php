<?php
namespace RefactoringGuru\Decorator\Conceptual;
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://refactoring.guru/design-patterns/decorator/php/example#example-0">https://refactoring.guru/design-patterns/decorator/php/example#example-0</a>

<br /><br /><a href="https://phpenthusiast.com/blog/the-decorator-design-pattern-in-php-explained">https://phpenthusiast.com/blog/the-decorator-design-pattern-in-php-explained</a>
<br /><br />
<?php

/**
 * The base Component interface defines operations that can be altered by
 * decorators.
 */
interface Component
{
    public function operation(): string;
}

/**
 * Concrete Components provide default implementations of the operations. There
 * might be several variations of these classes.
 */
class ConcreteComponent implements Component
{
    public function operation(): string
    {
        return "ConcreteComponent";
    }
}

/**
 * The base Decorator class follows the same interface as the other components.
 * The primary purpose of this class is to define the wrapping interface for all
 * concrete decorators. The default implementation of the wrapping code might
 * include a field for storing a wrapped component and the means to initialize
 * it.
 */
class Decorator implements Component
{
    /**
     * @var Component
     */
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    /**
     * The Decorator delegates all work to the wrapped component.
     */
    public function operation(): string
    {
        return $this->component->operation();
    }
}

/**
 * Concrete Decorators call the wrapped object and alter its result in some way.
 */
class ConcreteDecorator_extA extends Decorator
{
    /**
     * Decorators may call parent implementation of the operation, instead of
     * calling the wrapped object directly. This approach simplifies extension
     * of decorator classes.
     */
    public function operation(): string
    {
        return "ConcreteDecorator_extA(" . parent::operation() . ")";
    }
}

/**
 * Decorators can execute their behavior either before or after the call to a
 * wrapped object.
 */
class ConcreteDecorator_extB extends Decorator
{
    public function operation(): string
    {
        return "ConcreteDecorator_extB(" . parent::operation() . ")";
    }
}

/**
 * The client code works with all objects using the Component interface. This
 * way it can stay independent of the concrete classes of components it works
 * with.
 */
function clientCode(Component $component)
{
    // ...

    echo "RESULT: " . $component->operation();

    // ...
}

/**
 * This way the client code can support both simple components...
 */
$simple = new ConcreteComponent;
echo "Client: I've got a simple component:<br />";
clientCode($simple);
echo "<br /><br />";

/**
 * ...as well as decorated ones.
 *
 * Note how decorators can wrap not only simple components but the other
 * decorators as well.
 */
$decorator1 = new ConcreteDecorator_extA($simple);
$decorator2 = new ConcreteDecorator_extB($decorator1);
echo "Client: Now I've got a decorated component:<br />";
clientCode($decorator2);

?>
<br /><br />
<p>03. DECORATOR PATTERN - to add new optional features to our code without changing the existing classes. The new features are added by creating new classes that belong to the same type as the existing classes.</p>

<p>Auto manufacturing company uses eg Car interface to dictate to all of the implementing classes that they need to have price and description methods.</p>

<p>Problem starts when customers are given the choice to add optional features to their car, like high end wheels, a car rear spoiler, or a sun roof. We wouldn't like to change the existing classes to include optional features, so we need a better solution - decorator pattern, which instructs us to add to the basic classes that implement the interface, an abstract class eg CarFeature that also implements the same Car interface. The abstract class is used as a super-class that the features classes inherit from eg concrete class SunRoof or HighEndWheels which extends the CarFeature decorator.</p>


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
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');