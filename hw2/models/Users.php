<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Пользователь
*/
class Users extends Model
{
  public $id;
  public $name;
  public $lastName;
  public $email;
  public $login;
  protected $password;

  function __construct()
  {
    # code...
  }

  public function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function Add($name, $lastName, $email, $login, $password)
  {
    $newPass = $this->HashPassword($password);
    $db = new DB();
    $query = "INSERT INTO ".$this->GetTableName()." (name, last_name, email, login, password) VALUES ('".$name."', '".$lastName."', '".$email."', '".$login."', '".$newPass."');";
    return $db->query($query);
  }

  public function Update($arParams)
  {
    return false;
  }

  public function Remove($id)
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