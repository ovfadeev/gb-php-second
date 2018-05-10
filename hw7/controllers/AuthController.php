<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;

class AuthController extends Controller
{
  public function actionIndex()
  {
    if (!is_null(App::call()->sessions->get("user_id")))
    {
      header("Location: /user/");
    }
    else
    {
      if (App::call()->auth->login && App::call()->auth->password)
      {
        $userAuth = App::call()->auth->signIn();
      }

      if ($userAuth !== false && $userAuth->id > 0)
      {
        App::call()->sessions->set("user_id", $userAuth->id);
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
        App::call()->auth->params["msg"] = "Неверный логин или пароль";
      }

      echo $this->render("auth", array("params" => App::call()->auth->params));
    }
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