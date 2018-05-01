<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$controllerName = $_GET['c'] ?: 'index';
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE.ucfirst($controllerName)."Controller";

if(class_exists($controllerClass)){
  // $controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
  $controller = new $controllerClass(new \fadeev\php2\services\TwigRenderer());
  echo "<pre>";
  var_dump($controller);
  echo "</pre>";
  $controller->RunAction($actionName);
}
?>