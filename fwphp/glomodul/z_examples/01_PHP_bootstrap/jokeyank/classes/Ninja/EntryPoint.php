<?php
namespace Ninja;

class EntryPoint {
  private $route;
  private $method;
  private $routes;

  public function __construct(
       string $route, string $method, \Ninja\Routes $routes
  ) {
    //$this->route = $route;
    $this->route = str_replace('jokeyank/public/','',$route);
    $this->routes = $routes;
    $this->method = $method;
    $this->checkUrl();
  }

  private function checkUrl() {
    if ($this->route !== strtolower($this->route)) {
      http_response_code(301);
      header('location: ' . strtolower($this->route));
    }
  }

  private function loadTemplate($templateFileName, $variables = []) {
    extract($variables);

    ob_start();
    include  __DIR__ . '/../../templates/' . $templateFileName;

    return ob_get_clean();
  }

  public function run() {

    $routes = $this->routes->getRoutes();  

    $authentication = $this->routes->getAuthentication();

    if ( isset($routes[$this->route]['login']) 
         && !$authentication->isLoggedIn()) {
      header('location: /login/error');
    }
    else if ( isset($routes[$this->route]['permissions']) 
      && !$this->routes->checkPermission($routes[$this->route]['permissions'])) {
      header('location: /login/permissionserror');  
    }
    else {
      $controller = $routes[$this->route][$this->method]['controller'];
      //Notice: Undefined index: fwphp/glomodul/help_sw/test/ or jokeyank/public/ in J:\awww\apl\dev1\jokeyank\classes\Ninja\EntryPoint.php on prev.line
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
}