<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Order;
use fadeev\php2\models\repositories\OrderRepository;
use fadeev\php2\models\Basket;
use fadeev\php2\models\repositories\BasketRepository;
use fadeev\php2\models\User;
use fadeev\php2\models\repositories\UserRepository;
use fadeev\php2\services\Sessions;

class OrderController extends Controller
{
  public function actionIndex()
  {
    $user_id = (new Sessions)->Get("user_id");
    if (!empty($user_id)) {
      $order["user"] = (new UserRepository)->GetById($user_id);
      $order["basket"] = (new BasketRepository)->GetList(
        array(
          "user_id" => $user->id
        )
      )[0];
      if (!empty($order["basket"]) && !empty($order["basket"]["products"]))
      {
        $order["basket"]["basket_items"] = (new BasketRepository)->GetBasketItems($order["basket"]);
      }
    } else {
      header("Location: /auth/");
    }

    echo $this->render("order", ["order" => $order]);
  }
}
?>