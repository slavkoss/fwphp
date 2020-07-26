<?php declare(strict_types=1);
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\01workshop\web\index.php
//http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01workshop/web/
$ViewData = [
  'title'    => 'Workshop module',
  'sitePath' => 'J:\\awww\\www\\',
  'siteUrl'  => 'http://dev1:8083/',
  'moduleRelPath' => '/fwphp/glomodul/z_examples/02_mvc/01workshop/web/',
  'modulePath'    => 'J:\\awww\\www\\fwphp\\glomodul\\z_examples\\02_mvc\\01workshop\\',
];
require_once __DIR__ . '/../autoload.php';

session_start();
                 //http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01workshop/web/index.php/login?foo=bar,then $_SERVER['PATH_INFO'] wouldcontain /login
                //echo '<br />$_SERVER[\'PATH_INFO\']=' . $_SERVER['PATH_INFO'] .'<br />' ;

$mainTemplate = new Glo_template('modulehome.php'); // \Components\Template...

$router = new Router(); // \Components\Router()
if ($handler = $router->getHandler()) {
  $content = $handler->handle();
  if ($handler->willRedirect()) {
      return;
  }
  $ViewData['content'] = $content;
  $ViewData['title']   = $handler->getPageTitle();
}

echo $mainTemplate->render($ViewData);
