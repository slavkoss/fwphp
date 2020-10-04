<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\User_db.php  was UserMapper.php
namespace ModelMapper;

use Model\UserInterface,
    Model\User;

class User_db extends AbstractDataMapper implements User_db_intf
{    
    protected $entityTable = "admins";

    public function cc(UserInterface $user) {
        $user->_id = $this->globdb_obj->cc(
            $this->entityTable
          , [
               "username"  => $user->username
              ,"email"     => $user->email
            ]
        );
        return $user->id;
    }

    public function dd($id) {
        if ($id instanceof UserInterface) {
            $id = $id->id;
        }
 
        return $this->globdb_obj->dd($this->entityTable,
            array("id = $id"));
    }

    protected function newrow_obj(array $row) {
        return new User($row["name"], $row["email"]);
    } 
}
