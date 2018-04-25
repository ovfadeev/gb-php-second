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

  public function PrepareSql($table, $arFilter = array(), $arSelect = array())
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
      foreach ($arFilter as $key => $value)
      {
        $arStrFilter[] = $key." = ".$value;
      }
      $sql .= implode(" AND ", $arStrFilter);
    }
    $sql .= ";";
    return $sql;
  }
}
?>