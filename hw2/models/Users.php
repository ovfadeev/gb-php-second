<?php
namespace fadeev\php2\models;
/**
* Пользователь
*/
class Users
{
  public $id;
  public $name;
  public $lastName;
  public $email;
  public $login;
  protected $password;

  function __construct($name, $lastName, $email, $login, $password)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;
  }

  public function Add()
  {
    $newPass = $this->HashPassword($this->password);
    $db = new DataBase();
    $query = "INSERT INTO Users (name, last_name, email, login, password) VALUES ('".$name."', '".$lastName."', '".$email."', '".$login."', '".$newPass."');";
    $res = $db->query($query);
  }

  public function Remove($login)
  {
    return false;
  }

  protected function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function Auth($login, $password)
  {
    return false;
  }

  public function GetById($id)
  {
    return false;
  }

  public function GetByLogin($login)
  {
    return false;
  }

  public function GetList($arFilter = array())
  {
    return false;
  }
}
?>