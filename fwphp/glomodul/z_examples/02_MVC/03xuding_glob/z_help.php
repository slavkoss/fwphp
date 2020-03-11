
<head>
<style type="text/css">
.page-style {
	margin-left: 10%;
	margin-right: 10%;
	font-family: Calibri;
	font-size: 20px;
}
.auto-style1 {
	margin-left: 280px;
}
</style>
</head>

<body class="page-style">
<?php

?>
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
<p>
 I have found great benefit in doing in <strong>Radicore PHP fw</strong> the opposite :<br>

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
<br>

</p>
<h3>
Polymorphism<br>

</h3>
<ol>
	<li>&nbsp;Same method signature (interface), different implementation. (It is NOT a requirement that the method signature was previously defined in an interface or an abstract class.)<br>
	</li>
	<li>Ability to substitute one class for another = Dependency Injection. <br>
	</li>
	<li>Ability to send a message to an object without knowing what its type (class) is.<br>
	</li>
	<li>&nbsp;Same method names exist in several classes.<br>&nbsp;&nbsp;&nbsp; NOT getCust(), insCust()... but getData(), insertRec()... ee cc, rr, uu, dd<br>&nbsp;&nbsp;&nbsp; This is easier if CRUD methods are defined in superclass and inherited in each subclass.<br>
	</li>
</ol>
<h3>
OO programming<br>


</h3>
<p>
OOP is same as procedural programming except for :<br>


</p>
<ol>
	<li>&nbsp;addition of encapsulation, inheritance and polymorphism</li>
	<li>&nbsp;you need to use these features in a way that creates more reusable code<br>
	</li>
</ol>
<h3>
Types of object</h3>
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
<h3>
Radicore PHP fw<br>

</h3>
<p>
- Controller for each of my 40+ Transaction Patterns.<br>- View for each output format - HTML, PDF and CSV.<br>- Model for each table in the database (there are currently 350 tables).<br>- Data Access Object for each supported DB (currently MySQL, PostgreSQL, Oracle and SQL Server).<br>- Component script for each user transaction. In my main application there are currently 2,800.<br>
<br>

</p>
<h3>
3-Tier code Architecture - 3 code layers<br>

</h3>
<p>
Conforms to Single Responsibility Principle which was written by Robert C. Martin (Uncle Bob).
<br>

</p>
<ol>
	<li>&nbsp;Presentation (C, V)</li>
	<li>&nbsp;Business (M = Domain - Fawler said - validations, calculations, business 
	rules)<br></li>
	<li>&nbsp;Data access objects (<strong>DAO</strong>=new ModelClass)<br></li>
</ol>
<p>
Business rules should not know DB schema.</p>
<h3>
Separate concerns<br>


</h3>
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
<pre>
&nbsp;</pre>
<pre>
&nbsp;</pre>
<h3>
 Problem kineskog poštara i trgovačkog putnika (travelling salesman)</h3>
<p>
 Graf s 4 vrha (node), 7 bridova(edge, border, boudary). Problem kineskog poštara :<br>
 <a href="http://e.math.hr/math_e_article/br14/fosner_kramberger">http://e.math.hr/math_e_article/br14/fosner_kramberger</a>&nbsp; Sedam königsberških mostova

</p>
<p>
 Kaliningrad između Poljske i Litve leži na obalama rijeke Pregel.Euler dokazao da ne postoji Eulerova šetnja preko svih sedam mostova koji povezuju&nbsp; dva otoka (VRHA) na rijeci Pregel s gornjim i donjim gradom (VRHOVIMA) Königsberga takva DA SE SVAKI MOST (BRID) PRIJEĐE TOČNO JEDANPUT :</p>
<pre>
 
                              _.-'(S)'-._       Sjever (North city part)
          4 mosta (bridges) .'/          '.
             S-J preko     / /             \
             manjeg       / /               \
             otoka        (Z) ------------ (I)  Otoci Mali i Veliki (Islands small and big)
                         |  \               |
                          \  \             /
                           '. \          .'
                             '-._(J)_.-'       Jug
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
</body>