<?php
// J:\awww\www\fwphp\z_not_ongithub\MVC_FW\01inanz\index.php
// http://www.inanzzz.com/index.php/post/07gt/creating-a-simple-php-mvc-or-framework-application-from-scratch
require_once __DIR__.'/app/config.php';
require_once CORE_PATH . 'autoload.php';
 
use Core\Request;
 
$request = new Request($_SERVER, $_POST, $_GET, $_FILES);
 
try {
    $controller = $request->getController();
    $method     = $request->getMethod($controller);
 
    $controller = new $controller;
    echo $controller->$method();

} catch (Exception $e) {
    echo sprintf(
        '<h3>%s</h3><h4>%s</h4><h5>%s:%s</h5>',
        $e->getCode(),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    );
}