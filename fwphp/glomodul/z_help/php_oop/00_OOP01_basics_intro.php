<h2>02. Introduction to PHP OOP 002</h2>
<?php

  // In php 5 : function_exists() or is_callable()
  //    register_shutdown_function() would allow alternative action on a fatal error.
  //if ( function_exists('displ_breadcrumbs') ) //some_undefined_function_or_method()
  if ( is_callable('displ_breadcrumbs') ) //some_undefined_function_or_method()
  {
    displ_breadcrumbs('intro') ;
  } else { // Error is the base class for all internal PHP error exceptions.
      //echo '<pre>' ; print_r($ex); echo '</pre>' ;  //var_dump($ex)
      ?>
      If included <?=__FILE__ . '<br />eg in http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/03xuding_glob/?i/h/'?> :
      <ol>
      <li>Fn displ_breadcrumbs() does not exist, but exists if included index.php
      <li>Open/close does not work which is desirable for testing html
      </ol>
      <?php
  }

  /*
  // In php 7, this is possible :
  try {
    displ_breadcrumbs('intro');  //some_undefined_function_or_method()
  } catch (\Error $ex) { // Error is the base class for all internal PHP error exceptions.
      //echo '<pre>' ; print_r($ex); echo '</pre>' ;  //var_dump($ex)
      echo '<h4>Fn displ_breadcrumbs() does not exist if included '. __FILE__ 
           .', but exists if included index.php'; 
      echo '</h4>' ;
  }
  //Many fatal and recoverable fatal errors have been converted to exceptions in PHP 7. These error exceptions inherit from the Error class, which itself implements the Throwable interface (the new base interface all exceptions inherit).
  */

  
  /* 
  //If you would like to suppress this error while working with objects use this function:
  function OM($object, $method_to_run, $param) { //Object method
    if(method_exists(get_class($object), $method_to_run)){
        $object->$method_to_run($param);
    } 
  } 


      function shutDown_handler()
      {
         $last_error = error_get_last();
         //verify if shutwown is caused by an error
         if (isset ($last_error['type']) && $last_error['type'] == E_ERROR)
         {

              my activity for log or messaging
              you can use info: 
                $last_error['type'], $last_error['message'],
                $last_error['file'], $last_error['line']
                see about on the manual PHP at error_get_last()

         }
      }

      register_shutdown_function ('shutDown_handler');

  */

//  better $this->pp1->wsroot_url than $wsroot_url
//$img_url_dir = $this->pp1->wsroot_url . $this->pp1->imgrel_path .'img_big/oop_help/';
?>

<img alt="" src="<?=$img_url_dir?>002_properties_behavior_diagram.jpg" 
     title="<?=$img_url_dir?>002_properties_behavior_diagram.jpg"
     onclick="window.open(this.src)">
<p>002_properties_behavior_diagram.jpg - <b>data and processing</b>. Some objects are same, their behavior is exactly same, but they are slightly different in their properties (for dog: name, color, breed-pasmina). Alan Kay discovered OOP : eg dog has properties and actions described in class Dog, and "new Dog" command occupies memory for them, ee creates object (instantiates class).</p>


<p>Objects can also interact with each other (hierarhically or containment).</p>


<h3>Pros and cons of OOP approach to software development</h3>
<ol>
---------------------------------------------------------- OOP PROS
<li><b>Easy to map our classes</b> onto real-world objects (<b>domain - like business objects</b>, situations) like people, things and concepts. Classes have the same properties and behaviors as the real - world concepts they represent. Purpose of each object, as well as the relationship between objects, is already clear from the real life situation.
<li>Code Reuse in other applications (Recycling).
<li>Easy to write modular code in self-contained modules
<li>Easily upgraded from smaller to larger systems
<li>lots of other OOP benefits... book can be written, but also against OOP ! Some say: "is OOP mistake ?" 
<br />---------------------------------------------------------- OOP CONS
<li>For navigation (url-s, links) code is same - OOP does not help - compare mnu and msg module.
<li>Lack of reusability in OOP - to get banana (some method or attribute) you get also gorilla holding banana and whole gorillas jungle (<b>all higher classes</b> with complicated dependencies). Interfaces help to get ONLY banana, but coding is complicated - I could find only strong-talk-weak-work code examples about this subject.
<li>See <a href="https://phpthewrongway.com/">https://phpthewrongway.com/</a>, or Joe Armstrong why OOP sucks <a href="http://harmful.cat-v.org/software/OO_programming/why_oo_sucks">http://harmful.cat-v.org/software/OO_programming/why_oo_sucks</a>.</li>

