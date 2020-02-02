<?php
// index.php file
// delegate all requests to  c t r :
    include_once("ctr.php");  
      
    $controller = new Ctr();  
    $controller->invoke();
    
/*
see http://php-html.net/tutorials/model-view-controller-in-php/
scripts : 2009 year http://sourceforge.net/projects/mvc-php/
  http://sourceforge.net/projects/mvc-php/files/mvc.zip/download

Possibilities of MVC pattern are endless. For example different layers can be implemented in different languages or distributed on different machines. 
AJAX applications can implement V layer directly in Javascript in the browser, invoking JSON services. The controller can be partially implemented on client, partially on server…

    advantages of Model View Controller pattern:

    the Model and View are separated, making the application more flexible.
    the Model and view can be changed separately, or replaced. For example a web application can be transformed in a smart client application just by writing a new View module, or an application can use web services in the backend instead of a database, just replacing the model module.
    each module can be tested and debugged separately.
*/
?>