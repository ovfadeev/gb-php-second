<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\User;

class AuthController extends Controller
{
  private $login;
  private $password;
  private $params = array();

  public function __construct()
  {
    $this->login = App::call()->request->getParams()["login"];
    $this->password = App::call()->request->getParams()["password"];
  }

  public function actionIndex()
  {
    $arParams = array(
      "user" => false,
      "msg" => "",
      "form_action" => $_SERVER["REQUEST_URI"]
    );

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
        $arParams["user"] = $userAuth;
        $arParams["msg"] = "Вы авторизированы";
      }
    }
    else if ($this->login && $this->password)
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