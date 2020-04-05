<?php
/**
*  J:\awww\www\fwphp\glomodul\post_category\Db_post_category.php
*/
namespace B12phpfw ;

class Db_post_category //extends Db_allsites
{

    public function __construct($saltLength=NULL)
    {
      /** 
      * NO NEED (COMPLICATED -> CAN HARM) to instantiate parent 
      * (occupy memory with global fn-s and variables) because 
      * methods in this cls use CRUD methods in global $db object
      * which is their parameter !!
      */
        // Call parent constructor to get or create db object
        //parent::__construct(); 
    }

} // e n d  c l s
