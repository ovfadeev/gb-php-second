<?php
/* --- main config --- */
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");
/* --- autoloader --- */
require_once(ROOT_DIR."services/Autoloader.php");
/* --- autoload --- */
spl_autoload_register(array(new \fadeev\php2\services\Autoloader(), "loadClass"));
/* --- session --- */
if (empty($_SESSION))
{
  (new \fadeev\php2\services\Sessions)->Start();
}
ini_set('display_errors',1);
error_reporting(E_ALL);
/* --- request --- */
$request = new \fadeev\php2\services\Request();
/* --- controller --- */
$controllerName = $request->getControllerName() ?: 'index';
$actionName = $request->getActionName();
$controllerClass = CONTROLLERS_NAMESPACE.ucfirst($controllerName)."Controller";
if(class_exists($controllerClass))
{
  $controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
  $controller->RunAction($actionName);
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo SID;
?>