<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$user = new \fadeev\php2\models\User();
echo "<pre>";
print_r($user);
echo "</pre>";


$product = new \fadeev\php2\models\Product();
echo "<pre>";
print_r($product);
echo "</pre>";

// $controllerName = $_GET['c'] ?: 'index';
// $actionName = $_GET['a'];

// $controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

// if(class_exists($controllerClass)){
//   $controller = new $controllerClass;
//   $controller->runAction($actionName);
// }
?>