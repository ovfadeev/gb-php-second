<?php
namespace fadeev\php2\controllers;
use fadeev\php2\base\App;
use fadeev\php2\models\entities\Order;
use fadeev\php2\models\repositories\OrderRepository;
use fadeev\php2\models\entities\Basket;
use fadeev\php2\models\repositories\BasketRepository;
use fadeev\php2\models\entities\User;
use fadeev\php2\models\repositories\UserRepository;

class OrderController extends Controller
{
  public function actionIndex()
  {
    $user_id = App::call()->sessions->get("user_id");
    if (!empty($user_id)) {
      $order = (new Order)->orderPrepare($user_id);
    } else {
      header("Location: /auth/?".http_build_query(array("back_url" => "/order/")));
    }

    echo $this->render("order", ["order" => $order]);
  }

  public function actionDetail()
  {
    $id = App::call()->request->GetParams()["id"];
    $order = (new OrderRepository)->getById($id);
    echo $this->render("order_detail", array("order" => $order));
  }
}
?>