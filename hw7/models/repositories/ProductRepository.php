<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\entities\DataEntity;
use fadeev\php2\models\entities\Product;

class ProductRepository extends Repository
{
  public function GetTableName()
  {
    return DB_PREFIX_TABLE."catalog_products";
  }

  public function GetEntityClass()
  {
      return Product::class;
  }

  public function PrivateColumns()
  {
    return array_merge(parent::PrivateColumns(), $this->privateColumns);
  }
}
?>