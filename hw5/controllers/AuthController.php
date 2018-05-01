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
      $userAuth = User::Auth(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["password"])
      );
    }

    $arParams["result"] = $userAuth;

    if ($userAuth !== false && $userAuth->id > 0)
    {
      $arParams["msg"] = "Вы авторизированы";
    }
    else if ($_POST)
    {
      $arParams["msg"] = "Неверный логин или пароль";
    }

    echo $this->render("auth", array("params" => $arParams));
  }
}
?>