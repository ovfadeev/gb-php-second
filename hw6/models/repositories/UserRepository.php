<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\User;

class UserRepository extends Repository
{
  private $privateColumns = array(
    "last_date_auth"
  );

  public function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function GetEntityClass()
  {
      return User::class;
  }

  public function PrivateColumns()
  {
    return array_merge(parent::PrivateColumns(), $this->privateColumns);
  }

  public function Add(DataEntity $entity)
  {
    $this->password = $this->HashPassword($this->password);
    parent::Add($entity);
  }

  public function Update(DataEntity $entity)
  {
    parent::Update($entity);
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
    $findUser = self::GetList(array("login" => $login), array("id", "password"))[0];
    if (self::VerifyPassword($password, $findUser["password"]))
    {
      return self::GetById($findUser["id"]);
    }
    return false;
  }
}
?>