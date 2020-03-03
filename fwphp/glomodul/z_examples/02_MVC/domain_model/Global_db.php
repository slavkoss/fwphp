<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Global_db.php was PdoAdapter.php

namespace CoreDB;

use PDO ;

class Global_db implements Global_db_intf
{
  protected $config = array();
  protected $connection;
  protected $preparedsql;
  protected $fetchMode = PDO::FETCH_ASSOC;

  public function __construct(
    $dsn, $username = null, $password = null, array $driverOptions = array())
  {
    //variable name (or array  of variable names, more levels) becomes key, variable contents become key value. In short, it does the opposite of extract().
    $this->config = compact(
      "dsn", "username", "password", "driverOptions"
    );
  }

  public function getPreparedSQL() {
      if ($this->preparedsql === null) {
          throw new PDOException(
            "There is no PDOStatement (PreparedSQL) object for use.");
      }
      return $this->preparedsql;
  }

  public function connect() {
    // if there is a PDO object already, return early
    if ($this->connection) { return; }

    try {
      $this->connection = new PDO(
          $this->config["dsn"],
          $this->config["username"],
          $this->config["password"],
          $this->config["driverOptions"]);
      $this->connection->setAttribute(
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
      );
      $this->connection->setAttribute(
          PDO::ATTR_EMULATE_PREPARES, false
      );
    }
    catch (PDOException $e) {
        //throw new RunTimeException($e->getMessage());
        throw new RunTimeException($e->getMessage());
    }
  }

  public function disconnect() {
      $this->connection = null;
  }


  //caled from this class cc($table, array $bind) lin 165
  public function prepareSql($sql, array $options = array()) {
      $this->connect() ;
      try {
          $this->preparedsql = $this->connection->prepare($sql, $options);
          return $this;
      }
      catch (PDOException $e) {
          //eg Table 'z_ blog cms.u sers' doesn't exist :
          throw new RunTimeException($e->getMessage());
      }
  }

  public function execute(array $parameters = array()) {
      try {
          $this->getPreparedSQL()->execute($parameters);
          return $this;
      }
      catch (PDOException $e) {
          throw new RunTimeException($e->getMessage());
      }
  }



  public function countAffectedRows() {
      try {
          return $this->getPreparedSQL()->rowCount();
      }
      catch (PDOException $e) {
          throw new RunTimeException($e->getMessage());
      }
  }

  public function getLastInsertId($name = null) {
      $this->connect() ;
      return $this->connection->lastInsertId($name);
  }



  // **********************************
  //                 C R U D
  // **********************************

  //caled from eg class User_db fn cc(UserInterface $user) lin 16
  public function cc($table, array $bind) {
      $cols = implode(", ", array_keys($bind));
      $values = implode(", :", array_keys($bind));
      foreach ($bind as $col => $value) {
          unset($bind[$col]);
          $bind[":" . $col] = $value;
      }
      $sql = "INSERT INTO ". $table ." (". $cols .") VALUES (:". $values .")";

                        if ('') { echo ''. __METHOD__ .'() method SAYS : ';
                          //echo '<b>$sql='; print_r($sql); echo '</b>' ;
                          echo '<pre>$bind='; print_r($bind); echo '</pre>';
                        }

      return (int) $this->prepareSql($sql)
          ->execute($bind)
          ->getLastInsertId();

  }

  public function rr($table, array $bind = array(),
      $boolOperator = "AND") {
      if ($bind) {
          $where = array();
          foreach ($bind as $col => $value) {
              unset($bind[$col]);
              $bind[":" . $col] = $value;
              $where[] = $col . " = :" . $col;
          }
      }

      $sql = "SELECT * FROM " . $table
          . (($bind) ? " WHERE "
          . implode(" " . $boolOperator . " ", $where) : " ");
      $this->prepareSql($sql)
          ->execute($bind);
      return $this;
  }

  public function uu($table, array $bind, $where = "") {
      $set = array();
      foreach ($bind as $col => $value) {
          unset($bind[$col]);
          $bind[":" . $col] = $value;
          $set[] = $col . " = :" . $col;
      }

      $sql = "UPDATE " . $table . " SET " . implode(", ", $set)
          . (($where) ? " WHERE " . $where : " ");
      return $this->prepareSql($sql)
          ->execute($bind)
          ->countAffectedRows();
  }

  public function dd($table, $where = "") {
    $sql = "DELETE FROM " . $table . (($where) ? " WHERE " . $where : " ");
    return $this->prepareSql($sql)
        ->execute()
        ->countAffectedRows();
  }



  /*
  //Fatal error: Class CoreDB\G lobal_db contains 3 abstract methods and must therefore be declared abstract or implement the remaining methods (CoreDB\G lobal_db_intf::prepare, CoreDB\G lobal_db_intf::fetch, CoreDB\G lobal_db_intf::fetchAll) in J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\G lobal_db.php on line 8

  public f unction fetch(
    $fetchStyle = null, $cursorOrientation = null, $cursorOffset = null)
  {
      if ($fetchStyle === null) {
          $fetchStyle = $this->fetchMode;
      }

      try {
          return $this->getPreparedSQL()->fetch(
            $fetchStyle, $cursorOrientation, $cursorOffset);
      }
      catch (PDOException $e) {
          throw new RunTimeException($e->getMessage());
      }
  }

  public f unction fetchAll($fetchStyle = null, $column = 0) {
      if ($fetchStyle === null) {
          $fetchStyle = $this->fetchMode;
      }

      try {
          return $fetchStyle === PDO::FETCH_COLUMN
             ? $this->getPreparedSQL()->fetchAll($fetchStyle, $column)
             : $this->getPreparedSQL()->fetchAll($fetchStyle);
      }
      catch (PDOException $e) {
          throw new RunTimeException($e->getMessage());
      }
  }
  */


}
