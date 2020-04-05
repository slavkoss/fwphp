<?php
namespace Core\Base;

class Controller
{
    protected $controller;
    protected $action;
    protected $view;

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action     = $action;
        $this->view       = new View($controller, $action);
    }

    public function assign($name, $value)
    {
        $this->view->assign($name, $value);
    }

    public function render()
    {
        $this->view->render();
    }
}