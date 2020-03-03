<?php
namespace DMtest; // module name

// 1ST LAYER IS TYPICAL BOOTSTRAP - include and initialize an autoloader :
// ************************************
require_once __DIR__ . "/Autoloader.php";
            //$autoloader = new Autoloader();  //$autoloader->register();
spl_autoload_register('Model\Autoloader::autoload'); //'Autoloader::autoload'

//Cls_no_db_test::db_test() ;
Cls_db_test::db_test() ;



/*
//Domain Model 5 code layers (tiers) : 1. bootstrap (include and initialize an autoloader), 2. domain model of DB (User, Post, Comment entity classes), 3. data (is or is not) persistent - DB, webservice..., 4. module (app) C, 5. presentation V

1. http://www.sitepoint.com/building-a-domain-model/ February 24, 2012  By Alejandro Gervasio 
   - last cry in frameworks night (unnecessary complicated ?)
2. https://www.sitepoint.com/integrating-the-data-mappers/
3. https://www.sitepoint.com/handling-collections-of-aggregate-roots/
4. https://www.sitepoint.com/an-introduction-to-services/


Wed, 10 May 2017
https://lessthan12ms.com/error-handling-in-php-and-formatting-pretty-error-responses-to-users.html
https://github.com/Seldaek/monolog  https://github.com/Seldaek/monolog/blob/master/doc/01-usage.md


Can be done : caching (in any of its multiple forms), lazy-loading, and so forth.

Forwarding model data to and from the DAL (Data Access Layer) can be delegated in many cases to a turnkey mapping library or framework (assuming there exists such a thing). 

Defining the relationships between domain objects, as well as their own rules, data, and behavior is up to the developer.

Good OOP practices - approach very appealing when developing applications that must scale well :
- involved objects have just a few, well-defined responsibilities
- model doesn’t get its pristine (clean, pure) ecosystem polluted with database logic
- shifting M from one infrastructure (data source) to another can be done painless
*/




