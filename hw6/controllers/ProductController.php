<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Product;

class ProductController extends Controller
{
  public function actionIndex()
  {
    $products = Product::GetList();
    echo $this->render("products", array("products" => $products));
  }

  public function actionCard()
  {
    $id = htmlspecialchars($_GET["id"]);
    $product = Product::GetById($id);
    echo $this->render("card", array("product" => $product));
  }
}
?>