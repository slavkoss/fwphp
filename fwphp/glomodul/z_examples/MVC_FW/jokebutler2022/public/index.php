<?php
// J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\jokebutler2022\public\index.php
// http://dev1:8083/fwphp/glomodul/z_examples/mvc_fw/jokebutler2022/public/
//     BAD IDEA: jokebutler2022 module (dir) in web server docroot J:\awww\www
//Original source code see https://github.com/spbooks/phpmysql7/tree/Final-Website -- not website but module (dir)
include dirname(__DIR__) . '/autoload.php';
//include __DIR__ . '/../includes/autoload.php';

//Part of URL below web server docroot user is : /fwphp/glomodul/z_examples/mvc_fw/jokebutler2022/public/
//   ltrim removes leading /
//   strtok removes query string (question mark and everything after it).
//          Eg takes ...joke/edit?id=4 and converts it to just ...joke/edit
//$uri = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?'); 
$uri_arr = explode('?', ltrim($_SERVER['REQUEST_URI'], '/')); 
//$uri = $uri_arr[0] ; 
$urlqry = $uri_arr[1] ?? '' ; // same as 'joke/home'

$jokeWebsite = new \Ijdb\JokeWebsite;
$entryPoint = new \Ninja\EntryPoint($jokeWebsite);
//routing ($urlqry parts) and dispatching (run class method) :
$entryPoint->run($urlqry, $_SERVER['REQUEST_METHOD']);