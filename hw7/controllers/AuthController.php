<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\entities\User;
use fadeev\php2\services\Sessions;

class AuthController extends Controller
{
  public function actionIndex()
  {
    $arParams = array(
      "user" => false,
      "msg" => "",
      "form_action" => $_SERVER["REQUEST_URI"]
    );

    if ($_POST)
    {
      $userAuth = User::Auth(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["password"])
      );
    }

    if ($userAuth !== false && $userAuth->id > 0)
    {
      (new Sessions)->Set('user_id', $userAuth->id);
      if (!empty($_GET["back_url"]))
      {
        header("Location: ".htmlspecialchars($_GET["back_url"]));
      }
      else
      {
        $arParams["user"] = $userAuth;
        $arParams["msg"] = "Вы авторизированы";
      }
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

  public function actionLogout()
  {
    (new Sessions)->Remove("user_id");
    header("Location: /");
  }
}
?>