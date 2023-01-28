<?php

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request(); // $this->url = $_SERVER["REQUEST_URI"];
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = MODULE_PATH . 'Controllers/' . $name . '.php';
        require($file);
        $controller = new $name();
        return $controller;
    }

}
?>