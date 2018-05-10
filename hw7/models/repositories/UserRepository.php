<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\entities\User;

class UserRepository extends Repository
{
  public function getTableName()
  {
    return DB_PREFIX_TABLE."users";
  }

  public function getEntityClass()
  {
      return User::class;
  }

  public function privateColumns()
  {
    return array_merge(parent::privateColumns(), $this->privateColumns);
  }

  public function add(DataEntity $entity)
  {
    $this->password = $this->hashPassword($this->password);
    parent::add($entity);
  }

  public function update(DataEntity $entity)
  {
    parent::update($entity);
  }
}
?>