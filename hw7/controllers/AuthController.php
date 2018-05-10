<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\User;

class AuthController extends Controller
{
  private $login;
  private $password;
  private $params = array();

  public function actionIndex()
  {
    $this->login = App::call()->request->getParams()["login"];
    $this->password = App::call()->request->getParams()["password"];

    $this->params = $this->getDefaultParams();

    if ($this->login && $this->password)
    {
      $userAuth = (new User)->auth(
        $this->login,
        $this->password
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
        $this->params["user"] = $userAuth;
        $this->params["msg"] = "Вы авторизированы";
      }
    }
    else if ($this->login && $this->password)
    {
      $this->params["msg"] = "Неверный логин или пароль";
    }

    echo $this->render("auth", array("params" => $this->params));
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

  private function getDefaultParams()
  {
    return array(
      "user" => false,
      "msg" => "",
      "form_action" => $_SERVER["REQUEST_URI"]
    );
  }
}
?>