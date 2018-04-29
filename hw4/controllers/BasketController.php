<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Basket;
/**
 * Basket controller
 */
class BasketController extends Controller
{
  public function actionIndex()
  {
    $basket = Basket::GetById($id);
    echo $this->render('basket', ['basket' => $basket]);
  }
}
?>