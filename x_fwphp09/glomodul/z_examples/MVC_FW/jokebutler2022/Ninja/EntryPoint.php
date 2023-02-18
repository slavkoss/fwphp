<?php
namespace Ninja;

class EntryPoint {
    public function __construct(private \Ninja\Website $website) {
    }

     public function run(string $urlqry, string $method) {
        try {
            //$this->checkUri($urlqry);  //$this->checkUri($urlqry, $me thod);
            if ($urlqry != strtolower($urlqry)) {
                http_response_code(301);
                header('location: index.php' . strtolower($urlqry));
            }

            uri_is_empty:
            if ($urlqry == '') {
                $urlqry = $this->website->getDefaultRoute();
            }

            $route = explode('/', $urlqry);

            $controllerName = array_shift($route);
            $action = array_shift($route);

            $this->website->checkLogin($controllerName . '/' . $action);

            if ($method === 'POST') {
                $action .= 'Submit';
            }

            $controller = $this->website->getController($controllerName); 

            if (is_callable([$controller, $action])) 
            {
                $page = $controller->$action(...$route);

                $title = $page['title'];

                $variables = $page['variables'] ?? [];
                $output = $this->loadTemplate($page['template'], $variables);
            }
            else 
            {
                //To rewrite URL instead err msg :
                //$urlqry = '' ;
                //goto uri_is_empty ;
                
                // err msg :
                http_response_code(404);
                $title = 'Not found';
                $output = 'Sorry, the page you are looking for could not be found.'
                  .'<pre>'
                  .'<br>$urlqry='.$urlqry
                  .'<br>array $route = explode(\'/\', $urlqry)'
                  .'<br>$controllerName=array_shift($route) = '.$controllerName
                  .'<br>$action=2nd array_shift($route)='.$action
                  .'</pre>'
                ; 
                       /* 
                          // URL THAT MAPS TO A CONTROLLER ACTION is commonly referred to a route,
                          // as it determines the route (code flow) the script takes through the app :
                          $urlqry=jokebutler2022/public/
                          array $route=explode('/', $urlqry)
                          $controllerName=array_shift($route)=jokebutler2022 IS NOT IN $controllers !!
                          $action=2nd array_shift($route)=public

                          // or if jokebutler2022 module is deeper below web server docroot J:\awww\www :
                          $urlqry=fwphp/glomodul/z_examples/mvc_fw/jokebutler2022/public/
                          array $route=explode('/', $urlqry)
                          $controllerName=array_shift($route)=fwphp
                          $action=2nd array_shift($route)=glomodul
                      */
            }
            
        } catch (\PDOException $e) {
            $title = 'An error has occurred';

            $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
        }

        $layoutVariables = $this->website->getLayoutVariables();
        $layoutVariables['title'] = $title;
        $layoutVariables['output'] = $output;
        //
        $layoutVariables['urlqry'] = $urlqry;
        $layoutVariables['controllerName'] = $controllerName ;
        $layoutVariables['action'] = $action ;

        echo $this->loadTemplate('layout.html.php', $layoutVariables);
    }

    private function loadTemplate($templateFileName, $variables) {
        extract($variables);
        ob_start();
        include  __DIR__ . '/../templates/' . 'hdr.php';
        include  __DIR__ . '/../templates/' . $templateFileName;
        include  __DIR__ . '/../templates/' . 'ftr.php';
        return ob_get_clean();
    }

    /*private function checkUri($urlqry) {
        if ($urlqry != strtolower($urlqry)) {
            http_response_code(301);
            header('location: /' . strtolower($urlqry));
        }
    } */
}

/*
  J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\jokebutler2022\Ninja\EntryPoint.php (4 hits)
	Line   5:     public function __c onstruct(private \Ninja\Website $website) {
	Line   8:      public function r un(string $urlqry) {
	Line  86:     private function l oadTemplate($templateFileName, $variables) {
	Line  95:     private function c heckUri($urlqry) {
*/