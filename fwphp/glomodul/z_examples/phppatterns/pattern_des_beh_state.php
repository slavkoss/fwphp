<?php
// https://refactoring.guru/design-patterns/state/php/example
// state pattern purpose :
//Encapsulate varying behavior for the same routine based on an object's state. This can be a cleaner way for an object to change its behavior at runtime without resorting to large monolithic conditional statements.

declare(strict_types=1);

namespace PattDesBeh\State ; // DesignPatterns\Behavioral\State

/**
 * Cls Context 
 *   - defines interface of interest to clients
 *   - maintains reference to an instance of a State subclass = current state of the Context.
 */
class Context
{
    private $state; // reference to the current state of the Context

    public function __construct(State $state) {
        echo __METHOD__ . " call \$this->transitionTo(\$state);" . ".<br>";
        $this->transitionTo($state);
    }

    // Cls Context allows changing State object at runtime.
    public function transitionTo(State $state): void {
        echo __METHOD__ . " (get_class(\$state)) " . get_class($state) . ".<br>";
        $this->state = $state;
        $this->state->setContext($this);
    }

    // Cls Context delegates part of its behavior to the current State object.
    public function request1(): void { $this->state->handle1(); }
    public function request2(): void { $this->state->handle2(); }
}

/**
 * The base State class 
 *    - declares methods that all Concrete State should implement
 *    - provides backreference to Context object, associated with State.
 *      This backreference can be used by States to transition Context to another State.
 */
abstract class State
{
    protected $context;

    public function setContext(Context $context) { $this->context = $context; }

    abstract public function handle1(): void;
    abstract public function handle2(): void;
}

/**
 * Concrete States implement various behaviors, associated with a state of the Context.
 */
class ConcreteStateA extends State
{
    public function handle1(): void {
        echo 'extends abstract cls ' . __METHOD__ . " handles request1.<br>";
        echo ".......... wants to change the state of the context.<br>";
        $this->context->transitionTo(new ConcreteStateB());
    }

    public function handle2(): void {
      echo 'extends abstract cls ' . __METHOD__ . " handles request2.<br>"; 
    }
}

class ConcreteStateB extends State
{
    public function handle1(): void {
        echo 'extends abstract cls ' . __METHOD__ . " handles request1.<br>";
    }

    public function handle2(): void
    {
        echo 'extends abstract cls ' . __METHOD__ . " handles request2.<br>";
        echo ".......... wants to change the state of the context.<br>";
        $this->context->transitionTo(new ConcreteStateA());
    }
}

/**
 * Client code
 */
echo "Client code : \$context = new Context(new ConcreteStateA());<br>";
$context = new Context(new ConcreteStateA());
echo "<br>Client code : \$context->request1();<br>";
$context->request1();
echo "<br>Client code : \$context->request2();<br>";
$context->request2();
