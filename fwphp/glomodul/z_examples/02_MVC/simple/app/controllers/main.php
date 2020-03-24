<?php

class Main extends Controller {

    /*
     * http://localhost/
     */
    function Index () {
        
        if (!isset($_SESSION['login'])) {
            //http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/simple/login/login/...
            //header('Location: '.MODULEURL.'login');
            header('Location: '.MODULEURL.'dashboard');

        } else {
            header('Location: '.MODULEURL.'dashboard');
        }
        
    }

    /*
     * http://localhost/anothermainpage
     */
    function anotherMainPage () {
        echo 'Works!';
    }

}

?>