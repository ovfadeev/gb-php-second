<?php
namespace fadeev\php2\models\entities;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\repositories\UserRepository;

class User extends DataEntity
{
  public $id;
  public $f_name;
  public $l_name;
  public $email;
  public $login;
  public $password;

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

  protected function hashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  protected function verifyPassword($password, $db_password)
  {
    return password_verify($password, $db_password);
  }

  public static function auth($login, $password)
  {
    $findUser = (new UserRepository)->getList(array("login" => $login), array("id", "password"))[0];
    if (self::verifyPassword($password, $findUser["password"]))
    {
      return (new UserRepository)->getById($findUser["id"]);
    }
    return false;
  }
}
?>