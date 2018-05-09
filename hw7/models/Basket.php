<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\repositories\BasketRepository;
use fadeev\php2\models\services\Sessions;

class Basket extends DataEntity
{
  public $id;
  public $user_id;
  public $session_id;
  public $products;

  /**
   * Конструктор класса Basket
   * @param int $id
   * @param int $user_id
   * @param int $session_id
   * @param str $products
   */
  public function __construct($id = null, $user_id = null, $session_id = null, $products = null)
  {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->session_id = $session_id;
    $this->products = $products;
  }

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

  public function AddProductToBasket($product_id, $quantity, $price)
  {
    $session_id = (new Sessions)->Get("id");
    $user_id = (new Sessions)->Get("user_id");
    $basket = $this->GetBasketBySession($session_id);
    if ($basket)
    {
      $objBasket = (new BasketRepository)->GetById($basket["id"]);
      $arProducts = json_decode($objBasket->products, true);
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
      $objBasket->products = json_encode($arProducts);
      return (new BasketRepository)->Update($basket);
    } else {
      $this->user_id = $user_id;
      $this->session_id = $session_id;
      $this->products = json_encode(array(
        $product_id => array(
          "product_id" => $product_id,
          "quantity" => $quantity,
          "price" => $price
        )
      ));
      return (new BasketRepository)->Add($this);
    }
  }
}