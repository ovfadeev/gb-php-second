<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\entities\DataEntity;
use fadeev\php2\models\entities\Order;

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