/**
Building a Basic Blog Domain Model
**********************************
Domain Model is 

- System of abstractions that describes selected aspects of a sphere of knowledge, influence or activity (a domain). The model can then be used to solve problems related to that domain.

- An object model of the domain that incorporates both behavior and data.
Creates a web of interconnected objects, where each object represents some meaningful individual, whether as large as a corporation or as small as a single line on an order form.

************************* 11111 **********************
http://www.sitepoint.com/building-a-domain-model/  February 24, 2012  By Alejandro Gervasio

DOMAIN MODEL purpose:
- M can be ported without much hassle from one infrastructure to another.
- Relationship between data and behavior of domain objects while infrastructure is out of the picture.
  Ee avoid pollute with total impunity (immunity) the DOMAIN LOGIC with code for DB access (infrastructure), or with other type of underlying storage.
- Independent, PERSISTENCE-AGNOSTIC LAYER responsible for defining clearly
  interactions between entities of a system through DATA AND BEHAVIOR.
  Persistence is data source : DB, web service...

At least one extra layer (code interface) :
- multiple domain objects with well-defined constraints and rules interact
- define M from top to bottom
- implement from scratch or reuse a MAPPING LAYER in order to move data 
  between  persistence layer ((DBI, web service interface) and M


HOW TO CONSUME MODEL - Putting the Domain Model to Work

Blog domain model 
************************
Underlying INTERFACES AND CLASSES not knowing about DB, web service...
Often, simple PHP Domain Models are composed of a few POPOs (Plain Old PHP Objects), which encapsulate rich business logic, like validation and strategy, behind a clean API.

Each object graph is spawned by using plain DEPENDENCY INJECTION, which is sufficient for demonstrative purposes.

If the situation warrants, however, OBJECT GRAPH CREATION should be delegated to more versatile structures, such as 
       a Dependency Injection Container or a Service Locator.
In either case, at this point the model is already doing its business as expected.


************************* 22222 **********************
https://www.sitepoint.com/integrating-the-data-mappers/  March 16, 2012  By Alejandro Gervasio

How to put mechanics of the model (article 1) to work in synchrony with
"real" persistence layer - DB tbl-s.

Even simplest Domain Model demands definition of
* constraints
* rules
* relationships among its building objects
* how building objects will behave in a given context
* what type of data building objects will carry during their life cycle

Plus, process of transferring model data to and from the storage will likely
require to drop a set of Data Mappers at some point, a fact that highlights
why Domain Models are often surrounded by a cloud of bullying
(intimidating a weaker person to make them do something).


********************************************************************
1. Building a Naive DAL (or why my PDO adapter is better than yours)
********************************************************************

We build up from scratch an easy-to-manage mapping layer (module),
capable of moving data back and forward between 
   simplistic blog DM (domain model classes/objects) 
   and MySQL tbls DB, 
all while keeping DM and DB isolated from one other.

Connect a batch (lot, plenty, bunch, clutch, deal) of 
mapping classes to a blog’s domain model - properties not in DB, prefixed with "_".

Idea is to set up from scratch a basic DAL (Data Access Layer) so that 
   1. domain objects can easily be persisted in a MySQL DB
   2. retrieved on request through some GENERIC FINDERS.

DAL in question will be made up of just a couple of components: 
1. Simple database adapter intf (interface) G lobal_db_intf - contract which allows us
   to create different DB adapters at runtime and perform common tasks, (assume responsibility)
   such as connecting to DB and running CRUD operations without much fuss.
2. At least one implementer of intf that does all these cool things -non-canonical 
   class G lobal_db implements G lobal_db_intf. 
   (class PdoAdapter implements DatabaseAdapterInterface).


3. DB schema defines a 1:M relationship between posts and comments,
   and a M:1 relationship between comments and users (the blog’s commentators). 

ALTER TABLE `admins` ADD `email` VARCHAR(60) NULL AFTER `username`; 
CREATE TABLE posts (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) DEFAULT NULL,
  content TEXT,

  PRIMARY KEY (id)
);

CREATE TABLE users (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) DEFAULT NULL,
  email VARCHAR(45) DEFAULT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE comments (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  content TEXT,
  user_id INTEGER DEFAULT NULL,
  post_id INTEGER DEFAULT NULL,

  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREGIN KEY (post_id) REFERENCES posts(id)
);

At this point we’ve implemented a simple DAL which we can use for persisting 
blog’s domain model in MySQL without sweating too much during the process. 

Now we need to add the middle men to the picture, that is DATA MAPPERS,
so any impedance mismatches (oppositions to code flow) can be handled 
quietly behind the scenes.

******************************************************************************
2. Implementing a Bi-directional Mapping Layer - RELATIONAL DATA MAPPERS
******************************************************************************
Quite a ways away from being trivial. That’s why ORM LIBRARIES LIKE DOCTRINE live.

4. Encapsulating as much mapping logic as possible within abstract class 
   A bstractDataMapper :
   - couple of generic row object finders (get record sets)
   - logic required for pulling in data from a specified table which is then used
     for reconstituting domain objects in a valid state. Because reconstitutions
     should be delegated down the hierarchy to refined implementations, 
     newrow_obj() (createEntity()) method has been declared abstract.


namespace ModelMapper;
use LibraryDatabaseDatabaseAdapterInterface;
abstract class A bstractDataMapper


5. Set of concrete mappers that will deal with blog posts, comments, and u sers :
   1. Post_db_intf and class Post_db extends A bstractDataMapper implements Post_db_intf
      namespace ModelMapper;
      use ModelPostInterface;
      interface PostMapperInterface

      namespace ModelMapper;
      use LibraryDatabaseDatabaseAdapterInterface,
          ModelPostInterface,
          ModelPost;
      class PostMapper extends AbstractDataMapper implements PostMapperInterface

   2. Comment_db_intf and class Comment_db extends A bstractDataMapper implements Comment_db_intf
      namespace ModelMapper;
      use ModelCommentInterface;
      interface CommentMapperInterface

      namespace ModelMapper;
      use LibraryDatabaseDatabaseAdapterInterface,
          ModelCommentInterface,
          ModelComment;
      class CommentMapper extends A bstractDataMapper implements CommentMapperInterface

      CommentMapper class behaves similar to its sibling PostMapper. It asks for a user mapper in the constructor, so that a specific comment can be tied up to the corresponding commenter. Considering the easy-going nature of CommentMapper, let’s define another which will handle users:

   3. User_db_intf and class User_db extends A bstractDataMapper implements User_db_intf
      namespace ModelMapper;
      use ModelUserInterface;
      interface UserMapperInterface

      namespace ModelMapper;
      use ModelUserInterface,
          ModelUser;
      class UserMapper extends AbstractDataMapper implements UserMapperInterface



Post_db extends its abstract parent and injects in the constructor a comment mapper (still undefined), in order to handle in sync both posts and comments without revealing to the outside world the complexities of creating the whole object graph.

Comment_db class behaves quite similar to its sibling Post_db. In short, it asks for a user mapper in the constructor, so that a specific comment can be tied up to the corresponding commenter.


Mapping the Blog’s Domain Objects to and from the DAL
*****************************************************
Mappers’ APIs do the actual hard work and HIDE UNDERLYING DB FROM MODEL. This ability, though, is best appreciated from app. layer’s perspective. Let’s wire up all the mapper graphs together:


*/






