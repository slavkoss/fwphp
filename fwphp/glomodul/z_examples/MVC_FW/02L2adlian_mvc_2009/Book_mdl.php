<?php
namespace B12phpfw ;

// all entities and classes to persist data into the database, 
// and classes encapsulating the business logic :
//include_once("Book.php");
  
class Book_mdl {  
    public function getBookList()  
    {  
      // here goes some hardcoded values to simulate the database  
      return array(  
      "Jungle Book" => new Book("Jungle Book","R. Kipling","Classic book."),  
      "Moonwalker" => new Book("Moonwalker", "J. Walker", ""),  
      "PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")
      );  
    }  
      
    public function getBook($title)  
    {  
        //we use previous fn to get all books and then return requested one.
        // in real life scenario this will be done through db select command  
        $allBooks = $this->getBookList();  
        return $allBooks[$title];  
    }  
      
/*
Model and Entity Classes
========================
Model doesn’t need any presentation. 

Model represents the DATA AND LOGIC OF AN APPLICATION, 
what many calls BUSINESS LOGIC. Usually, it’s responsible for:

   -- CRUD app. data - DB operations, but implementing same operations 
      invoking external web services or APIs is not an unusual at all.
   -- encapsulating app. logic. Most common mistakes are to implement 
      application logic operations inside C or V (presentation) layer.

In our example M is represented by 2 classes: 
    Model class 
    and Book class. 

Book class is an ENTITY CLASS. This class SHOULD BE EXPOSED TO THE VIEW LAYER
and represents format exported by the Model view.
In a good implementation of the MVC pattern 
   -- only entity classes should be exposed by M 
   -- entity classes should not encapsulate any business logic
   -- entity classes solely purpose is to keep data. 
   -- depending on implementation Entity objects can be :
         --- DB tbl
         --- array
         --- xml 
         --- json chunk of data
*/
}  


?>