<?php
// instantiated in index.php
class Dispatcher
{

    private $request;

    public function dispatch() //$module_towsroot
    {
        $this->request = new Request(); //$this->url = $_SERVER["REQUEST_URI"];
        Router::parse($this->request->url, $this->request);

        // eg ctr/akc = tasksController/index or tasksController/edit
        $controller = $this->loadController();
        //call_user_func_array( callable $callback, array $param_arr) : mixed
        //call_user_func_array([$controller, $this->request->action], $this->request->params);
        $akc = $this->request->action ;
        $controller->$akc($this->request->params) ;
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Controllers/' . $name . '.php';
               /*echo '<h3>ctrname, ctrfile, $this->request</h3>'; 
               echo '<pre>'; 
                 echo '$name='; print_r($name); 
                 echo '<br />file='; print_r($file); 
                 echo '<br />$this->request='; print_r($this->request); 
               echo '</pre><br />'; */
        require($file);
        $controller = new $name();
        return $controller;
    }

}
?>