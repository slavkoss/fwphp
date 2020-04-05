<?php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5 !

//Fatal error: Class Hello may not inherit from final class (Hello_final) 
//final //means may not be inherit (have child class)
class Hello_extended{ //was foo
  //final //means may not be overriden by method in child class
  public function sayHello(){
    echo 'Hello World';
  }
}