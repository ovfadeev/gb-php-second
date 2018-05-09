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
}