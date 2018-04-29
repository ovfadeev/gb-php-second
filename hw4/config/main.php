<?php
define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../");
define("TEMPLATES_DIR", ROOT_DIR . "views/");
define("CONTROLLERS_NAMESPACE", 'fadeev\php2\controllers\\');
/* --- database --- */
require_once(ROOT_DIR."config/db.php");
/* --- autoloader --- */
require_once(ROOT_DIR."services/Autoloader.php");

spl_autoload_register([new \fadeev\php2\services\Autoloader(), 'loadClass']);
?>