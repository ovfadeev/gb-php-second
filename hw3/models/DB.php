<?php
namespace fadeev\php2\models;
/**
* Database
*/
class DB
{
  private $dbtype = DB_TYPE;
  private $dbName = DB_NAME;
  private $dbLogin = DB_LOGIN;
  private $dbPassword = DB_PASSWORD;
  private $dbHost = DB_HOST;
  private $charset = DB_CHARSET;

  private $db = null;

  private function __construct(){}
  private function __clone(){}
  private function __wakeup(){}

  private static $instance = null;

  public static function getInstance()
  {
    if (is_null($instance))
    {
      static::$instance = new Static();
    }
    return static::$instance;
  }

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