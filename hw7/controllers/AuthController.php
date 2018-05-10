<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\User;

class AuthController extends Controller
{
  public function actionIndex()
  {
    App::call()->auth;

    if (App::call()->auth->login && App::call()->auth->password)
    {
      $userAuth = (new User)->auth(
        App::call()->auth->login,
        App::call()->auth->password
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
        App::call()->auth->params["user"] = $userAuth;
        App::call()->auth->params["msg"] = "Вы авторизированы";
      }
    }
    else if (App::call()->auth->login && App::call()->auth->password)
    {
      $this->params["msg"] = "Неверный логин или пароль";
    }

    echo $this->render("auth", array("params" => App::call()->auth->params));
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