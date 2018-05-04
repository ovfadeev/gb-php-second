<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\User;
use fadeev\php2\models\repositories\UserRepository;
/**
 * User controller
 */
class UserController extends Controller
{
  public function actionIndex()
  {
    // add
    $newUser = new User(null, '123123', '123123', 'test@test.ru', 'test 1', 'test 2');
    $userAdd = (new UserRepository)->Add($newUser);
    echo "<pre>";
    var_dump($userAdd);
    echo "</pre>";

    // $db_user = (new UserRepository)->GetById(3);
    // echo $this->Render("user", array("user" => $db_user));
    // global $user;
    // if ($user) {
    //   $id = htmlspecialchars($user->id);
    //   $db_user = User::GetById($id);
    //   echo $this->Render("user", array("user" => $db_user));
    // } else {
    //   header("Location: /auth/");
    // }
  }
}
?>