<?php
namespace Ninja;

class EntryPoint {
  private $route;
  private $method;
  private $routes;

  public function __construct(string $route, string $method, \Ninja\Routes $routes)
  {
    // module_relpath :
    $this->route = $route; //fwphp/glomodul/z_examples/01_php_bootstrap/jokeyank/public/
    $this->method = $method; //GET
    $this->routes = $routes; //new \Ijdb\IjdbRoutes()
    $this->checkUrl();
  }

  private function checkUrl() {
    if ($this->route !== strtolower($this->route)) {
      http_response_code(301);
      header('location: ' . strtolower($this->route));
    }
  }

  public function run() 
  {
    $routes = $this->routes->getRoutes();  
          //echo '<pre>$routes[\'joke/delete\']='; print_r($routes['joke/delete']); echo '</pre>';
          echo '<pre>$routes[\'\']='; print_r($routes['']); echo '</pre>';
    $authentication = $this->routes->getAuthentication();

    if (isset($routes[$this->route]['login']) && !$authentication->isLoggedIn())
    {
      header('location: /login/error');
    }
    else if ( isset($routes[$this->route]['permissions']) 
              && !$this->routes->checkPermission($routes[$this->route]['permissions'])) 
    {
      header('location: /login/permissionserror');  
    }
    else {
      //Undefined index: fwphp/glomodul/z_examples/01_php_bootstrap/jokeyank/public/ :
      $controller = $routes[$this->route][$this->method]['controller'];
      $action = $routes[$this->route][$this->method]['action'];
      $page = $controller->$action();

      $title = $page['title'];

      if (isset($page['variables'])) {
        $output = $this->loadTemplate($page['template'], $page['variables']);
      }
      else {
        $output = $this->loadTemplate($page['template']);
      }

      echo $this->loadTemplate('layout.html.php', ['loggedIn' => $authentication->isLoggedIn(),
                                                   'output' => $output,
                                                   'title' => $title
                                                  ]);

    }

  }


  private function loadTemplate($templateFileName, $variables = []) {
    extract($variables);

    ob_start();
    include  __DIR__ . '/../../templates/' . $templateFileName;

    return ob_get_clean();
  }




}