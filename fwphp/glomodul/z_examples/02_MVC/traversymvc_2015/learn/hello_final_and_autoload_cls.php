<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_MVC\traversymvc\learn\hello_final_and_autoload_cls.php
//FUNCTIONAL eg B12phpfw\, NOT POSITIONAL eg : B12phpfw\zinc\ver5 ! :
namespace B12phpfw ;
$vendor_namesp_prefix = 'B12phpfw' ;
//B12phpfw\ is also web server docroot eg J:/awww/www/ !! - see below str_replace
//but is SAME IN ANY SCRIPT IN ANY DIR, so it is FUNCTIONAL NAMESPACE

spl_autoload_register(
  function($namespaced_class_name)
  {
    global $vendor_namesp_prefix ;
    $cls_script_path = str_replace(
        $vendor_namesp_prefix.'\\' // B12phpfw\  is  web server docroot eg J:/awww/www/ !! :
      , __DIR__ .'/'           //new needle
      , $namespaced_class_name //haystack
     ) .'.php' ;

    include $cls_script_path ;
  }
);

$parent = new Hello_extended;
$child  = new Hello_extends;

$child->sayHello();