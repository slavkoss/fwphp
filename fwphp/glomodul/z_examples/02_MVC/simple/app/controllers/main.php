<?php

class Main extends Controller {

    /*
     * http://localhost/
     */
    function Index () {
        
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {

            header('Location: /dashboard');
            
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