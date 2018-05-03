<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Product;
/**
 * Index controller
 */
class IndexController extends Controller
{
  public function actionIndex()
  {
    $products = Product::GetList();
    echo $this->render("index", array("name" => "main page"));
  }
}
?>