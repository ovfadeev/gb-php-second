<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Basket;
use fadeev\php2\models\repositories\BasketRepository;

class BasketController extends Controller
{
  public function actionIndex()
  {
    // тут два варианта узнать корзину
    // 1. По идентификатору сессии
    // 2. По авторизованному пользователю
    $session_id = session_id();
    $basket = (new BasketRepository)->GetList(array("session_id" => $session_id));
    echo $this->render('basket', ['basket' => $basket]);
  }
}
?>