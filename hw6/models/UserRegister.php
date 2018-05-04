<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\repositories\UserRepository;

class UserRegister extends User
{
  public static function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }
}
?>