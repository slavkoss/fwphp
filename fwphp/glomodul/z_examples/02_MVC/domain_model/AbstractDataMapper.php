<?php
namespace ModelMapper;

use LibraryDatabase\DatabaseAdapterInterface;

abstract class AbstractDataMapper
{
    protected $adapter;
    protected $entityTable;

    public function __construct(DatabaseAdapterInterface $adapter) {
        $this->adapter = $adapter;
    }

    public function getAdapter() {
        return $this->adapter;
    }

    public function findById($id)
    {
        $this->adapter->select($this->entityTable,
            array('id' => $id));

        if (!$row = $this->adapter->fetch()) {
            return null;
        }

        return $this->createEntity($row);
    }

    public function findAll(array $conditions = array())
    {
        $entities = array();
        $this->adapter->select($this->entityTable, $conditions);
        $rows = $this->adapter->fetchAll();

        if ($rows) {
            foreach ($rows as $row) {
                $entities[] = $this->createEntity($row);
            }
        }

        return $entities;
    }

    // Create an entity (implementation delegated to concrete mappers)
    abstract protected function createEntity(array $row);
}
