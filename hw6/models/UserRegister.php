<?php
namespace fadeev\php2\models;

class UserRegister extends User
{
  public static function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }
}
?>