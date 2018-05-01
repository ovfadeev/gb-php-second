<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DB;
/**
* Пользователь
*/
class User extends DBModel
{
  public $id;
  public $f_name;
  public $l_name;
  public $email;
  public $login;
  public $password;

  private $privateColumns = array(
    "last_date_auth"
  );

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
    return array_merge(parent::PrivateColumns(), $this->privateColumns);
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
   * Проверяем пароль
   * @param string $password
   */
  protected function VerifyPassword($password, $db_password)
  {
    return password_verify($password, $db_password);
  }

  /**
   * Авторизация
   * @param string $login
   * @param string $password
   */
  public static function Auth($login, $password)
  {
    $findUser = self::GetList(array("login" => $login), array("id", "password"))[0];
    if (self::VerifyPassword($password, $findUser["password"]))
    {
      return self::GetById($findUser["id"]);
    }
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

  public function Update()
  {
    parent::Update();
  }
}
?>