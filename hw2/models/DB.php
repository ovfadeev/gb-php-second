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

  function __construct($name, $login, $password, $host)
  {
    $this->dbName = $name;
    $this->dbLogin = $login;
    $this->dbPassword = $password;
    $this->dbHost = $host;
  }

  private function connect()
  {
    $this->db = mysqli_connect($this->dbHost, $this->dbLogin, $this->dbPassword, $this->dbName);
    mysqli_query($this->db, "SET NAMES utf8");
  }

  private function close()
  {
    mysqli_close($this->db);
  }

  private function query($sql)
  {
    $result = mysqli_query($this->db, $sql);
    $this->close();
    return $result;
  }
}
?>