<?php
// https://readthedocs.org/projects/designpatternsphp/downloads/
// State pattern purpose :
// Encapsulate varying behavior for the same routine based on an object's state. This can be a cleaner way for an object to change its behavior at runtime without resorting to large monolithic conditional statements.

//https://github.com/DesignPatternsPHP/DesignPatternsPHP/tree/main/Behavioral/State  - PHP
//https://wickedlysmart.com/head-first-design-patterns/  - Java,
//    see https://kalkicode.com/ai/online-java-to-php-converter

declare(strict_types=1);

namespace PattDesBeh\State ; // DesignPatterns\Behavioral\State

class OrderContext {
    private State $state;

    public static function create(): OrderContext  {
        $order = new self();
        $order->state = new StateCreated();
        return $order;
    }

    public function setState(State $state) { $this->state = $state; }
    public function proceedToNext() { $this->state->proceedToNext($this); }
    public function toString() { return $this->state->toString(); }
}

interface State {
    public function proceedToNext(OrderContext $context);
    public function toString(): string;
}

// ---------------------------------
// Concrete States implement various behaviors, associated with a state of the Context.
class StateCreated implements State
{
    public function proceedToNext(OrderContext $context) {
        $context->setState(new StateShipped());
    }
    public function toString(): string { return '<b>created</b><br>'; }
}

class StateShipped implements State
{
    public function proceedToNext(OrderContext $context) {
        $context->setState(new StateDone());
    }
    public function toString(): string { return '<b>shipped</b><br>'; }
}

class StateDone implements State
{
    public function proceedToNext(OrderContext $context) {
        // there is nothing more to do
    }
    public function toString(): string { return '<b>done</b><br>'; }
}


// ---------------------------------
// Client code
$contextOrder = OrderContext::create();
echo $contextOrder->toString();

$contextOrder->proceedToNext(); // testCanProceedToStateShipped()
echo $contextOrder->toString();
          //$this->assertSame('shipped', $contextOrder->toString());

$contextOrder->proceedToNext(); // testCanProceedToStateDone()
echo $contextOrder->toString();

$contextOrder->proceedToNext(); // testStateDoneIsTheLastPossibleState()
echo $contextOrder->toString();

