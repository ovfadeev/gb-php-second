<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;

class UserRepository extends Repository
{
  private $privateColumns = array(
    "last_date_auth"
  );

  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function PrivateColumns()
  {
    return array_merge(parent::PrivateColumns(), $this->privateColumns);
  }

  public function Add()
  {
    $this->password = UserRegister::HashPassword($this->password);
    parent::Add();
  }

  public function Update()
  {
    parent::Update();
  }
}
?>