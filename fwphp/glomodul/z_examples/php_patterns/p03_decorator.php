<?php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://phpenthusiast.com/blog/the-decorator-design-pattern-in-php-explained">https://phpenthusiast.com/blog/the-decorator-design-pattern-in-php-explained</a>


<p>05. DECORATOR PATTERN - to add new optional features to our code without changing the existing classes. The new features are added by creating new classes that belong to the same type as the existing classes.</p>

<p>Auto manufacturing company uses eg Car interface to dictate to all of the implementing classes that they need to have price and description methods.</p>

<p>Problem starts when customers are given the choice to add optional features to their car, like high end wheels, a car rear spoiler, or a sun roof. We wouldn't like to change the existing classes to include optional features, so we need a better solution - decorator pattern, which instructs us to add to the basic classes that implement the interface, an abstract class eg CarFeature that also implements the same Car interface. The abstract class is used as a super-class that the features classes inherit from eg concrete class SunRoof or HighEndWheels which extends the CarFeature decorator.</p>



<p>Benefits : In order to implement the code, we need to:</p>
<ol>
<li>Create an object from one of the basic classes (in our example, it is the Suv class).
<li>Pass the object that was created from the basic class as a parameter to the class that adds the first feature (i.e., the SunRoof class).
<li>Pass the object that was created from the first feature class to the second feature class, and so on until we finish adding all the optional features.
<li>Run the methods on the last object that we created in the process of decoration.
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/zinc/showsource.php');