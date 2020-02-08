<?php
// http://dev1:8083/fwphp/glomodul/z_examples/01_php_bootstrap/jokeyank/public/
// see https://github.com/spbooks/phpmysql6/tree/Final-Website
try {
  include __DIR__ . '/../includes/autoload.php';
  
  $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
          //   REQUEST_METHOD=GET
          echo '<pre>';
          echo '<br />REQUEST_METHOD='; print_r($_SERVER['REQUEST_METHOD']); 
          //REQUEST_URI=/fwphp/glomodul/z_examples/01_PHP_bootstrap/jokeyank/public/?aaa
          echo '<br />REQUEST_URI='; print_r($_SERVER['REQUEST_URI']); 
          //module_relpath=$route=fwphp/glomodul/z_examples/01_PHP_bootstrap/jokeyank/public/
          echo '<br />$route     ='; print_r($route); 
          echo '</pre>';
  $entryPoint = new \Ninja\EntryPoint(
    $route, $_SERVER['REQUEST_METHOD'], new \Ijdb\IjdbRoutes()
  );

  $entryPoint->run();

}
catch (PDOException $e) {
  $title = 'An error has occurred';

  $output = 'Database error: ' . $e->getMessage() . ' in ' .
  $e->getFile() . ':' . $e->getLine();

  include  __DIR__ . '/../templates/layout.html.php';
}
