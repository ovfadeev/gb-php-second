<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Product;
use fadeev\php2\models\repositories\ProductRepository;

class IndexController extends Controller
{
  public function actionIndex()
  {
    $products = (new ProductRepository)->getList();
    echo $this->render("index", array("name" => "main page"));
  }
}
?>