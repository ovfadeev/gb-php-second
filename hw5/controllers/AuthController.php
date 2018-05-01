<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\User;
/**
 * User controller
 */
class AuthController extends Controller
{
  public function actionIndex()
  {
    $arParams = array();
    if ($_POST){
      $user = new User();
      $user = $user->Auth(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["password"])
      );
      // $findUser = User::GetList(array("login" => htmlspecialchars($_POST["login"])), array());
      echo "<pre>";
      var_dump($user);
      echo "</pre>";
    }
    echo $this->render("auth", array("params" => $params));
  }
}
?>