<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\entities\DataEntity;
use fadeev\php2\models\entities\Product;

class ProductRepository extends Repository
{
  public function getTableName()
  {
    return DB_PREFIX_TABLE."catalog_products";
  }

  public function getEntityClass()
  {
      return Product::class;
  }

  public function privateColumns()
  {
    return array_merge(parent::privateColumns(), $this->privateColumns);
  }
}
?>