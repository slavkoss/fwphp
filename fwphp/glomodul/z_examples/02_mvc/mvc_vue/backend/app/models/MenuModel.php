<?php
namespace App\Models;

use Core\Base\Model;
use Core\Db\Db;

class MenuModel extends Model
{
    protected $table = 'menus';

    public function search($keyword)
    {
        $sql = "select * from `$this->table` where `name` like :keyword";
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [':keyword' => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }
}