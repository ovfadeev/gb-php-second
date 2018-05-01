<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\User;
/**
 * User controller
 */
class UserController extends Controller
{
  public function actionIndex()
  {
    $id = htmlspecialchars($_GET["id"]);
    $user = User::GetById($id);
    echo $this->Render("user", array("user" => $user));
  }
}
?>