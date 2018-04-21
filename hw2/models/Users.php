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
  public $password;

  function __construct()
  {
    # code...
  }

  public function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function Add($arParams = array())
  {
    return false;
  }

  public function Update($arParams = array())
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