<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Product;
use fadeev\php2\models\repositories\ProductRepository;

class ProductController extends Controller
{
  public function actionIndex()
  {
    $products = (new ProductRepository)->GetList();
    echo $this->render("products", array("products" => $products));
  }

  public function actionCard()
  {
    $id = htmlspecialchars($_GET["id"]);
    $product = (new ProductRepository)->GetById($id);
    echo $this->render("card", array("product" => $product));
  }
}
?>