</ol>

<p><b>Procedural language</b> - For example "C" : execution of a C program begins from the function "main()". Compiler reads these lines one by one. For example one line of code calls a function A : compiler reads lines from that function than continues reading "main()".</p>









<button type="button" class="collapsible">Open/Close OOP, MVC, 3-tier, separate concerns, FW, DM and DDD</button>
<div class="content"><!--/div--><!-- c ollapsible -->



<h2>OOP,&nbsp; MVC, 3-tier, separate concerns, FW, DM and DDD</h2>
<p class="auto-style1">
 Lewis Carroll's Through the Looking Glass: <br>When I use a word, it means just what I choose it to mean -- neither more nor less.</p>
<p>
 <a href="https://airbrake.io/blog/software-design/domain-driven-design">https://airbrake.io/blog/software-design/domain-driven-design</a>&nbsp; - Eric Evans 2004 book<br>
 <br>
 <a href="https://www.tonymarston.net/php-mysql/dont-do-domain-driven-design.html">https://www.tonymarston.net/php-mysql/dont-do-domain-driven-design.html</a>
 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="https://www.radicore.org/">https://www.radicore.org/</a> <br>
 <a href="https://www.tonymarston.net/php-mysql/what-is-a-framework.html">https://www.tonymarston.net/php-mysql/what-is-a-framework.html</a>
 <br>
 <a href="https://www.tonymarston.net/php-mysql/what-is-oop.html#polymorphism">https://www.tonymarston.net/php-mysql/what-is-oop.html#polymorphism</a>
 <br>

</p>
<p>
 DDD programmers are being taught to :</p>
<ol>
  <li>Start with the <strong>DOMAIN (BUSINESS) LOGIC</strong></li>
  <li>Add in the non-domain logic afterwards.<br></li>
</ol>


<img alt="" src="<?=$img_url_dir?>/IDD_Outside_in_design.jpg" 
     title="<?=$img_url_dir?>/IDD_Outside_in_design.jpg"
     onclick="window.open(this.src)">
<p>IDD_Outside_in_design.jpg - DDD design for some domain. Domain model is called R=repository,
A= action, DS = domain service. It is some sort of events flow - user cases flow.
<p>

<img alt="" src="<?=$img_url_dir?>/domain_driven_design_payement.jpg" 
     title="<?=$img_url_dir?>/domain_driven_design_payement.jpg"
     onclick="window.open(this.src)">
<p>domain_driven_design_payement.jpg - DDD design for payement business domain
<p>




<h3>Types of object</h3>
<ol>
  <li>&nbsp;Value objects - immutable object whose responsibility is mainly holding state<br>&nbsp;&nbsp; but may have some behavior. Examples of Value Objects might be Color, Temperature, Price and Size.<br>&nbsp;&nbsp; PHP language does not have value objects, so I shall ignore them.<br>
  </li>
  <li>Entities - an object whose job is to hold state and associated behavior (data and processing).
  <br>&nbsp;&nbsp; Examples of this are M, Account, Product or User.<br></li>
  <li>&nbsp;Services - an object which performs an operation. It encapsulates an activity<br>&nbsp;&nbsp; but has no encapsulated state (that is, it is stateless).
  <br>&nbsp;&nbsp; Examples of Services are C, V, DAO (Data Access Object), parser, authenticator, validator, transformer<br>&nbsp;&nbsp; (such as transforming raw data into XML or HTML).<br>
  </li>
