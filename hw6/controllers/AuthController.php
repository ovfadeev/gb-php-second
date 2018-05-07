<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\repositories\UserRepository;

class AuthController extends Controller
{
  public function actionIndex()
  {
    $arParams = array(
      "user" => false,
      "msg" => ""
    );

    if ($_POST)
    {
      $userAuth = UserRepository::Auth(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["password"])
      );
    }

    if ($userAuth !== false && $userAuth->id > 0)
    {
      $arParams["user"] = $userAuth;
      $arParams["msg"] = "Вы авторизированы";
    }
    else if ($_POST)
    {
      $arParams["msg"] = "Неверный логин или пароль";
    }

    echo $this->render("auth", array("params" => $arParams));
  }

  public function actionForgot()
  {
    return false;
  }

  public function actionChange()
  {
    return false;
  }
}
?>