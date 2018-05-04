<?php
namespace fadeev\php2\models;

class UserAuth extends User
{
  protected static function VerifyPassword($password, $db_password)
  {
    return password_verify($password, $db_password);
  }

  public static function Auth($login, $password)
  {
    $findUser = self::GetList(array("login" => $login), array("id", "password"))[0];
    if (self::VerifyPassword($password, $findUser["password"]))
    {
      return self::GetById($findUser["id"]);
    }
    return false;
  }
}
?>