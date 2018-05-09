<?php
namespace fadeev\php2\models\entities;
use fadeev\php2\models\DataEntity;
use fadeev\php2\models\repositories\OrderRepository;
use fadeev\php2\models\repositories\BasketRepository;
use fadeev\php2\models\repositories\UserRepository;

class Order extends DataEntity
{
  public function OrderPrepare($user_id)
  {
    $order["user"] = (new UserRepository)->GetById($user_id);
    $order["basket"] = (new BasketRepository)->GetList(array("user_id" => $order["user"]->id))[0];
    if (!empty($order["basket"]) && !empty($order["basket"]["products"]))
    {
      $order["basket"]["basket_items"] = (new BasketRepository)->GetBasketItems($order["basket"]);
      return $order;
    }
    return false;
  }
}
?>