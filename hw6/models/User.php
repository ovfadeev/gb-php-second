<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DB;

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
   * Добавить пользователя
   */
  public function Add()
  {
    $this->password = UserAuth::HashPassword($this->password);
    parent::Add();
  }

  public function Update()
  {
    parent::Update();
  }
}
?>