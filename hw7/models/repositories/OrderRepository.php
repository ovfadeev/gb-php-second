<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\Order;

class BasketRepository extends Repository
{
  public function GetTableName()
  {
    return DB_PREFIX_TABLE."orders";
  }

  public function GetEntityClass()
  {
      return Order::class;
  }
}
?>