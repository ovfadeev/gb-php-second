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
        echo "catalog";
    }

    public function actionCard()
    {
       $id = $_GET['id'];
       $product = Product::GetById($id);
       echo $this->render('card', ['product' => $product]);
    }
}
?>