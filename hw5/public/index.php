<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

// require_once(ROOT_DIR."vendor/autoload.php");
// $loader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
// $twig = new Twig_Environment($loader);
// echo $twig->render("index.php", array('name' => 'Fabien'));

$controllerName = $_GET['c'] ?: 'index';
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE.ucfirst($controllerName)."Controller";

if(class_exists($controllerClass)){
  $controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
  $controller->RunAction($actionName);
}
?>