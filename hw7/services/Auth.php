<?php
namespace fadeev\php2\services;
use fadeev\php2\base\App;

class Auth
{
  public $login;
  public $password;
  public $params;

  public function __construct()
  {
    $this->login = App::call()->request->getParams()["login"];
    $this->password = App::call()->request->getParams()["password"];
    $this->params = array(
      "user" => false,
      "msg" => "",
      "form_action" => $_SERVER["REQUEST_URI"]
    );
  }
}
?>