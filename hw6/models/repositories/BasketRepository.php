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
      $arProductsId = json_decode($arBasket["products"], true);
      foreach ($arProductsId["product_id"] as $key => $product_id)
      {
        $arProducts[] = (new \fadeev\php2\models\repositories\ProductRepository)->GetById($product_id);
      }
      return $arProducts;
    }
    return false;
  }
}
?>