</ol>
<p>All application/domain knowledge is confined to the Models (the Business layer). There is absolutely no application knowledge in any of the services which are built into the framework. This means that the
<strong>services (Controllers, Views and DAOs) are application-agnostic while the Models are framework-agnostic.</strong><br>
<br>User transactions (Use Cases) - unit of work for the user.<br>
<br></p>










<p>
Tony Marston has found great benefit in doing opposite in <strong>Radicore PHP fw</strong> and I do simmilar (simplified) in B12phpfw :<br>

</p>
<ol>
  <li>&nbsp;I start with the non-domain logic (standard code, CRUD skeleton),&nbsp; components around the domain-agnostic logic.<br>
  <strong>PHP framework</strong> allows to generate working <strong>user transactions</strong> which automatically contain all the necessary
  <strong>domain-agnostic code</strong>.</li>
  <li>&nbsp;Add domain-specific logic (business rules) later.<br>Developer can then add in the necessary domain-specific code without having to touch the standard code which is provided by the framework.
  </li>
</ol>
<p>
 This is an easy job in Radicore PHP fw as the <strong>abstract table class,</strong> from which every
 <strong>concrete table class inherits</strong>, contains a series of hook methods specifically for this purpose.<br>

</p>
<p>
After analysing the requirements I have a preliminary DB design and a list of events/tasks (use cases).
<br>Once I have designed DB for a new domain I do not have to design SW from scratch.<br>I then build DB and design SW based on actions that will be performed on those tables.<br>

</p>
<p><br></p>




<h3>OO programming</h3>

<p>
OOP is same as procedural programming except for :<br>
</p>
<ol>
  <li>&nbsp;addition of <b>encapsulation</b>, <b>inheritance</b> and <b>polymorphism</b></li>
  <li>&nbsp;you need to use these features in a way that creates more reusable code<br>
  </li>
</ol>

<p>Inheritance relation is "ISA" = clses hierarchy = record type, subtype.... eg car subtype is a vehicle type. Superclass data and processing is as is in each subclass. Subclass actions may not be valid for superclass or subclasses in other hierarchy. 

<p>Opposite to inheritance relation is "HASA" relation (house has kitchen, but kitchen is not a house), composition, contain. May be not cls but cls member variable.



<h3>Polymorphism</h3>
<ol>
  <li>&nbsp;Same method signature (interface), different implementation. (It is NOT a requirement that the method signature was previously defined in an interface or an abstract class.) 
  Also see \fwphp\glomodul\z_help\oop_help\00_OOP01_basics_intro.php when called 
  from site menu &quot;Help&quot; or from ...03xuding_glob\Home_ctr.php</li>
  <li>Ability to substitute one class for another = Dependency Injection</li>
  <li>Ability to send a message to an object without knowing what its <b>class type</b> is</li>
  <li>Same method names exist in several classes :<br>&nbsp;&nbsp;&nbsp; NOT getCust(), insCust()... but getData(), insertRec()... ee cc, rr, uu, dd<br>
  &nbsp;&nbsp;&nbsp; This is easier if CRUD methods are defined in superclass and inherited in 
  each subclass</li>
</ol>





<h3>3-Tier code Architecture - 3 code layers<br></h3>
<p>
Conforms to Single Responsibility Principle which was written by Robert C. Martin (Uncle Bob).
</p>

<ol>
  <li>&nbsp;Presentation (C, V)</li>
  <li>&nbsp;Business (M = Domain - Fawler said - validations, calculations, business 
  rules)<br></li>
  <li>&nbsp;Data access objects (<strong>DAO</strong>=new ModelClass)<br></li>
</ol>
<p>
Business rules should not know DB schema.</p>


<img alt="" src="<?=dirname(dirname($img_url_dir))?>/code_arch_patterns_MVC_3tier.jpg" 
     title="<?=dirname(dirname($img_url_dir))?>/code_arch_patterns_MVC_3tier.jpg"
     onclick="window.open(this.src)">