/*
************************* 33333 **********************
https://www.sitepoint.com/community/t/would-you-agree-this-is-the-definition-of-a-php-framework/191138
If you have to write your own code to call the framework components, then it is not a framework, it is a library. A “true” FRAMEWORK IS MINI-APPLICATION TO GENERATE AND RUN YOUR APP COMPONENTS.

Eg templating libraries to deal with creating markup, image libraries...

Framework brings together all (or most) of the common functionality needed to build an app
  - usually providing a more consistent API 
  - and often some of the boilerplate code to wire components together
  - GENERATE AND RUN YOUR APP COMPONENTS fw definition is more definition of a Rapid Application Development (likely where Radicore gets its name) RAD framework, which is a PARTICULAR KIND OF FRAMEWORK, some of which allow u sers to build (or, more accurately, customize) an application via a GUI WITHOUT HAVING TO KNOW HOW TO PROGRAM. Of course, the apps you can build with such a framework are limited by the supplied components. I doubt you would be able to build an online image editing app, for example, using Radicore.

--------------------------------------------
What is SW fw (Software framework)
--------------------------------------------

- provides a STANDARD WAY TO BUILD and deploy applications

- is abstraction in which SW providing GENERIC FUNCTIONALITY can be selectively applied / changed
  by additional user-written code, thus providing application-specific SW 

- is universal, REUSABLE SW environment that provides particular functionality as part of a larger SW platform to facilitate development of SW applications

- key distinguishing features that separate SW fw from SW libraries
  -----------------------------------------------------------------
    - IoC (INVERSION OF CONTROL) is key difference to a library:
      IoC is about who initiates control messages - DOES YOUR CODE CALL INTO A FW,
      or does it plug something into a framework, and then the framework calls back?
      Hollywood principle “Don’t call us, we’ll call you (details).”
      Eg game knows when a player can make decisions and prompts the player 
      accordingly, rather than the player making the decision.

      Unlike in (set of) libraries intended to provide reuse
             or in normal user apps, CODE FLOW (OF CONTROL MESSAGES) IN SW FW
             IS DICTATED BY SW FW, not by the caller method

      If you’re using a library, objects and methods implemented by the library
      are instantiated and invoked by your custom app.
      You need to know which objects to instantiate / call. 

      If you’re using a framework, you implement objects and methods 
      that are custom to your app and they are instantiated and invoked by fw.
      Fw defines the flow of control for app -  embodies some abstract design,
      with more behavior built in. In order to use it you need to insert 
      your behavior into various places in the framework either by subclassing 
      or by plugging in your own classes. Fw code then calls your code at these points.

      Term IoC was getting overloaded with different meanings - was the reason
      Fowler coined the term DIP (DEPENDENCY INVERSION PRINCIPLE - EARLY '90s).
      About libraries vs fws, inversion he’s talking about is Hollywood principle
      “Don’t call us, we’ll call you (details).”
      https://martinfowler.com/articles/dipInTheWild.html 21 May 2013
          Inversion is BOTTOMS UP DESIGN - reversal of direction in TOP-DOWN DESIGN : 
          high-level design described by smaller parts 
          and therefore it directly depends on them.
          Eg business requirement of reporting on energy savings depends on 
          gathering data, which depends on executing Sql. Dependencies follow
          how the problem is decomposed. The more detailed something is, 
          the more likely it will change. We have a high-level idea depending 
          on something that is likely to change.

      In 2004, Martin Fowler published an article on Dependency Injection (DI) 
      and Inversion of Control (IoC) . Is the DIP the same as DI, or IoC?
      No, but they play nice together. When Robert Martin first discussed DIP,
      he equated it a first-class combination of the Open Closed Principle
      and Liskov Substitution Principle, important enough to warrant its own name.

      DI is about wiring, IoC is about direction, and DIP is about shape.

      Dependency Injection is about how one object knows about another, dependent object
      (master table does not know about its details which have FK - knowlege about master).
      DI is about how one object acquires a dependency.
      
      IoC is about who initiates the call. If your code initiates a call, it is not IoC, if the container/system/library calls back into code that you provided it, is it IoC.
      
      DIP is about the level of the abstraction in messages sent from your code
      to the thing it is calling. To be sure, using DI or IoC with DIP
      tends to be more expressive, powerful and domain-aligned,
      but they are about different dimensions, or forces, in an overall problem.

      Several examples that all share common thread: raising abstraction level
      of a dependency to be closer to the domain, as limited by system needs.

      Hide DB Behind Something Domain-related
      A repository is a gateway to a conceptual (maybe actual) potentially
      large collection of durable objects. Typical interface might include
      basic CRUD operations (assuming the domain calls for them) but then we'll
      add methods that make sense for the needs of the system.




      Domain analysis is a form of Modeling. A key thing about modeling,
      is that you are only considering details that are important.
      Domain here is limited by some feature set rather than 
      a mythical domain that exists outside of such context.
      In a sense, this is YAGNI applied to domain analysis.

      Not "best practices", but good ideas for a given context
      Design principles
          Should be "violated" sometimes
          Are often conflicting (at odds) with each other
          Often mix together for something even better than when used in isolation
          Often overlap with other ones
      There are no free lunches, all abstractions have a cost

      Like the term "best practices" I wonder if "design principles" even makes 
      sense as a nikname (moniker = often a shortened name). 
      In the case of the SOLID principles, I think of them more as up front ideas
      that I often come back to due to familiarity. I often fall back into
      the basics like COHESION and COUPLING, adding another level of indirection.
      By calling something a principle, when I'm pragmatic I will probably 
      Preferable is to REPLACE "PRINCIPLE" WITH GUIDELINE.

      Whether we call something a principle or a guideline, the ability to make
      an informed decision to disregard a design principle (a so-called Journeyman
      behavior according to The Seven Stages of Expertise in Software
      http://www.wayland-informatics.com/The%20Seven%20Stages%20of%20Expertise%20in%20Software.htm),
      is a good place to strive towards.




      DIP like SOLID (five design principles intended to make software designs more
      understandable, flexible and maintainable) is simple to state but deep
      in its application. SOLID is subset of many principles stated by Robert C. Martin.
        1. Single responsibility principle - class should only have single r.
           that is, only changes to one part of the software's specification
           should be able to affect the specification of the class.
        2. Open–closed principle SW entities... should be open for extension,
           but closed for modification.
        3. Liskov substitution principle - Objects in a program should be 
           replaceable with instances of their subtypes without altering
           the correctness of that program. See also design by contract.
        4. Interface segregation principle - Many client-specific interfaces
           are better than one general-purpose interface.
        5. Dependency inversion principle - One should "depend upon abstractions,
           [not] concretions

        See also https://en.wikipedia.org/wiki/SOLID :
          Code reuse
          Inheritance (object-oriented programming)
          Package principles
          DRY Don't repeat yourself
          GRASP (object-oriented design, not related to the SOLID design principle)
             General Responsibility Assignment Software Patterns (or Principles).
             Guidelines for assigning responsibility to classes and objects in OO Design.
          KISS principle (keep it simple, stupid - minimalist concept)
          YAGNI (You aren't gonna need it - šta æe vam to npr excell a ne pdf izvještaji)
               - preprogramiravanje i preprojektiranje.
                Always implement things when you actually need them,
                never when you just foresee that you need them.
                YAGNI is a principle of XP (extreme programming),
                type of agile software development.
                https://en.wikipedia.org/wiki/Extreme_programming


    - HAS DEFAULT BEHAVIOR: must be some useful behavior and not a series of no-ops.

    - NON-MODIFIABLE FW CODE: u sers should not modify SW fw code but can extend it

    - EXTENSIBILITY: can be extended by the user usually by selective overriding
      or specialized by user code to provide specific functionality

Component  = Module like Oracle Forms .fmb
---------
- tight group of related classes tasked with accomplishing a single task.
- components should be independent
- should SHARE A NAME SPACE so their classes don’t need to make use statements
  to address each other.
A task too small for a component is likely going to fall to a single class.

Symfony’s HttpFoundation is a good example - providing a basic I/O framework.
It’s not just used by Symfony, but also by Drupal 8, Laravel and Silex (that I know of).

Packages or Bundles
-------------------
Packages are groups of related components. Twig is one example. Unlike a component
which is usually a more or less drop it in decision, Packages tend to have more
far reaching effects on the application since taking advantage of them will
require some forethought and outside code will need to be aware of their API.

The smallest frameworks and the largest packages is a very blurry line,
frameworks style themselves to be more complete solutions than packages tend to be.

Frameworks
----------
Frameworks provide a road map to solving a particular type of problem. There are
- general purpose frameworks - Symfony
- frameworks devoted to small scale websites - Silex
- and everywhere in between

What makes Frameworks distinct from packages is they:

Have a distinct over arching paradigm, either Model-View-Controller or Model-View-Presenter
Have components and packages to implement the areas of that paradigm.
Have a configuration methodology set up in PHP or non-PHP files, usually XML or INI or YAML.

Largest frameworks are almost indistinguishable from apps and are ready to go from install,
but the distinguishing line here is whether a non-programmer can be expected
to set the code up and get it running. If not then, no matter how large 
and featured it is, it’s still a framework, not an app.

More framework can do, harder it is to customize it. This isn’t always true though,
and it also depends on what area of the app is being customized.
The best frameworks tolerate having their components and packages switched out
though the incoming packages will usually need a wrapper of some sort especially
if the interface in that area hasn’t been standardized.

Apps
----
If a non-programmer can be expected to install and configure the app
without touching a single line of code then it’s an App.

Drupal 8 is one example, and a rather huge one at that.
Apps may or may not have further customization possible, most popular ones have.
The smaller apps out there can be smaller than some frameworks.

The distinctive feature of an app is INSTALLER CODE that
- creates DB
- writes config file
- overall automates the setup process for a non-programmer user
Frameworks don’t have these though they might have tools for handling some parts
of the install process, like creating blank model classes, route files or the like.

Increasingly in the PHP world the leading applications bring together
components and packages from various vendors.
The only major PHP project that doesn’t anymore is WordPress which can get away
with this largely due to its marketshare - even then I’ve seen Wordpress plugins
make use of component libraries. Given time even Wordpress will probably evolve
over, though it’s going to have to get rid of its horrid “The Loop” to do so.



************************* 44444 **********************
http://blog.cleancoder.com/uncle-bob/2014/05/08/SingleReponsibilityPrinciple.html
08 May 2014 by Robert C. Martin (Uncle Bob)

Breaking up a large piece of code
=================================
into snippets : “sections” “modules” or “classes”.

Code is not responsible for bug fixes or refactoring but programmer is.

To isolate your modules from the complexities of the organization,
ee design your systems such that each module is responsible (responds to)
the needs of just that one business function. :

SRP (SINGLE RESPONSIBILITY PRINCIPLE) is about people
                (single person or tightly coupled group of people
                 representing a single narrowly defined business function)
who request method changes (many cooks spoil soup).

Uncle Bob is saying that SRP has replaced SoC (SEPARATION OF CONCERNS) 
because SRP now includes ideas of Coupling and Cohesion which SoC did not.

Ee:
Gather together the things that CHANGE FOR THE SAME REASONS (PEOPLE !).
Separate those things that change for different reasons.
This is just another way to define cohesion and coupling. 
We want to increase the cohesion between things that change for the same reasons,
and we want to decrease the coupling between those things that change for different reasons.

Remember that the reasons for change are people. It is people who request changes.
And you don’t want to confuse those people, or yourself, by mixing together 
code that many different people care about for different reasons.

This is the reason we SEPARATE CONCERNS (relevant things - responsibilities).
                 Concern can be as general as details of HW the code is being 
                 optimized for, or as specific as name of a class to instantiate.
  - we do not put SQL in JSPs
  - we do not generate HTML in the modules that compute results
  - business rules should not know the database schema

Eg :
public class Employee {
  public Money calculatePay(); //how much particular employee should be paid
  public void savePay(); //stores data managed by Employee object onto enterprise DB
  public String reportHours(); //returns string worked_number_of_hours
}
CEO = chief executive officer = chief operating officer = managing director
    =corporate executive responsible for the operations of the firm; reports to a board of directors; may appoint other managers (including a president)
Reporting to that CEO are C-level executives eg : 
CFO = responsible for controlling the FINANCES of the company eg for calculatePay()
COO = responsible for managing the OPERATIONS of the company eg for reportHours()
CTO = responsible for the TECHNOLOGY infrastructure and development eg for savePay()

3-Tier Architecture - separating GUI logic, business logic and database logic
is sufficient to satisfy SRP. 


Classes contain one method each, and each method contains one line of code :
  - broken encapsulation
  - low cohesion
  - high coupling
SRP == SoC + Coupling + Cohesion





http://github.com/webengfhnw/WE-CRM - bootstrap 3





// How to consume M : If we were going to build a NAIVE BLOG APP (all of its object graphs reside all the time in memory and don’t need to be persisted ee commited in DB, sent to web service...), there would be no need to create mapping layer :

// 5TH LAYER : PRESENTATION - Graphs in question can be easily decomposed back through a skeletal view :
// ************************
// ************************
// Domain Model is most glaring (shining, blinding) example of FAT MODELS/SKINNY CONTROLLERS mantra in action. Having all emphasis (significance) placed on business logic, controllers are diminished to the realm of simple mediators between the model and the user interface.

//Implementation didn’t require to tie up M to any form of persistence infrastructure, therefore M is an easily portable and scalable creature!

//Does this mean that a Domain Model is the panacea (cure, remedy) for all the flaws (imperfection, fault, defect) that DB Model exposes behind the scenes? In a sense it is, even with some caveats (limit, restrict, caution). Biggest caveat is the HASSLE OF HAVING TO MAP DOMAIN OBJECTS BACK AND FORWARD TO THE PERSISTENCE LAYER (DB, WEB SERVICE) - help third-party ORM like Doctrine, RedBeanPHP.

//Choosing between a prepackaged DATA MAPPER or a custom one is matter of personal requirements and taste. Jean Paul Sartre said once, “men are condemned (doomed, sentenced, strong disapproval) to be free”. So, use your freedom consciously and pick up the MAPPING LIBRARY that suits your needs best.

//Layer that dumps the previous blog posts to screen - HTML native template containing few PHP loops:
include_once 'tbl.php' ;
//In next article, DEVELOPING A CUSTOM MAPPING LAYER TO DEMONSTRATE HOW TO TRANSFER DATA M <--> DB.

//Symfony 2.x, Aura, and even Zend Framework don't provide users with a BASE MODEL UP FRONT (or worse, provide the INFAMOUS (UNFAVOURABLY) DATABASE MODEL), hopefully we’ll see in the near future more advocates of rich Domain Models. In the interim, it's pretty healthy to take an in-depth look at them and see how to implement a trivial one from scratch.



*/
