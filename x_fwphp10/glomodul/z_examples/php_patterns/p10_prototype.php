<?php
namespace RefactoringGuru\Prototype\Conceptual;
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://refactoring.guru/design-patterns/prototype/php/example#example-0">https://refactoring.guru/design-patterns/prototype/php/example#example-0</a>


<?php
/**
 * The example class that has cloning ability. We'll see how the values of field
 * with different types will be cloned.
 */
class Prototype
{
    public $primitive;
    public $component;
    public $circularReference;

    /**
     * PHP has built-in cloning support. You can `clone` an object without
     * defining any special methods as long as it has fields of primitive types.
     * Fields containing objects retain their references in a cloned object.
     * Therefore, in some cases, you might want to clone those referenced
     * objects as well. You can do this in a special `__clone()` method.
     */
    public function __clone()
    {
        $this->component = clone $this->component;

        // Cloning an object that has a nested object with backreference
        // requires special treatment. After the cloning is completed, the
        // nested object should point to the cloned object, instead of the
        // original object.
        $this->circularReference = clone $this->circularReference;
        $this->circularReference->prototype = $this;
    }
}

class ComponentWithBackReference
{
    public $prototype;

    /**
     * Note that the constructor won't be executed during cloning. If you have
     * complex logic inside the constructor, you may need to execute it in the
     * `__clone` method as well.
     */
    public function __construct(Prototype $prototype)
    {
        $this->prototype = $prototype;
    }
}

/**
 * The client code.
 */
function clientCode()
{
    $p1 = new Prototype;
    $p1->primitive = 245;
    $p1->component = new \DateTime;
    $p1->circularReference = new ComponentWithBackReference($p1);

    $p2 = clone $p1;
    if ($p1->primitive === $p2->primitive) {
        echo "<br /><br />Primitive field values have been carried over to a clone. Yay!<br />";
    } else {
        echo "<br /><br />Primitive field values have not been copied. Booo!<br />";
    }
    if ($p1->component === $p2->component) {
        echo "Simple component has not been cloned. Booo!<br />";
    } else {
        echo "Simple component has been cloned. Yay!<br />";
    }

    if ($p1->circularReference === $p2->circularReference) {
        echo "Component with back reference has not been cloned. Booo!<br />";
    } else {
        echo "Component with back reference has been cloned. Yay!<br />";
    }

    if ($p1->circularReference->prototype === $p2->circularReference->prototype) {
        echo "Component with back reference is linked to original object. Booo!<br />";
    } else {
        echo "Component with back reference is linked to the clone. Yay!<br />";
    }
}

clientCode();

?>

<br /><br />
<p>10. PROTOTYPE PATTERN creational design pattern that allows cloning objects, even complex ones, without coupling to their specific classes.</p>

<p>All prototype classes should have a common interface that makes it possible to copy objects even if their concrete classes are unknown. Prototype objects can produce full copies since objects of the same class can access each other's private fields.</p>

<p>Usage examples: The Prototype pattern is available in PHP out of the box. You can use the clone keyword to create an exact copy of an object. To add cloning support to a class, you need to implement a __clone method.</p>

<p>Identification: The prototype can be easily recognized by a clone or copy methods, etc.</p>

<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');