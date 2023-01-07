<!DOCTYPE html>
<html lang="hr">

<head>
<meta content="text/html; charset=utf-8" />
<title>DDD</title>
<style type="text/css">
.auto-style1 {
	margin-left: 80px;
}
.auto-style2 {
	color: #008000;
}
</style>
</head>

<body style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:medium;">

<h1>Programming principles</h1>
<pre>interface <strong>IDBcls</strong> {
   // high-level module, <strong>abstraction (interface)</strong>
   // class for any DB table, for CRUD table rows. Contains methods : <strong>cc, rr, uu, dd</strong>.
   public function rr(); 
      // Read any DB table row method
   }


class <strong>Mysqlcls</strong> implements IDBcls { // <span class="auto-style2"><strong>car engine</strong></span>
   // low-level module <strong>- Details of your interfaces/abstraction, depends on abstraction (interface)</strong>
   public function rr() {
      ?&gt;
      rr method says : this txt we can load from some Mysql DB table row
      &lt;?php
   }
}


class <strong>Oraclecls</strong> implements IDBcls { // <span class="auto-style2"><strong>car engine</strong></span>
   // low-level module <strong>- Details of your interfaces/abstraction,</strong> <strong>depends on abstraction (interface) </strong>
   public function rr() {
      ?&gt;
      rr method says : this txt we can load from some Oracle DB table row.
      &lt;?php
   }
}




/* interface IRepcls { // also possible
public function usesrr(IDBcls $db);
} */

//class Repcls implements IRepcls {
class <strong>Repcls</strong> {
   // <strong>high-level module</strong> <strong>depends on high-level module abstraction (interface)</strong>
   public $db ;
   public function __construct(<strong>IDBcls $db</strong>)
   {
      $this-&gt;db = $db;
   }

   public function rr() {
      $this-&gt;db-&gt;rr();
   }
}


// <strong>Client - person driving the car - runs high-level module - steering wheel and the gas/brake peddles </strong>
$mysql = new Mysqlcls();
$report_mysql = new Repcls($mysql);

$report_mysql-&gt;rr();

$ora = new Oraclecls();
$report_ora = new Repcls($ora);

$report_ora-&gt;rr();
</pre>



<?php
interface IDBcls {
// CRUD read any DB table rows class contains cc, rr, uu, dd methods
public function rr(); // Read any DB table row method
}

class Mysqlcls implements IDBcls {
  public function rr() {
    ?>
    <br><br>rr method says : this txt we can load from some Mysql DB table row
    <?php
  }
}

class Oraclecls implements IDBcls {
  public function rr() {
    ?>
    <br><br>rr method says : this txt we can load from some Oracle DB table row.
    <?php
  }
}

/* interface IRepcls { // also possible
public function usesrr(IDBcls $db);
} */

//class Repcls implements IRepcls {
class Repcls {
  public $db ;

  public function __construct(IDBcls $db)
  {
    $this->db = $db;
  }
  public function rr() {
    $this->db->rr();
  }
}

// Client
$mysql = new Mysqlcls();
$report_mysql = new Repcls($mysql);
$report_mysql->rr();

$ora = new Oraclecls();
$report_ora = new Repcls($ora);
$report_ora->rr();

?>


<br><br>
<p>&nbsp;</p>
<h3>SOLID </h3>
<p>is group of 5 programming principles created by Robert C. Martin (uncle Bob) 
:<br></p>
<ol>
	<li>S ingle-responsibility. <span class="auto-style2"><strong>SRP 
	</strong></span>class should only have one reason to change, ee <strong>class should do only one 
