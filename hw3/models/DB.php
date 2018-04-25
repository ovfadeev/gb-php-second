<?php
namespace fadeev\php2\models;
use \fadeev\php2\traits\TSingleton;
/**
* Database
*/
class DB
{
  use TSingleton;

  private $dbtype = DB_TYPE;
  private $dbName = DB_NAME;
  private $dbLogin = DB_LOGIN;
  private $dbPassword = DB_PASSWORD;
  private $dbHost = DB_HOST;
  private $charset = DB_CHARSET;

  private $db = null;

  private static $instance = null;

  private function Connect()
  {
    if (is_null($this->db))
    {
      $this->db = new \PDO($this->PrepareDsn(), $this->dbLogin, $this->dbPassword);
      $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
    return $this->db;
  }

  private function PrepareDsn()
  {
    return sprintf("%s:host=%s;dbname=%s;charset=%s",
      $this->dbtype,
      $this->dbHost,
      $this->dbName,
      $this->charset
    );
  }

  public function Query($sql){
    $pdoStatement = $this->Connect()->prepare($sql);
    $pdoStatement->execute();
    return $pdoStatement;
  }

  public function Execute($sql)
  {
    $this->query($sql);
    return true;
  }

  public function PrepareSelectSql($table, $arFilter = array(), $arSelect = array())
  {
    $sql = "";
    if (!empty($arSelect))
    {
      $sql .= "SELECT ".implode(", ", $arSelect);
    }
    else
    {
      $sql .= "SELECT *";
    }
    $sql .= " FROM ".$table;
    if (!empty($arFilter))
    {
      $sql .= " WHERE ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = ".$v;
        }, array_keys($arFilter), $arFilter)
      );
    }
    $sql .= ";";
    return $sql;
  }

  public function PrepareDeleteSql($table, $arFilter)
  {
    $sql = "DELETE";
    $sql .= " FROM ".$table;
    if (!empty($arFilter))
    {
      $sql .= " WHERE ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = ".$v;
        }, array_keys($arFilter), $arFilter)
      );
    }
    $sql .= ";";
    return $sql;
  }

  public function PrepareUpdateSql($table, $id, $arParams)
  {
    $sql = "UPDATE ".$table;
    if (!empty($arParams))
    {
      $sql .= " SET ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = '".$v."'";
        }, array_keys($arParams), $arParams)
      );
    }
    $sql .= " WHERE id = ".$id;
    $sql .= ";";
    return $sql;
  }

  public function PrepareAddSql($table, $arParams)
  {
    $sql = "INSERT INTO ".$table;
    if (!empty($arParams))
    {
      $sql .= " (";
      $sql .= implode(", ", array_keys($arParams));
      $sql .= ")";
      $sql .= " VALUES (";
      $sql .= implode(
        ", ",
        array_map(function ($v) {
          return "'".$v."'";
        }, $arParams)
      );
      $sql .= ")";

    }
    $sql .= ";";
    return $sql;
  }
}
?>