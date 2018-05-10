<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\User;
use fadeev\php2\models\repositories\UserRepository;

class UserController extends Controller
{
  public function actionIndex()
  {
    $userId = (new \fadeev\php2\services\Sessions)->get('user_id');
    if (intval($userId) > 0) {
      $user = (new UserRepository)->getById($userId);
      echo $this->render("user", array("user" => $user));
    } else {
      header("Location: /auth/");
    }
  }
}
?>