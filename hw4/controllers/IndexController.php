<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\User;
/**
 * Index controller
 */
class IndexController extends Controller
{
  public function actionIndex()
  {
    echo "Главная страница";
  }
}
?>