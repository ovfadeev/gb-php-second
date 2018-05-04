<?php
namespace fadeev\php2\models;
use fadeev\php2\models\repositories\UserRepository;

class UserAuth extends User
{
  protected static function VerifyPassword($password, $db_password)
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