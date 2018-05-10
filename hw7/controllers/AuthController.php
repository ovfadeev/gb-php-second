<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\User;

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
      $userAuth = User::auth(
        App::call()->request->getParams()["login"],
        App::call()->request->getParams()["password"]
      );
    }

    if ($userAuth !== false && $userAuth->id > 0)
    {
      App::call()->sessions->set('user_id', $userAuth->id);
      if (!empty(App::call()->request->getParams()["back_url"]))
      {
        header("Location: " . App::call()->request->getParams()["back_url"]);
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
    App::call()->sessions->remove("user_id");
    header("Location: /");
  }
}
?>