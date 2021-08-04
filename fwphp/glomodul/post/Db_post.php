<?php
/*
*  J:\awww\www\fwphp\glomodul\post\Db_post.php
*/
namespace B12phpfw ;

class Db_post //extends Db_allsites //was Home
{

    public function __construct() //eg '2019-10-05 01:00:00'
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

} // e n d  c l a s s
