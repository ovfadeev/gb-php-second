<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\Basket;

class BasketRepository extends Repository
{
  public function GetTableName()
  {
    return DB_PREFIX_TABLE."basket";
  }

  public function GetEntityClass()
  {
      return Basket::class;
  }
}
?>