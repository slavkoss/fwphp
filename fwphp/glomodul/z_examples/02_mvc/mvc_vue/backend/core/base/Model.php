<?php
namespace Core\Base;

use Core\Db\Sql;

class Model extends Sql
{
    protected $model;

    public function __construct()
    {
        if (!$this->table) {
            $this->model = get_class($this);

            $this->model = substr($this->model, 0, -5);

            $this->table = strtolower($this->model);
        }
    }
}