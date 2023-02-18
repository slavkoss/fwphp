<?php
namespace B12phpfw ;
//include_once("Book_mdl.php");

class Home_ctr {
   public $model;

   public function __construct()
   {
        $this->mdl = new Book_mdl();
   }

   public function invoke()
   {
      switch (true) {
        case !isset($_GET['book']): //show list of all books
          //http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/02L2adlian_mvc_2009/
          $books = $this->mdl->getBookList();
          include 'book_tbl.php';
          break;
        default:                   // show requested book
          //http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/02L2adlian_mvc_2009/index.php?book=Jungle%20Book
          $book = $this->mdl->getBook($_GET['book']);
          include 'book_add_edit_frm.php';
          break;
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