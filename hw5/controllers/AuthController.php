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
    $userAuth = false;
    $arParams = array();
    if ($_POST)
    {
      $userAuth = new User();
      $userAuth = $userAuth->Auth(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["password"])
      );
    }
    if ($userAuth !== false && $userAuth->id > 0)
    {
      $arParams = array(
        "result" => $userAuth,
        "msg" => "Вы авторизированы"
      );
    }
    else if ($_POST)
    {
      $arParams = array(
        "result" => $userAuth,
        "msg" => "Неверный логин или пароль"
      );
    }
    echo $this->render("auth", array("params" => $arParams));
  }
}
?>