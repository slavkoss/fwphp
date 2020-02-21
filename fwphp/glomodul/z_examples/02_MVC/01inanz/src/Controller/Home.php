<?php
namespace Controller;
 
use Core\Template;
 
class Home extends AbstractController
{
    public function __construct()
    {
        parent::__construct(new Template());
    }
 
    public function indexMethod()
    {
        ob_start(); //or ob_ start("callbackfn");
        require MODULE_PATH.'/01_install_dir_structure.txt' ;
        $install_dir_structure = ob_get_contents();
        ob_end_clean(); //ob_end_flush(), ob_get_flush()...
        
        return parent::getView(
            __METHOD__,
            [
                'title' => MODULE_NAME.' - Home',
                'header' => 'Welcome to '.MODULE_NAME,
                //'application_name' => MODULE_NAME,
                '01_install_dir_structure' => $install_dir_structure,
            ]
        );
 
    }
}