<p>code_arch_patterns_MVC_3tier.jpg - in B12phpfw :
<ol> 
<li>C is one class for each module in own folder (may be if you like)
<li>V is not class (may be if you like)
<li>M is DM : two (important) classes : global Db_allsites and eg Admin_crud for users.
</ol>
</p>



<h3>Separate concerns</h3>
<p>
How do you separate concerns? You separate behaviors that change at different times for different reasons. Things that change together you keep together. Things that change apart you keep apart.<br>

</p>
<ol>
  <li>GUIs change at a very different rate, and for very different reasons, than business rules</li>
  <li>&nbsp;Database schemas change for very different reasons, and at very different rates 
  </li>
  <li>than business rules</li>
</ol>
<p>&nbsp;Keeping these concerns (GUI, business rules, database) separate is good design.</p>
<p><br></p>
<h3>
 How much reusability you have in your framework</h3>
<p>
 Do you write each Model class by hand, or can they be generated for you?Do you have to manually insert lots of code into each Model, or can most of it be inherited?<br>Do you have to manually write a separate Controller for each Model, or can you use a library of pre-written Controllers?<br>Do you have to manually write a separate View for each user transaction, or can you use a REUSABLE VIEW?<br>Do you have to manually write a separate DAO (Data Access Object) for each table, or can you use a SINGLE DAO FOR THE ENTIRE DB?<br>

</p>




<h3>Radicore PHP fw</h3>
<p>
- Controller for each of my 40+ Transaction Patterns.<br>- View for each output format - HTML, PDF and CSV.<br>- Model for each table in the database (there are currently 350 tables).<br>- Data Access Object for each supported DB (currently MySQL, PostgreSQL, Oracle and SQL Server).<br>- Component script for each user transaction. In my main application there are currently 2,800.<br>
<br>
</p>








<h3>Problem kineskog poštara i trgovačkog putnika (travelling salesman)</h3>
<p>
 Graf s 4 vrha (node), 7 bridova(edge, border, boudary). Problem kineskog poštara :<br>
 <a href="http://e.math.hr/math_e_article/br14/fosner_kramberger">http://e.math.hr/math_e_article/br14/fosner_kramberger</a>&nbsp; Sedam königsberških mostova

</p>
<p>
 Kaliningrad između Poljske i Litve leži na obalama rijeke Pregel.Euler dokazao da ne postoji Eulerova šetnja preko svih sedam mostova koji povezuju&nbsp; dva otoka (VRHA) na rijeci Pregel s gornjim i donjim gradom (VRHOVIMA) Königsberga takva DA SE SVAKI MOST (BRID) PRIJEĐE TOČNO JEDANPUT :</p>
<pre>
 
                             _.-'(S)'-._       Sjever (North city part)
    4 mosta (4 bridges)    .' /         '.
    preko manjeg otoka    /  /            \
    over small isle      /  /              \
                         (Z) ------------ (I)  Otoci Mali i Veliki (Islands small and big)
                         |  \               |
                          \   \            /
                           '.  \         .'
                             '-.__(J)_.-'       Jug (South city part)

</pre>
<p>
 Zatvorena Eulerova šetnja se može naći samo u grafovima u kojima je stupanj - BROJ BRIDOVA SVAKOG VRHA PARAN. Prema tome se grafovi u kojima su svi vrhovi parnog stupnja nazivaju Eulerovim.</p>
<p>
 Problem trgovačkog putnika - tražimo šetnju u usmjerenom ili neusmjerenom grafu tako DA PROĐEMO SVAKI VRH U GRAFU BAREM JEDNOM i vratimo se u početni vrh na najkraći mogući način.</p>
<p>
 Usmjerenim grafom može se riješiti problem kineskog poštara i trgovačkog putnika.</p>
<p>
 <br>

</p>




</div><!-- collapsible -->
