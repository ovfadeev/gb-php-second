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
      $this->db = new \PDO($this->prepareDsn(), $this->dbLogin, $this->dbPassword);
      $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
    return $this->db;
  }

  private function prepareDsn()
  {
    return sprintf("%s:host=%s;dbname=%s;charset=%s",
      $this->dbtype,
      $this->dbHost,
      $this->dbName,
      $this->charset
    );
  }

  public function Query($query)
  {
    $this->Connect();
    return $this->db;
  }
}
?>