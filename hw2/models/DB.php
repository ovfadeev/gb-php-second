<?php
namespace fadeev\php2\models;
/**
* Database
*/
class DB
{
  private $dbName;
  private $dbLogin;
  private $dbPassword;
  private $dbHost;
  private $db;

  function __construct()
  {
    $this->dbName = DB_NAME;
    $this->dbLogin = DB_LOGIN;
    $this->dbPassword = DB_PASSWORD;
    $this->dbHost = DB_HOST;
  }

  private function Connect()
  {
    $this->db = mysqli_connect($this->dbHost, $this->dbLogin, $this->dbPassword, $this->dbName);
    mysqli_query($this->db, "SET NAMES utf8");
  }

  private function Close()
  {
    mysqli_close($this->db);
  }

  private function Query($sql)
  {
    $this->Connect();
    $result = mysqli_query($this->db, $sql);
    $this->Close();
    return $result;
  }
}
?>