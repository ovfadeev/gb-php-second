<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Пользователь
*/
class Users extends DBModel
{
  public $id;
  public $f_name;
  public $l_name;
  public $email;
  public $login;
  public $password;

  /**
   * [__construct description]
   * @param int $id
   * @param string $name
   * @param string $lastName
   * @param string $email
   * @param string $login
   * @param string $password
   */
  public function __construct($id = null, $f_name = null, $l_name = null, $email = null, $login = null, $password = null)
  {
    parent::__construct();
    $this->id = $id;
    $this->f_name = $f_name;
    $this->l_name = $l_name;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;
  }

  /**
   * Получить таблицу пользователей
   */
  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function PrivateColumns()
  {
    return array_merge(array("date_register", "last_date_auth"), parent::PrivateColumns());
  }

  /**
   * Шифруем пароль
   * @param string $password
   */
  protected function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  /**
   * Авторизация
   * @param string $login
   * @param string $password
   */
  public function Auth($login, $password)
  {
    return false;
  }

  /**
   * Добавить пользователя
   */
  public function Add()
  {
    $this->password = $this->HashPassword($this->password);
    parent::Add();
  }
}
?>