thing </strong>- every class is owned exactly by one entity - <strong>person who 
	manipulates data has his class methods</strong>. It is people who request changes. And you don’t want to 
	confuse those people, or yourself, by mixing together the code that many 
	different people care about for different reasons. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="https://dev.to/tamerlang/understanding-solid-principles-single-responsibility-principle-523j">
	https://dev.to/tamerlang/understanding-solid-principles-single-responsibility-principle-523j</a>
	</li>
	<li>
	<span class="auto-style2"><strong>O pen-closed </strong></span>
	Software entities (classes, modules, functions, etc.) should be open for 
	extension, but closed for modification - 100% ready to be used by other 
	classes - its interface is clearly defined and won’t be changed in the 
	future&nbsp; - keep the existing code from 
	breaking when you implement new features - <strong>do not modify code, but 
	extend it</strong>. Create a subclass and override parts of the original 
	class that you want to behave differently or you can extend the 
	functionality and add your own methods. You'll achieve your goal but also 
	won't break the existing functionality of the original class. If you see a 
	bug then go ahead and fix it; don't create a subclass for it. </li>
	<li><span class="auto-style2"><strong>L iskov</strong></span> substitution - 
	in object-oriented programming, subclasses should be able to substitute 
	their parent classes without breaking any client functionality.&nbsp;
	
 <ol><li>&nbsp;<strong>Parameter types</strong> in a method of 
	a class should&nbsp;match&nbsp;or are&nbsp;more abstract&nbsp;than parameter types in the 
	superclass. Eg feed(Dog d) : we created a subclass that overrode feed(Dog d) 
	so that it can feed any animal (a superclass of dogs):&nbsp;feed(Animal d) - 
	method can feed all animals, so it can still feed any cat passed by the 
	client.&nbsp; </li>
	 <li>Inverse to the requirements of the parameter type :&nbsp; The <strong>
	 return type</strong> in a method of a subclass should match or be a subtype 
	 of the return type in the superclass.&nbsp; </li>
	 <li>...
	 <a href="https://dev.to/tamerlang/understanding-solid-principles-liskov-substitution-principle-46an">
	 https://dev.to/tamerlang/understanding-solid-principles-liskov-substitution-principle-46an</a> </li>
	</ol>
	<li><strong><span class="auto-style2">I nterface segregation (separation) </span> 
	</strong>no 
	client should be forced to depend on methods it does not use. 
	Ee interface&nbsp;shouldn't&nbsp;force&nbsp;a&nbsp;class&nbsp;to implement methods that it won't be 
	using. Do I have a bunch of one method interfaces? No. SOLID principles 
	shouldn't be followed to the teeth, eg PizzaIface fn orderPizza($qty) class 
	PizzaOrder, DrinkIface...</li>
	<li><span class="auto-style2"><strong>D ependency inversion
	<a href="https://dev.to/tamerlang/understanding-solid-principles-dependency-inversion-1b0f">https://dev.to/tamerlang/understanding-solid-principles-dependency-inversion-1b0f</a></strong></span>
	
	High-level modules 
should not import anything from low-level modules; they should <strong>both 
depend on abstractions</strong>. Abstractions should not depend on details. 
Details should depend upon abstractions.
<p>Code that doesn't follow this principle can be <strong>too coupled</strong>, 
hard to manage the project. </p>
<p>Report class does not depend concretely on the database class but 
on its abstraction DatabaseInterface. This approach also follows the <strong>
<span class="auto-style2">open-closed</span> 
principle</strong> because <strong>to use any new DB we don\'t have to change Report class</strong>. We just need to add a new database class that implements the 
DatabaseInterface.</p>
<p>For me, it doesn't matter whether <span class="auto-style2"><strong>car 
engine</strong></span> (details) has changed, I still should be able to drive my 
car the same way. <br>Details should depend upon abstractions, same as high-level 
modules (brakes , reports) - I would not want an <strong>engine that causes the 
brake to double the speed</strong>. </p>
	<br>
	</li>
