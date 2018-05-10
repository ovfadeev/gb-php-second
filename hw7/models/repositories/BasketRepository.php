<?php
namespace fadeev\php2\models\repositories;
use fadeev\php2\models\Repository;
use fadeev\php2\models\entities\DataEntity;
use fadeev\php2\models\entities\Basket;

class BasketRepository extends Repository
{
  public function getTableName()
  {
    return DB_PREFIX_TABLE."basket";
  }

  public function getEntityClass()
  {
      return Basket::class;
  }

  public function getBasketItems($arBasket = array())
  {
    if (!empty($arBasket["products"]))
    {
      $arProducts = json_decode($arBasket["products"], true);
      foreach ($arProducts as $key => $product)
      {
        $arBasketItems[] = (new \fadeev\php2\models\repositories\ProductRepository)->getById($product["product_id"]);
      }
      return $arBasketItems;
    }
    return false;
  }
}
?>