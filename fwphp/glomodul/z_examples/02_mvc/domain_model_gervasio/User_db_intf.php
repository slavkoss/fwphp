<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\User_db_intf.php was UserMapperInterface.php
namespace ModelMapper;

use Model\UserInterface;

interface User_db_intf
{
    //public function findById($id);    
    //public function findAll(array $conditions = array());
    
    public function cc(UserInterface $user);
    public function dd($id);
}
