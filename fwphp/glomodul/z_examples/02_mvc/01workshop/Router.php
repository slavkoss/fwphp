<?php declare(strict_types=1);
//namespace Components;

//use Handlers\Handler;
//use Handlers\Login;
//use Handlers\Logout;
//use Handlers\Profile;

class Router
{
    public function getHandler(): ?C_gloHandler
    {
        switch ($_SERVER['PATH_INFO'] ?? '/') {
          case '/login': 
            return new C_Login();
          case '/profile':
            return new C_Profile();
          case '/logout':
            return new C_Logout();

          case '/': //echo '<pre>R 222'.'</pre>';
            return null;

          default: //echo '<pre>R 333'.'</pre>';
            return new class extends C_gloHandler {
              public function handle(): string {
                $this->requestRedirect('profile'); // $moduleRelPath . 'index.php'
                //return null; 
                return '';
              }
            };
        }
    }
}



          //echo '<pre>'. __METHOD__ . ' SAYS: <b>$_SERVER[\'PATH_INFO\']='. $_SERVER['PATH_INFO'].'</b></pre>';
      //http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01workshop/web/index.php/login

      //'PATH_INFO'Contains any CLIENT-PROVIDED PATHNAME INFO TRAILING ACTUAL SCRIPT FILENAME BUT PRECEDING QUERY STRING, if available. For instance, if current script was accessed via URL http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/01workshop/web/index.php/login?foo=bar,then $_SERVER['PATH_INFO'] wouldcontain /login
      //http://www.example.com/php/path_info.php/some/stuff?foo=bar,then $_SERVER['PATH_INFO'] wouldcontain /some/stuff
      //'ORIG_PATH_INFO'Original version of 'PATH_INFO' before processed byPHP. 
