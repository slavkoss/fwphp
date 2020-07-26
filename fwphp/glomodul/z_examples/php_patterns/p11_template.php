<?php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html

?>
<a href="https://phpenthusiast.com/blog/the-template-pattern-the-power-of-abstraction">https://phpenthusiast.com/blog/the-template-pattern-the-power-of-abstraction</a>

<?php
// The abstract parent class.
abstract class Book {
  protected $title;
  protected $content;
     
  function setTitle( $str )
  {
    $this->title = $str;
  }
    
  function setContent( $str )
  {
    $this->content = $str;
  }
}
 
class Paperback extends Book {
      
  function printBook()
  {
    var_dump("The book '{$this->title}' was printed.");
  }
}
 
class Ebook extends Book {
      
  function generatePdf()
  {
    var_dump("A PDF was generated for the eBook '{$this->title}'.");
  }
}
//Let's test the code:
$paperback = new Paperback;
$paperback -> setTitle("The greatest paperback ever");
echo '<br /><br />Output of original class (now subclass) $paperback -> printBook(); is: <br />';
$paperback -> printBook();
//And the result is:
//string "The book 'The greatest paperback ever' was printed." (length=51)

?>
<p>07. TEMPLATE PATTERN - duplicated code from eg 2 classes into an abstract parent class and make the original classes into subclasses that inherit the code of the parent abstract class.</p>


<p>Benefits :</p>
<ol>
<li>Abstraction
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/zinc/showsource.php');