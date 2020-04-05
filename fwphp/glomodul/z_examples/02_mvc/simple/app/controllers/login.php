<?php

class Login extends Controller {

    /*
     * http://localhost/login
     */
    function Index () {

        if (!isset($_SESSION['login'])) {

            $this->view('template/header');
            $this->view('login');
            $this->view('template/footer');

        } else {

            header('Location: /');

        }

    }

    /*
     * http://localhost/login/log_in
     */
    function Log_In () {

        // Loads /models/example.php
        $this->model('Example');

        if ($this->Example->exampleMethod()) // Example->exampleMethod() from /models/example.php
            $_SESSION['login'] = "ExampleLogin";

        header("Location: /");

    }

    /*
     * http://localhost/login/logout
     */
    function Logout () {

        $_SESSION = [];
        session_unset();
        header('Location: /');

    }

}

?>