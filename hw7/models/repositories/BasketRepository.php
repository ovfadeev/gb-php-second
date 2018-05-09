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

  public function GetBasketItems($arBasket = array())
  {
    if (!empty($arBasket["products"]))
    {
      $arProducts = json_decode($arBasket["products"], true);
      foreach ($arProducts as $key => $product)
      {
        $arBasketItems[] = (new \fadeev\php2\models\repositories\ProductRepository)->GetById($product["product_id"]);
      }
      return $arBasketItems;
    }
    return false;
  }
}
?>