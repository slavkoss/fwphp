<?php
spl_autoload_register(
  function($nsclsname) { // 'JokeModule\\' . 
    $clsscript = substr($nsclsname,11) . '.php'; 
    //$parts = explode('\\', $nsclsname);
    //$parts[0] = $parts[0] == 'JokeSite' ? 'Model' : $parts[0];
                  echo 'spl_autoload_register '. __FUNCTION__ . ' fn SAYS : ';
                  echo '<pre>nsclsname='; print_r($nsclsname); echo '</pre>';
                  echo '<pre>clsscript='; print_r($clsscript); echo '</pre>';
                  //echo '<pre>parts='; print_r($parts); echo '</pre>';
    //require implode(DIRECTORY_SEPARATOR, $parts) . '.php'; // '../' . 
    require $clsscript ; //remove $ns\
});

$ns = 'JokeModule';

require 'dbconparams.php'; // DB conn params
                 //echo '<pre>parts='; print_r('aaaaaaaaaaaa'); echo '</pre>';
//$pdo = new \Pdo('mysql:host=v.je;dbname=' . DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo = new \Pdo(
     'mysql:host=localhost;dbname=' . DB_SCHEMA, DB_USER, DB_PASS
   , [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$route = $_GET['route'] ?? '';

if ($route == '') {                  // R e a d t b l  (h o m e  p a g e)
  $nsclsname = $ns .'\\'. 'Tbl_mdl' ;
  $model = new $nsclsname($pdo); // $model = new \JokeSite\JokeList($pdo);
  $nsclsname = $ns .'\\'. 'Tbl' ;
  $view = new $nsclsname();  // $view = new \JokeList\View();
}

else if ($route == 'filterList') {    // R e a d t b l  (F i l t e r  or sort)
  $nsclsname = $ns .'\\'. 'Tbl_mdl' ;
  $model = new $nsclsname($pdo); //$model = new \JokeSite\JokeList($pdo);

  $nsclsname = $ns .'\\'. 'Tbl' ;
  $view = new $nsclsname();  // $view = new \JokeList\View();

  $nsclsname = $ns .'\\'. 'Tbl_ctr' ;
  $controller = new $nsclsname();  //$controller = new \JokeList\Controller();

  $model = $controller->filterList($model);
}



else if ($route == 'edit') {         // U p d a t e  r o w
  $nsclsname = $ns .'\\'. 'Frm_mdl' ;
  $model = new $nsclsname($pdo); //$model = new \J okeSite\J okeForm($pdo);

  $nsclsname = $ns .'\\'. 'Frm_ctr' ;
  $controller = new $nsclsname();  //$controller = new \J okeForm\Controller();

  $model = $controller->edit($model);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = $controller->submit($model);
  }

  $nsclsname = $ns .'\\'. 'Frm' ;
  $view = new $nsclsname();  // $view = new \J okeForm\View();
}

else if ($route == 'delete') {       // D e l e t e  r o w
  $model = new \JokeSite\JokeList($pdo);
  $controller = new \JokeList\Controller();

  $model = $controller->delete($model);

  $view = new \JokeList\View();
}

// ------------------
else {
  http_response_code(404);
  echo 'Page not found (Invalid route)';
}


echo $view->output($model);


/*
2019.03.10, Tom Butler  https://r.je/immutable-mvc-crud-application
See PHP & MySQL: Novice to Ninja, 6th Edition by Tom Butler and Kevin Yank
Copyright © 2017 SitePoint Pty. Ltd.

Jokes CRUD (Adding Listing Editing Deleting)
SORTING jokes on the list page newest first or oldest first
SEARCHING for a joke based on a keyword

How to create a completely IMMUTABLE CRUD application using MVC. Using this approach most of the code ends up in the model. This is a good thing! The model could be reused on pages that display as a PDF, JSON for Ajax calls, etc.

This immutable implementation of MVC has some advantages over the mutable version:

1. State is better managed so that the app doesn't suffer from action at a distance where changing an object in one location (in the controller) then causes changes in a seemingly unrelated component (the view)

2. There is less state overall. There are no longer references to the different objects in multiple locations. The controller and view no longer have a reference to the model, they are given an instance to work with at the moment they need it, not before

TODO: implement better router than the big if-else statement we have currently

No use of ORMs, template systems...
Unlike most "MVC" implementations, EACH PAGE HAS OWN C, V AND M.
VIEW FETCHES its own data from the model, model is passed into each controller action.
C, U page for adding/editing which has the actions:
    display empty form & load record into it
    submit form, displaying errors or saving to DB
R, D list page with actions:
    R: filter & sort joke list
    D: joke delete

The reasoing and thought process behind this code is available here: https://r.je/immutable-mvc-crud-application.html 
*/