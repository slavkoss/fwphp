<?php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://phpenthusiast.com/blog/strategy-pattern-the-power-of-interface">https://phpenthusiast.com/blog/strategy-pattern-the-power-of-interface</a>


<p>04. STRATEGY PATTERN - select code alternative, when we need to choose between similar classes that are different only in their implementation. Good alternative to inheritance (instead of having an abstract class that is extended).</p>

<p>Strategy pattern instructs us to create an INTERFACE that the classes can implement, while the choice from which of the classes to create an object is done during the program runtime.</p>

<p>CLIENT CLASS is fed with the object, and performs the task that the program is meant to do.</p>


<p>Benefits :</p>
<ol>
<li>methods of the adapter class, are constructed from the new class`s methods as bodies wrapped with the names of the old class`s methods. 
<li>By doing so, the adapter translates the new interface to the old interface, and so saves us the trouble of re-writing our existing code.
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/zinc/showsource.php');