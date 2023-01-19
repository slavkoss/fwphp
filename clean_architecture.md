### Interface IDBcls for shared db adapters Mysqlcls DBcls1, Oraclecls DBcls2... and module db adapters
Same module db adapter for any shared db adapter.    
IDBcls is list of : method1(parameters1), method2(parameters2)....  contains cc, rr, uu, dd methods.      
IDBcls is abstraction of any DB table CRUD row class.       
```php
<?php
interface IDBcls {
  // IDBcls is list of : method1(parameters1), method2(parameters2)....  contains cc, rr, uu, dd methods
  // IDBcls is abstraction of any DB table CRUD row class
  public function cc(); // Create any DB table row method
  public function rr(); // Read any DB table row method
  ...uu, dd
}

class Mysqlcls implements IDBcls {
    // ***********************
    // shared db adapter 1
    // ***********************
    public function rr() {
    ?>
          <br>rr method said : this txt we can load from some <b>Mysql DB table row</b>
    <?php
    }
}

class Oraclecls implements IDBcls {
    // shared db adapter 2
    public function rr() {
    ?>
        <br>rr method said : this txt we can load from some <b>Oracle DB table row</b>.
    <?php
   }
}

/* interface IRepcls { // also possible
public function usesrr(IDBcls $db);
} */

//class Repcls implements IRepcls {
class Repcls {
    //  module db adapter knows interface ee list of method1(parameters1)...
    // DOES NOT KNOW classess which implement interface
    public $db ;

    public function __construct(IDBcls $db) {
       $this->db = $db;
    }
    public function rr() {
       $this->db->rr();
    }
}

// Client
$mysql = new Mysqlcls();
// Repcls knows interface ee list of method1(parameters1)... DOES NOT KNOW Mysqlcls !
$report_mysql = new Repcls($mysql); 
$report_mysql->rr();

$ora = new Oraclecls();
// Repcls knows interface ee list of method1(parameters1)... DOES NOT KNOW Oraclecls !
$report_ora = new Repcls($ora); 
$report_ora->rr();

//output :
//rr method said : this txt we can load from some Mysql DB table row
//
//rr method said : this txt we can load from some Oracle DB table row. 

```




<br><br>

### SOLID PRINCIPLES
is group of 5 programming principles created by Robert C. Martin (uncle Bob) :      

