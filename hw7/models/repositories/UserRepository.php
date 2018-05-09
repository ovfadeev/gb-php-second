<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\entities\User;

class UserRepository extends Repository
{
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
}
?>