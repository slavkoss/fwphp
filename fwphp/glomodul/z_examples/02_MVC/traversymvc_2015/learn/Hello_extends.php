<?php
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5 !

class Hello_extends extends Hello_extended{ //was bar
  public function sayHello(){
    echo 'Hello from class Hello_extends extends Hello_extended. 
    <br />This is displayed only if word "final" is commented in class Hello_extended !
    
    <br /><br />********** IF WORD "final" NOT COMMENTED : **********
    <br />If not commented word "final" of cls : "Fatal error: Class Hello_extends may not inherit from final class (Hello_extended) " !
    
    <br />If not commented word "final" of method : "Fatal error: Cannot override final method Hello_extended::sayHello() " !
    ';
  }
}