<?php
namespace fadeev\php2\services;
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

  public function Query($sql, $arParams = array()){
    $pdoStatement = $this->Connect()->prepare($sql);
    $pdoStatement->execute($arParams);
    return $pdoStatement;
  }

  public function QueryObject($sql, $arParams, $class)
  {
      $smtp = $this->query($sql, $arParams);
      $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
      return $smtp->fetch();
  }

  public function Execute($sql, $arParams = array())
  {
    $this->query($sql);
    return true;
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
}
?>