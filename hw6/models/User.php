<?php
namespace fadeev\php2\models;
use fadeev\php2\models\repositories\UserRepository;

class User extends DataEntity
{
  public $id;
  public $f_name;
  public $l_name;
  public $email;
  public $login;
  public $password;
  protected $date_insert;

  /**
   * Конструктор класса User
   * @param int $id
   * @param string $name
   * @param string $lastName
   * @param string $email
   * @param string $login
   * @param string $password
   */
  public function __construct($id = null, $f_name = null, $l_name = null, $email = null, $login = null, $password = null)
  {
    $this->id = $id;
    $this->f_name = $f_name;
    $this->l_name = $l_name;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;
  }

  protected function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  protected function VerifyPassword($password, $db_password)
  {
    return password_verify($password, $db_password);
  }

  public static function Auth($login, $password)
  {
    $findUser = (new UserRepository)->GetList(array("login" => $login), array("id", "password"))[0];
    if (self::VerifyPassword($password, $findUser["password"]))
    {
      return (new UserRepository)->GetById($findUser["id"]);
    }
    return false;
  }
}
?>