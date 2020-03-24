<?php
namespace Core\Base;

class View
{
    protected $variables = [];
    protected $controller;
    protected $action;

    function __construct($controller, $action)
    {
        $this->controller = strtolower($controller);
        $this->action = strtolower($action);
    }

    public function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function render()
    {
        extract($this->variables);
        $defaultHeader = APP_PATH . 'app/views/header.php';
        $defaultFooter = APP_PATH . 'app/views/footer.php';

        $controllerHeader = APP_PATH . 'app/views/' . $this->controller . '/header.php';
        $controllerFooter = APP_PATH . 'app/views/' . $this->controller . '/footer.php';
        $controllerLayout = APP_PATH . 'app/views/' . $this->controller . '/' . $this->action . '.php';

        if (is_file($controllerHeader)) {
            include($controllerHeader);
        } else {
            include($defaultHeader);
        }

        if (is_file($controllerLayout)) {
            include($controllerLayout);
        } else {
            echo '<h1>Can not found this view</h1>';
        }

        if (is_file($controllerFooter)) {
            include($controllerFooter);
        } else {
            include($defaultFooter);
        }
    }
}
