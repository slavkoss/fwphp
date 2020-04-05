<?php
/*
 * Author: Dawid Yerginyan   2017-01-18     NO NAMESPACES !!!!!!!!!
 * https://github.com/DawidYerginyan/simple-php-mvc
 *
 * J:\awww\www\fwphp\glomodul\z_examples\02_mvc\simple\index.php
 * http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/simple/
 */

require __DIR__ . '/core/app.php';
//define URI, WS_URL, MODULEURL :
$app = new App();
//MODULEDIR_PATH . '/core/classes/'.$class.'.php' or '/core/helpers/' :
$app->autoload();

$app->config();

//$app->start();


/*
namespace Foobar;
class Foo {
    static public function test($name) { print '[['. $name .']]'; }
}
spl_autoload_register(__NAMESPACE__ .'\Foo::test'); // As of PHP 5.3.0
new InexistentClass;

//The above example will output something similar to:
//[[Foobar\InexistentClass]]
//Fatal error: Class 'Foobar\InexistentClass' not found in ...


decoupling between my namespace hierarchy and my directory structure hierarchy
class_exists() : if second arg = true : you will trigger autoloader to load that class
method_exists() trigger the class to be loaded 
use require() and not require_once() : if already loaded the function will not have been called
NO any sophisticated error-handler registered 


https://github.com/doulmi/SimpleMVC - Vue php >= 5.6
https://github.com/nova-framework/build-a-blog
  https://dcblog.dev/mini-course-build-a-blog-with-simple-mvc-framework
https://github.com/nap/SimpleMVC 2012 year  Observer UML, Java using Swing as UI Framework. 

https://github.com/taniarascia/mvc --plain JS
*/
?>