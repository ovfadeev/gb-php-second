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
    $arParams = array();
    if ($_POST)
    {
      $userAuth = new User();
      $userAuth = $userAuth->Auth(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["password"])
      );
    }
    if ($userAuth !== false)
    {
      
    }
    else
    {
      
    }
    echo $this->render("auth", array("msg" => ""));
  }
}
?>