1. Single-responsibility. [**SRP**](https://dev.to/tamerlang/understanding-solid-principles-single-responsibility-principle-523j) class should only have one reason to change, ee **class should do only one thing **- every class is owned exactly by one entity - **person who 
	manipulates data has his class methods**. It is people who request changes. And you don’t want to 
	confuse those people, or yourself, by mixing together the code that many 
	different people care about for different reasons. 

2. **Open-closed**
	Software entities (classes, modules, functions, etc.) should be open for 	extension, but closed for modification - 100% ready to be used by other 	classes - its interface is clearly defined and won’t be changed in the future  - keep the existing code from 	breaking when you implement new features - **do not modify code, but extend it**. Create a subclass and override parts of the original 	class that you want to behave differently or you can extend the 	functionality and add your own methods. You'll achieve your goal but also 	won't break the existing functionality of the original class. If you see a bug then go ahead and fix it; don't create a subclass for it. </li>

3. [**Liskov substitution**](https://dev.to/tamerlang/understanding-solid-principles-liskov-substitution-principle-46an) 
   In object-oriented programming, subclasses should be able to substitute their parent classes without breaking any client functionality. 
	
     1. **Parameter types** in a method of 	a class should match or are more abstract than parameter types in the superclass. Eg feed(Dog d) : we created a subclass that overrode feed(Dog d) so that it can feed any animal (a superclass of dogs): feed(Animal d) - method can feed all animals, so it can still feed any cat passed by the 	client.
     2. Inverse to the requirements of the parameter type :  **return type** in a method of a subclass should match or be a subtype of the return type in the superclass.
     ...

4. **Interface segregation (separation) 
	**no client should be forced to depend on methods it does not use. Ee  interface shouldn't force a class to implement methods that it won't be using. Do I have a bunch of one method interfaces? No. SOLID principles shouldn't be followed to the teeth, eg PizzaIface fn orderPizza($qty) class 	PizzaOrder, DrinkIface...


5. [**Solid principles Dependency inversion**](https://dev.to/tamerlang/understanding-solid-principles-dependency-inversion-1b0f)
		High-level modules should not import anything from low-level modules; they should **both depend on abstractions**. Abstractions should not depend on details.   
  Details should depend upon abstractions.     

  Code that doesn't follow this principle can be **too coupled**, 
  hard to manage the project.    

  Report class does not depend concretely on the database class (details) but 
  on its abstraction DatabaseInterface. This approach also follows the **open-closed principle** because **to use any new DB we don\'t have to change Report class**. We just need to add a new database class that implements the 
  DatabaseInterface.    

  For me, it doesn't matter whether **car engine** (details) has changed, I still should be able to drive my car the same way. <br>Details should depend upon abstractions, same as high-level modules (brakes , reports) - I would not want an **engine that causes the brake to double the speed**. 




<br><br>
## Clean Code Project - readable code
"Any fool can write code that a computer can understand. Good programmers write code that humans can understand." - Martin Fowler        
<a href="https://www.freecodecamp.org/news/clean-coding-for-beginners/">
https://www.freecodecamp.org/news/clean-coding-for-beginners/</a>       

<a href="https://github.com/abiodunjames/Awesome-Clean-Code-Resources">
https://github.com/abiodunjames/Awesome-Clean-Code-Resources</a>       

<br>

1. Always think if your code is **easy to understand**            
2. Write small functions and classes, respect **KISS** principle = Keep	It Simple, Stupid, respect       
	  **SRP** = Single Responsibility Principle is same as Small functions concept. 
		Function and class should only do one thing (should have only one reason to change).        
    **DRY** (Don't repeat 	yourself) principle is a more specific version of KISS - functions in clean code should       
    **only do one thing within the overall system**.      
	The opposite of DRY is **WET** (We Enjoy Typing). Code is WET when there are **unnecessary repetitions - redundancies** in the code.
  
   Small functions advantages (**function 5-10 lines, class 10-50-100 	lines**):       
	    1. easy to understand, maintain, debug, reuse, test, keep bug free, beautify code. 
	    2. avoid code repetition (**code redundance**), but also use SRP to avoid	**too coupled code**, hard to manage the project 	     
          (complicated, nonunderstandable if-commands).
	    3. Separate concepts into their **levels of abstraction - layers**.

3. Don't cross different levels of abstraction. 
     1. Typically the data that crosses the boundaries is simple data structures.           
     2. You can use basic structures or simple Data Transfer objects if you like.           
     3. Or the data can simply be **arguments in function calls**

4. Give **proper names** and use the scope rule          
5. Stay away from **comments** and express yourself in code. Some comments are ok :
     1. When you can't express yourself with code use regular expression eg //extract the text between the two title elements        
     2. When you want to warn people    
6. Less than three parameters          
7. **Don't use	boolean or null arguments**        
8. Beautify predicates when appropriate           
9. Use **only custom runtime exceptions**            
	   1. Use exceptions instead of error codes
	   2.  Use 	your own exceptions        
10. Treat objects properly keeping in mind if they are **OOP Objects or Data Structure objects**.           
11. **Use IS (Composition) over HAS (Inheritance)**  Signs that inheritance is plotting against you :    

     1. You want to inherit more than one class (greed, pohlepa)    
     2. You feel like you inherit too much - The abstract world shatters (Dog becomes FoodEeater, BallChaser, MansBestFriend)    
12. Be on the watch for symptoms of bad code :     
      1. Rigidity - Code is **hard to change**. Business is scared to ask for things because everything takes so long.
      2. Fragility - When you **touch code in one place it breaks in another**.    
         Business is afraid to ask for things	because the    projects breaks everytime you change it. 
      3. Immobility - You **can't reuse your methods and classes** - changes take long time.
      4. Viscosity - It's hard to do anything because of **design / framework / development** environment
      5. tests **run time / deploy time** 	- changes take long time.
13. Treat **state** carefully. What is state in programming and why is it important :
	  State is prone (sklon) to bugs. - Keep mutable objects small.
14. Keep your **coupling low and your cohesion high**  
15. Try to use **command and query separation**, **tell don't ask** and even the **law of Demeter**
16. Don't use **complex patterns and don't over-engineer**


    


<br><br>      
```
<img alt="layers" longdesc="Clean_Architecture.jpg" src="not working on github https://www.base64-image.de/" 
alt="Clean_Architecture_small.jpg" /> 
```

 ![Clean_Architecture_small.jpg](Clean_Architecture_small.jpg)      

**Clean_Architecture.jpg description - levels of abstraction - layers**              
(see <a href="https://github.com/nazonohito51/clean-architecture-sample">
   https://github.com/nazonohito51/clean-architecture-sample</a>)        
             
1. **Entitiess**- 1st (inner) circle - YELLOW.      
    Entities encapsulate **enterprise wide business rules**      
    It doesn't matter so long as the entities could be used by many different applications in the enterprise.        
2. **Use Casess**- 2nd circle (1st outer circle) - HIGHER LAYER - PINK. The software in this layer  contains **application specific business rules**.         
These use cases orchestrate the **flow of data to and from the entitiess**, and direct those entities to use their enterprise wide business rules to achieve the goals of the use case.         
      
3. **Interface Adapters**- 3rd - HIGHER LAYER - GREEN                
    The software in this layer is a set of adapters that  **convert data** from the format most convenient for the use cases and entities.         
     That will wholly contain the MVC architecture of a GUI.          
     The models are likely data structures that are passed from controllers to use cases, and then from use cases to presenters and views.         
      
4. **Frameworks & Driverss** - 4th - HIGHER LAYER - BLUE          
      The outermost layer is generally composed of frameworks and tools such as the **Database**, the Web Framework, etc.          
     
**Dependency Rule **is overriding rule (Glavno pravilo) that makes Clean Code architecture work :           
Source code dependencies can only point inwards :           
1. Nothing in an inner circle can know anything at all about something in an outer circle.           
2. The name of something declared in an outer circle must not be mentioned by the code in an inner circle.               
     We usually resolve this apparent contradiction by using the **dependency inversionn** Principle :             
     High-level modules should not import anything from low-level modules; they shouldd **both depend on abstractionss**.            
     Abstractions should not depend on details.             





<br><br>
<a href="https://en.wikipedia.org/wiki/James_Martin_(author">https://en.wikipedia.org/wiki/James_Martin_(author</a>) 
<br>From the 1990s 
	onwards, Martin (1933-2013) lived on his own private island, Agar's Island, 
	in Bermuda. In 2004 Martin donated £60m to help establish The Oxford Martin 
	School.<br>1976. Principles of Data-Base Management<br>1985. Diagramming 
	techniques for analysts and programmers. With Carma McClure.<br>1992. 
	Object-oriented analysis and design.     
      