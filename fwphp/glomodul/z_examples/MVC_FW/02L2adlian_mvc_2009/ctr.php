<?php
include_once("mdl.php");  
  
class Ctr {  
     public $model;   
  
     public function __construct()    
     {    
          $this->mdl = new Mdl();  
     }   
      
     public function invoke()  
     {  
          if (!isset($_GET['book']))  
          {  
               // no special book is requested, show list of all books  
               $books = $this->mdl->getBookList();  
               include 'book_tbl.php'; 
          } 
          else 
          { 
               // show the requested book 
               $book = $this->mdl->getBook($_GET['book']); 
               include 'book_add_edit.php';  
          }  
     }  
}  



/*
c t r  takes request, 
       parses it, 
       initializes and invokes model
       takes the model response and sends it to the presentation layer
    C is liant between M and V, small framework where M and V are plugged in. 
    C does not know anything about DB or how page is generated. 
    
constructor 
    instantiates a model class 
    when a request is done, C decides which data is required from the model. then it calls M class to retrieve data. 
    then it calls ctrakcmethod passing data coming from the model.
   
*/
?>