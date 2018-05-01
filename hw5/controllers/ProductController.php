<?php
namespace fadeev\php2\controllers;
use fadeev\php2\models\Product;
/**
 * Product controller
 */
class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = Product::GetList();
        echo $this->render('products', ['products' => $products]);
    }

    public function actionCard()
    {
       $id = htmlspecialchars($_GET['id']);
       $product = Product::GetById($id);
       echo $this->render('card', ['product' => $product]);
    }
}
?>