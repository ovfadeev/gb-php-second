<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Basket;
use fadeev\php2\models\repositories\BasketRepository;
use fadeev\php2\services\Sessions;

class BasketController extends Controller
{
  public function actionIndex()
  {
    $basket = (new BasketRepository)->GetList(
      array(
        "session_id" => (new Sessions)->Get("id")
      )
    )[0];
    if (!empty($basket) && !empty($basket["products"]))
    {
      $basket["basket_items"] = (new BasketRepository)->GetBasketItems($basket);
    }

    echo $this->render("basket", ["basket" => $basket]);
  }
}
?>