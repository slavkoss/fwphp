<?php
/*
- Use exceptions instead of error codes
— Use your own exceptions

Small functions advantages (function 5-10 lines, class 10-50-100 lines):
— Easy to understand
- Easy to debug
— Easy to reuse
— Easy to test
- Easy to keep bug free
- Avoid code repetition
— Beautify code
- Separate concepts into their levels of abstraction
- Easy to maintain - emerging property


SRP = Single Responsibility Principle
Function and class should only do one thing (should have only one reason to change) 
- same as Small functions concept.

SOLID is group of 5 programming principles created by Robert C. Martin (uncle Bob) :
- S ingle—responsibility
- O pen—closed
— L iskov substitution
— I nterface segregation
- D ependency inversion




class BrokerﬁdeInput {
  public string sinstrument;
  public int SnumberOfUnits;
  public BigDecimal $stopLoss
  public string stradeType;

}

Some comments are ok

- When you can’t express yourself with code:
//Extract the text between the two title elements
$pattern = "(?i)(<tit1e.*?>)(.+?)()";

- When you want to warn people


class Constants {
  const BUY_IN_STEPS_INITIAL_STOP_LOSS = 1;


Signs that inheritance is plotting against you :
~ You want to inherit more than one class (greedy)
- You feel like you inherit too much
- The abstract world shatters (Dog becomes FoodEeater, BallChaser, MansBestFriend)


Symptoms of bad code :
1. Rigidity - Code is hard to change. Business is scared to ask for things because everything  takes so long.
2. Fragility - When you touch code in one place it breaks in another. Business is afraid to ask for things because the projects breaks everytime you change it.
3. Immobility - You can’t reuse your methods and classes - changes take long time. 
4. Viscosity - It’s hard to do anything because of de design / framework / development environment
I tests run time / deploy time - changes take long time.



What is state in programming and why is it important :
State is prone to bugs.
Keep mutable objects small.












Clean Code Project
- Use TDD
- Always think if your code is easy to understand
- Write small functions and classes
- Respect SRP
- Don’t cross different levels of abstraction
- Give proper names and use the scope rule
— Less than three parameters
- Don’t use boolean or null arguments
— Beautify predicates when appropriate
— Stay away from comments and express yourself in code
— Use only custom runtime exceptions
- Treat objects properly keeping in mind if they are OOP Objects or Data Structure objects.
- Use Composition over Inheritance
- Be on the watch for symptoms of bad code
- Treat state carefully
- Keep your coupling low and your cohesion high
— Try to use command and query separation, tell don’t ask and even the law of Demeter
— Don’t use complex patterns and don’t over-engineer



https://en.wikipedia.org/wiki/James_Martin_(author)
From the 1990s onwards, Martin (1933-2013) lived on his own private island, Agar's Island, in Bermuda. In 2004 Martin donated £60m to help establish The Oxford Martin School.
1976. Principles of Data-Base Management
1985. Diagramming techniques for analysts and programmers. With Carma McClure.
1992. Object-oriented analysis and design.
*/


