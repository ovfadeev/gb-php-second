<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\entities\Basket;
use fadeev\php2\models\repositories\BasketRepository;
use fadeev\php2\services\Sessions;

class BasketController extends Controller
{
  public function actionIndex()
  {
    $user_id = (new Sessions)->get("user_id");
    if (!empty($user_id)){
      $basket = (new Basket)->getBasketByUser($user_id);
    } else {
      $basket = (new Basket)->getBasketBySession(
        (new Sessions)->get("id")
      );
    }
    echo $this->render("basket", ["basket" => $basket]);
  }
}
?>