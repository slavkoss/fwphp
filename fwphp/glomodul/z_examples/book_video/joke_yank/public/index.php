<?php
// http://dev1:8083/fwphp/glomodul/z_examples/01_php_bootstrap/jokeyank/public/
// see https://github.com/spbooks/phpmysql6/tree/Final-Website
try {
  include __DIR__ . '/../includes/autoload.php';
  
  //REQUEST_METHOD=GET
  //$route=module_relpath=fwphp/glomodul/z_examples/01_PHP_bootstrap/jokeyank/public/
  //REQUEST_URI=/fwphp/glomodul/z_examples/01_PHP_bootstrap/jokeyank/public/?aaa
  $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
          echo '<pre>';
          echo '<br />REQUEST_METHOD='; print_r($_SERVER['REQUEST_METHOD']); 
          echo '<br />REQUEST_URI='; print_r($_SERVER['REQUEST_URI']); 
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
