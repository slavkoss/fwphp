<?php

class Router
{

    static public function parse($url, $request)
    {
      $requested_relpath = trim(str_replace(QS,'',$url));
      $explode_url1 = explode('/', $requested_relpath);
      $explode_url = array_slice($explode_url1, MODULE_LEVEL);
                  if ('1') {echo '<h4>'. __METHOD__ . ' SAYS: </h4>'
                  . 'MODULE_RELPATH=str_replace("www/index.php", "", $_SERVER["SCRIPT_NAME"]))='.MODULE_RELPATH;
                  echo '<br />MODULE_LEVEL='.MODULE_LEVEL .' // +1 level are method params';
                  echo '<br />'.'MODULE_PATH=str_replace("www/index.php", "", $_SERVER["SCRIPT_FILENAME"]))='.MODULE_PATH ; 
                  //
                  echo '<br />$requested_relpath='.$requested_relpath ;
                  echo '<pre>array_slice($explode_url, '.MODULE_LEVEL.')='; print_r($explode_url) ; echo '</pre>';
                  echo '<pre>$request->params of method ='; print_r(array_slice($explode_url1, 5)) ; echo '</pre>';
                  //echo '<br />ctr $file='.$file ;
                  echo '<br />' ;
                  }
      $request->controller = $explode_url[0];
      $request->action = $explode_url[1]?:'index';
      $request->params = array_slice($explode_url1, MODULE_LEVEL + 1);

    }
}


        /*if ($requested_relpath == "/PHP_Rush_MVC/")
        {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        }
        else
        { */
            //$explode_url = explode('/', $requested_relpath);
            //$explode_url = array_slice($explode_url, 4);