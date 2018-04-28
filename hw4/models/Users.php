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

  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  protected function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function Auth($login, $password)
  {
    return false;
  }

  public function Add($arParams = array())
  {
    $arParams["password"] = $this->HashPassword($arParams["password"]);
    $res = parent::Add($arParams);
    return $res;
  }
}
?>