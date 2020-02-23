<?php
namespace ModelMapper;

use Model\UserInterface;

interface UserMapperInterface
{
    public function findById($id);    
    public function findAll(array $conditions = array());
    
    public function insert(UserInterface $user);
    public function delete($id);
}
