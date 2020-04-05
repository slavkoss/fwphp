<?php

/*
 * Every class deriving from Controller must implement Index() method
 * Index() method is the index page of the controller
 * ROUTING is based on controller class and it's methods. It is structured as: 
 *   http(s)://address/class/method/[optional parameters divided by a '/']
 * Every page of the controller can accept optional parameters from the uri
 */
class ExampleController extends Controller {

    /*
     * http://localhost/examplecontroller
     */
    function Index () {}

    /*
     * http://localhost/examplecontroller/examplesubpage/[$parameter1]/[$parameter2]
     */
    function exampleSubpage ($parameter1 = '', $parameter2 = '') {

        /*
         * Every class deriving from Controller has access to
         *    - All helpers in /core/helpers, 
         *    - autoloaded model() and view() methods
         */
        ExampleHelper.method();
        $this->model('modelname');
        $this->view('viewname');

    }

}

?>