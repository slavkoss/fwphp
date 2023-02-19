<?php

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        // call_user_func_array( callable $callback, array $args) : mixed
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$this->request</b>='; print_r($this->request);
                      echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
        $name = $this->request->controller . "Controller"; //glomodulController
        $file = MODULEDIR . 'Controllers/' . $name . '.php';
        require($file);
        $controller = new $name();
        return $controller;
    }

}

/*
$this->request=Request Object
(
    [url] => /fwphp/glomodul/z_examples/MVC_FW/ngrt_MVC_todo/Webroot/
    [controller] => glomodul
    [action] => z_examples
    [params] => Array
        (
            [0] => MVC_FW
            [1] => ngrt_MVC_todo
            [2] => Webroot
            [3] => 
        )

)

$_POST=Array
(
)
*/

?>