<?php
function autoloader($className) {
	$fileName = str_replace('\\', '/', $className) . '.php';

	$file = str_replace('\\', '/',dirname(__DIR__)) . '/classes/' . $fileName;
                //function prf($n1, $v1){
                echo '<pre>'.'$file'.' ='; print_r($file); echo '</pre>';
	
	include $file;
}

spl_autoload_register('autoloader');

/*
Notice: Undefined index: jokeyank/public/ in J:\awww\apl\dev1\jokeyank\classes\Ninja\EntryPoint.php on line 45

$file =J:\awww\apl\dev1\jokeyank\classes\Ninja\EntryPoint.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ijdb\IjdbRoutes.php --- IMPLEMENTS \Ninja\Routes
   here is public function getRoutes(): array {... which contains :
          '' => [
          //'jokeyank/public/' => [  WE NEED THIS !!!
            'GET' => [
              'controller' => $jokeController,
              'action' => 'home'
            ]
          ]
$file =J:\awww\apl\dev1\jokeyank\classes\Ninja\Routes.php  --- IS INTERFACE
$file =J:\awww\apl\dev1\jokeyank\classes\Ninja\DatabaseTable.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ninja\Authentication.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ijdb\Controllers\Joke.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ijdb\Controllers\Register.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ijdb\Controllers\Login.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ijdb\Controllers\Category.php
$file =J:\awww\apl\dev1\jokeyank\classes\Ijdb\Entity\Author.php

$file =J:/awww/apl/dev1/jokeyank/classes/Ninja/EntryPoint.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ijdb/IjdbRoutes.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ninja/Routes.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ninja/DatabaseTable.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ninja/Authentication.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ijdb/Controllers/Joke.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ijdb/Controllers/Register.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ijdb/Controllers/Login.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ijdb/Controllers/Category.php
$file =J:/awww/apl/dev1/jokeyank/classes/Ijdb/Entity/Author.php
*/