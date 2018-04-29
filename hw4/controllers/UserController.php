<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\User;
/**
 * User controller
 */
class UserController extends Controller
{
  public function actionIndex()
  {
    $user = User::GetById($id);
    echo $this->render('user', ['user' => $user]);
  }

  public function actionCard()
  {
     $id = htmlspecialchars($_GET['id']);
     $product = Product::GetById($id);
     echo $this->render('card', ['product' => $product]);
  }
}
?>