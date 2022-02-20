<?php
namespace App\Controllers;

use Core\Controller;

class Site extends Controller
{
    public function actionIndex()
    {
        $this->render([ 'home', ]); // or index
        // J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\hcstudio_easy\app/views/default/home.php 
    }

}
