<?php
namespace ModelMapper;

use CoreDB\Global_db_intf;

abstract class AbstractDataMapper
{
    protected $globdb_obj; //was $adapter
    protected $entityTable;

    public function __construct(Global_db_intf $globdb_obj) {
        $this->globdb_obj = $globdb_obj;
    }


    // Create an entity (implementation delegated to concrete mappers)
    abstract protected function newrow_obj(array $row);

    /*
    // C R E  rowobj or rows objects :
    public function getglobdb_obj() { return $this->globdb_obj; }

    public function findById($id)
    {
        $this->globdb_obj->rr($this->entityTable, array('id' => $id));
        if (!$row = $this->globdb_obj->fetch()) { return null; }

        return $this->newrow_obj($row);
    }

    public function findAll(array $conditions = array())
    {
        $entities = array();
        $this->globdb_obj->rr($this->entityTable, $conditions);
        $rows = $this->globdb_obj->fetchAll();

        if ($rows) {
            foreach ($rows as $row) {
                $entities[] = $this->newrow_obj($row);
            }
        }

        return $entities;
    }
    */



}
