<?php
namespace fadeev\php2\services;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\User;
use fadeev\php2\models\repositories\UserRepository;

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

  public function verify()
  {
    $db_user = new UserRepository();
    $findUser = $db_user->getList(array("login" => $this->login), array("id", "password"))[0];
    if ($this->verifyPassword($this->password, $findUser["password"]))
    {
      return $db_user->getById($findUser["id"]);
    }
    return false;
  }

  protected function verifyPassword($password, $db_password)
  {
    return password_verify($password, $db_password);
  }
}
?>