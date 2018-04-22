<?php
namespace fadeev\php2\models;
/**
* Database
*/
class DB
{
  private $dbtype;
  private $dbName;
  private $dbLogin;
  private $dbPassword;
  private $dbHost;
  private $charset;

  private $db;

  function __construct()
  {
    $this->dbtype = DB_TYPE;
    $this->dbName = DB_NAME;
    $this->dbLogin = DB_LOGIN;
    $this->dbPassword = DB_PASSWORD;
    $this->dbHost = DB_HOST;
    $this->charset = DB_CHARSET;
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

  private function Connect()
  {
    if ($this->db === null)
    {
      $this->db = new \PDO($this->prepareDsn(), $this->dbLogin, $this->dbPassword);
      $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
    return $this->db;
  }

  public function Query($query)
  {
    $this->Connect();
    return $this->db;
  }
}
?>