</ol>
<p><br></p>
<h3>Clean Code Project - readable code</h3>
<p>&quot;Any fool can write&nbsp;code that a computer can understand. Good programmers 
write code that humans can understand.&quot; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; – Martin Fowler <a href="https://www.freecodecamp.org/news/clean-coding-for-beginners/">
https://www.freecodecamp.org/news/clean-coding-for-beginners/</a> </p>
<p><a href="https://github.com/abiodunjames/Awesome-Clean-Code-Resources">
https://github.com/abiodunjames/Awesome-Clean-Code-Resources</a> </p>
<ol>
	<li>Use TDD/li>
	<li>&nbsp;Always think if your code is <strong>easy to understand</strong></li>
	<li>&nbsp;Write small functions and classes</li>
	<li>&nbsp;Respect SRP - Small functions advantages (function <strong>5-10 lines, class 10-50-100</strong> 
	lines):
	<ol>
		<li>&nbsp;Easy to understand, maintain, debug, reuse, test, keep bug 
		free</li>
		<li>&nbsp;Avoid code repetition (code redundance), but also use SRP to avoid
		<strong>too coupled code</strong>, hard to manage the project 
		(complicated, nonunderstandable if-commands).<br>
		<span class="auto-style2"><strong>SRP</strong></span> 
		= Single Responsibility Principle is <strong>same as Small functions concept</strong>. 
		Function and class should only do one thing (should have only one reason 
		to change)</li>
		<li>&nbsp;Beautify code</li>
		<li>&nbsp;Separate concepts into their <strong>levels of abstraction :<br>
		# Layers<br><br></strong>see 
		J:\awww\www\vendor\b12phpfw\img\img_big\Clean_Architecture.jpg and 
		..._older_DDD.jpg. <br><strong><br>Clean_Architecture.jpg description</strong> 
		:<br><br>### <strong>1. Entities</strong> - 1st (inner) circle - YELLOW.
		Entities encapsulate **enterprise wide business rules**. <br>It doesn’t 
		matter so long as the entities could be used by many different 
		applications in the enterprise. <br><br>### <strong>2. Use Cases</strong> - 2nd circle (1st 
		outer circle) - HIGHER LAYER - PINK. The software in this layer 
		contains **application specific business rules**.&nbsp;&nbsp;&nbsp; <br>These use cases 
		orchestrate the <strong>flow of data to and from the entities</strong>, and direct those 
		entities to use their enterprise wide business rules to achieve the 
		goals of the use case. <br><br>### <strong>3. Interface Adapters</strong> - 3rd - HIGHER 
		LAYER - GREEN<br>The software in this layer is a set of adapters that 
		<strong>convert data</strong> from the format most convenient for the use cases and 
		entities. <br>That will wholly contain the MVC architecture of a GUI.
		<br>The models are likely just data structures that are passed from the 
		controllers to the use cases, and then back from the use cases to the 
		presenters and views. <br><br>### <strong>4. Frameworks &amp; Drivers</strong> - 4th - HIGHER 
		LAYER - BLUE<br>The outermost layer is generally composed of frameworks 
		and tools such as the Database, the Web Framework, etc. <br><br>## 
		Dependency Rule<br><br>1. is overriding rule (Glavno pravilo) that makes 
		this architecture work : <br>source code dependencies can only point 
		inwards : <br>- Nothing in an inner circle can know anything at all 
		about something in an outer circle.<br>- The name of something declared 
		in an outer circle must not be mentioned by the code in an inner circle.<br>
		We usually resolve this apparent contradiction by using the **<strong>dependency 
		inversion</strong>** Principle :<br>High-level modules should not import 
		anything from low-level modules; they should <strong>both depend on 
		abstractions</strong>. Abstractions should not depend on details.<br>
		<br>2. Typically the data that crosses the boundaries is simple data 
		structures.<br>- You can use basic structs or simple Data Transfer 
		objects if you like.<br>- Or the data can simply be **arguments in 
		function calls**.<br><br></li>
	</ol>
	</li>
	<li>&nbsp;Don't cross different levels of abstraction</li>
	<li>&nbsp;Give <strong>
	proper names</strong> and use the scope rule - Stay away from comments and 
	express yourself in code<br>&nbsp;&nbsp;&nbsp;&nbsp; Some comments are ok<br>&nbsp;&nbsp;&nbsp;&nbsp; 
	- When you can't express yourself with code:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	//Extract the text between the two title elements<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	$pattern = &quot;(?i)(&lt;tit1e.*?&gt;)(.+?)()&quot;;<br>&nbsp;&nbsp;&nbsp; - When you want 
	to warn people</li>
	<li>&nbsp;Less than three parameters</li>
	<li><strong>Don't use 
	boolean or null arguments</strong></li>
	<li>&nbsp;Beautify predicates when appropriate</li>
	<li>&nbsp;Use <strong>only custom runtime exceptions<br></strong>&nbsp;&nbsp;&nbsp;&nbsp; 
	- Use exceptions instead of error codes<br>&nbsp;&nbsp;&nbsp;&nbsp; - Use 
	your own exceptions</li>
	<li>&nbsp;Treat objects properly keeping in mind if they are
	<strong>OOP Objects or Data Structure objects</strong>.</li>
	<li>&nbsp;<strong>Use 
	Composition over Inheritance</strong><br>&nbsp;&nbsp;&nbsp;&nbsp; Signs that 
	inheritance is plotting against you :<br>&nbsp;&nbsp;&nbsp;&nbsp; - You want 
	to inherit more than one class (greed, pohlepa)<br>&nbsp;&nbsp;&nbsp;&nbsp; 
	- You feel like you inherit too much<br>&nbsp;&nbsp;&nbsp;&nbsp; - The 
	abstract world shatters (Dog becomes FoodEeater, BallChaser, MansBestFriend)</li>
	<li>&nbsp;Be on the watch for symptoms of bad code :<br>&nbsp;&nbsp;&nbsp; 1. 
	Rigidity - Code is <strong>hard to change</strong>. Business is scared to 
	ask for things because everything takes so long.<br>&nbsp;&nbsp;&nbsp; 2. 
	Fragility - When you <strong>touch code in one place it breaks in another</strong>. 
	Business is afraid to ask for things<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	because the&nbsp;&nbsp;&nbsp; projects breaks everytime you change it.<br>&nbsp;&nbsp;&nbsp; 
	3. Immobility - You <strong>can't reuse your methods and classes</strong> - 
	changes take long time. <br>&nbsp;&nbsp;&nbsp; 4. Viscosity - It's hard to 
	do anything because of <strong>design / framework / development</strong> 
	environment<br>&nbsp;&nbsp;&nbsp; 5. tests <strong>run time / deploy time</strong> 
	- changes take long time.</li>
	<li>&nbsp;Treat <strong>state</strong> carefully. What is state in 
	programming and why is it important :<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 
	State is prone (sklon) to bugs.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Keep 
	mutable objects small.</li>
	<li>&nbsp;Keep your <strong>coupling low and your cohesion 
	high</strong></li>
	<li>&nbsp;Try to use <strong>command and query separation</strong>,
	<strong>tell don't ask</strong> and even the <strong>law of Demeter</strong></li>
	<li>&nbsp;Don't use <strong>complex patterns and don't over-engineer</strong><br>
	<br></li>
</ol>
<p class="auto-style1">
<a href="https://en.wikipedia.org/wiki/James_Martin_(author">https://en.wikipedia.org/wiki/James_Martin_(author</a>) 
<br>From the 1990s 
	onwards, Martin (1933-2013) lived on his own private island, Agar's Island, 
	in Bermuda. In 2004 Martin donated &pound;60m to help establish The Oxford Martin 
	School.<br>1976. Principles of Data-Base Management<br>1985. Diagramming 
	techniques for analysts and programmers. With Carma McClure.<br>1992. 
	Object-oriented analysis and design.</p>
<p>&nbsp;</p>
</body>
</html>