<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\repositories\BasketRepository;

class Basket extends DataEntity
{
  public function GetBasketByUser($user_id)
  {
    $basket = (new BasketRepository)->GetList(array("user_id" => $user_id))[0];
    if (!empty($basket) && !empty($basket["products"]))
    {
      $basket["basket_items"] = (new BasketRepository)->GetBasketItems($basket);
      return $basket;
    }
    return false;
  }

  public function GetBasketBySession($session_id)
  {
    $basket = (new BasketRepository)->GetList(array("session_id" => $session_id))[0];
    if (!empty($basket) && !empty($basket["products"]))
    {
      $basket["basket_items"] = (new BasketRepository)->GetBasketItems($basket);
      return $basket;
    }
    return false;
  }

  public function AddProductToBasket($basket_id, $product_id, $quantity, $price)
  {
    $basket = (new BasketRepository)->GetById($basket_id);
    $arProducts = json_decode($basket->products, true);
    if (in_array($product_id, array_keys($arProducts))) {
      $arProducts[$product_id]["quantity"] += $quantity;
      $arProducts[$product_id]["price"] = $price;
    } else {
      $arProducts[$product_id] = array(
        "product_id" => $product_id,
        "quantity" => $quantity,
        "price" => $price
      );
    }
    $basket->products = json_encode($arProducts);
    (new BasketRepository)->Update($basket);
  }
}