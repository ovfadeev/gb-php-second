<?php
/* --- main config --- */
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");
/* --- autoloader --- */
require_once(ROOT_DIR."services/Autoloader.php");
/* --- autoload --- */
spl_autoload_register(array(new \fadeev\php2\services\Autoloader(), "loadClass"));

$request = new \fadeev\php2\services\Request();

$controllerName = $request->getControllerName() ?: 'index';
$actionName = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE.ucfirst($controllerName)."Controller";

if(class_exists($controllerClass)){
  $controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
  $controller->RunAction($actionName);
}
?>