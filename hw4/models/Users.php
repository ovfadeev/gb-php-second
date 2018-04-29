<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Пользователь
*/
class Users extends DBModel
{
  public $id;
  public $name;
  public $lastName;
  public $email;
  public $login;
  public $password;

  public function __construct($id = null, $name = null, $lastName = null, $email = null, $login = null, $password = null)
  {
    parent::__construct();
    $this->id = $id;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;
  }

  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function PrivateColumns()
  {
    return array();
  }

  protected function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function Auth($login, $password)
  {
    return false;
  }

  public function Add()
  {
    $this->password = $this->HashPassword($this->password);
    parent::Add($arParams);
  }
}
?>