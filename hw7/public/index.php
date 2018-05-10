<?php
define("DEV_NAMESPACE", "fadeev\\php2\\");
/* --- autoloader --- */
include(__DIR__."/../services/Autoloader.php");
spl_autoload_register(array(new \fadeev\php2\services\Autoloader(), 'loadClass'));
/* --- session --- */
if (empty($_SESSION["id"]))
{
  (new \fadeev\php2\services\Sessions)->Start();
}
/* --- application --- */
$config = include(__DIR__."/../config/main.php");
\fadeev\php2\base\App::Call()->Run($config);
// \fadeev\php2\base\App::GetInstance()->Run($config);

// /* --- main config --- */
// require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");
// /* --- autoloader --- */
// require_once(ROOT_DIR."services/Autoloader.php");
// /* --- autoload --- */
// spl_autoload_register(array(new \fadeev\php2\services\Autoloader(), "loadClass"));
// /* --- session --- */
// if (empty($_SESSION["id"]))
// {
//   (new \fadeev\php2\services\Sessions)->Start();
// }
// /* --- request --- */
// $request = new \fadeev\php2\services\Request();
// /* --- controller --- */
// $controllerName = $request->GetControllerName() ?: 'index';
// $actionName = $request->GetActionName();
// $controllerClass = CONTROLLERS_NAMESPACE.ucfirst($controllerName)."Controller";
// if(class_exists($controllerClass))
// {
//   $controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
//   $controller->RunAction($actionName);
// } else {
//   throw new Exception("Controller not found", 404);
// }
?>