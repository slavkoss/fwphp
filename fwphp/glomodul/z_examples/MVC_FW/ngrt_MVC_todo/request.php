<?php
    class Request
    {
        public $url;

        public $controller;
        public $action;
        public $params;

        public function __construct()
        {
            $this->url = $_SERVER["REQUEST_URI"];
        }
    }

?>