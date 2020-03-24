<?php
namespace Core\Db;

use \PDOStatement;

class Sql
{
    protected $table;
    protected $primary = 'id';

    private $filter = '';

    private $param = [];

    public function where($where = [], $param = [])
    {
        //TODO SQL Where

        return $this;
    }

    public function order($order = [])
    {
        //TODO SQL order

        return $this;
    }

    public function fetchAll()
    {
        //TODO SQL fetchAll
    }

    public function fetch($id)
    {
        //TODO SQL fetch
    }

    public function delete($id)
    {
        //TODO SQL delete
    }

    public function store($data)
    {
        //TODO SQL store
    }

    public function update($data)
    {
        //TODO SQL update
    }

    public function formatParam(PDOStatement $sth, $params = [])
    {
        //TODO format Param
    }

    private function formatInsert($data)
    {
        //TODO format insert
    }

    private function formatUpdate($data)
    {
        //TODO format update
    }
}