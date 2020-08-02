<?php
namespace RefactoringGuru\Observer\Conceptual;
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html

?>
<a href="https://refactoring.guru/design-patterns/observer/php/example#example-0">https://refactoring.guru/design-patterns/observer/php/example#example-0</a>

<br /><br /><a href="https://refactoring.guru/design-patterns/observer/php/example#example-0">https://refactoring.guru/design-patterns/observer/php/example#example-0</a>

<?php
/**
 * PHP has a couple of built-in interfaces related to the Observer pattern.
 *
 * Here's what the Subject interface looks like:
 *
 * @link http://php.net/manual/en/class.splsubject.php
 *
 *     interface SplSubject
 *     {
 *         // Attach an observer to the subject.
 *         public function attach(SplObserver $observer);
 *
 *         // Detach an observer from the subject.
 *         public function detach(SplObserver $observer);
 *
 *         // Notify all observers about an event.
 *         public function notify();
 *     }
 *
 * There's also a built-in interface for Observers:
 *
 * @link http://php.net/manual/en/class.splobserver.php
 *
 *     interface SplObserver
 *     {
 *         public function update(SplSubject $subject);
 *     }
 */

/**
 * The Subject owns some important state and notifies observers when the state
 * changes.
 */
class Subject implements \SplSubject
{
    /**
     * @var int For the sake of simplicity, the Subject's state, essential to
     * all subscribers, is stored in this variable.
     */
    public $state;

    /**
     * @var \SplObjectStorage List of subscribers. In real life, the list of
     * subscribers can be stored more comprehensively (categorized by event
     * type, etc.).
     */
    private $observers;
    
    public function __construct()
    {
        $this->observers = new \SplObjectStorage;
    }

    /**
     * The subscription management methods.
     */
    public function attach(\SplObserver $observer): void
    {
        echo "<br />Subject: Attached an observer.<br />";
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.<br />";
    }

    /**
     * Trigger an update in each subscriber.
     */
    public function notify(): void
    {
        echo "Subject: Notifying observers...<br />";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Usually, the subscription logic is only a fraction of what a Subject can
     * really do. Subjects commonly hold some important business logic, that
     * triggers a notification method whenever something important is about to
     * happen (or after it).
     */
    public function someBusinessLogic(): void
    {
        echo "<br />Subject: I'm doing something important.<br />";
        $this->state = rand(0, 10);

        echo "Subject: My state has just changed to: {$this->state}<br />";
        $this->notify();
    }
}

/**
 * Concrete Observers react to the updates issued by the Subject they had been
 * attached to.
 */
class ConcreteObserverA implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if ($subject->state < 3) {
            echo "ConcreteObserverA: Reacted to the event.<br />";
        }
    }
}

class ConcreteObserverB implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if ($subject->state == 0 || $subject->state >= 2) {
            echo "ConcreteObserverB: Reacted to the event.<br />";
        }
    }
}

/**
 * The client code.
 */

$subject = new Subject;

$o1 = new ConcreteObserverA;
$subject->attach($o1);

$o2 = new ConcreteObserverB;
$subject->attach($o2);

$subject->someBusinessLogic();
$subject->someBusinessLogic();

$subject->detach($o2);

$subject->someBusinessLogic();

?>
<p>07. Observer PATTERN - is a behavioral design pattern that allows some objects to notify other objects about CHANGES IN THEIR STATE.

<p>Observer pattern provides a way to subscribe and unsubscribe to and from these events for any object that implements a SUBSCRIBER INTERFACE.

<p>Usage examples: PHP has several built-in interfaces (SplSubject, SplObserver) that can be used to make your implementations of the Observer pattern compatible with the rest of the PHP code.

<p>Identification: The pattern can be recognized by subscription methods, that store objects in a list and by calls to the update method issued to objects in that list.

<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>
</ol>

<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');