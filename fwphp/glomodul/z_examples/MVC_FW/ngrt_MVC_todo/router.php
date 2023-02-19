<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/PHP_Rush_MVC/")
        {
            $request->controller = "posts";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 5); // 5th elem. till end
            $request->controller = $explode_url[0]; //$explode_url[0]
            $request->action = $explode_url[2]??'index' ; //was 1
            $request->action = ($request->action === '') ? 'index' : $request->action ;
            $request->params = array_slice($explode_url, 2);
        }


                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<br><b>$url</b>='; print_r($url);
                      echo '<br><b>$explode_url</b>='; print_r($explode_url);
                      echo '<b>$request</b>='; print_r($request);
                    echo '</pre>'; }
    }



}
?>