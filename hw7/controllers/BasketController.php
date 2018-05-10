<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\Basket;
use fadeev\php2\models\repositories\BasketRepository;

class BasketController extends Controller
{
  public function actionIndex()
  {
    $user_id = App::call()->sessions->get("user_id");
    if (!empty($user_id)){
      $basket = (new Basket)->getBasketByUser($user_id);
    } else {
      $basket = (new Basket)->getBasketBySession(
        App::call()->sessions->get("id")
      );
    }
    echo $this->render("basket", ["basket" => $basket]);
  }
}
?>