<?php
/* --- config --- */
include(__DIR__."/../config/db.php");
define("DEV_NAMESPACE", "fadeev\\php2\\");
/* --- autoloader --- */
include(__DIR__."/../services/Autoloader.php");
spl_autoload_register(array(new \fadeev\php2\services\Autoloader(), 'loadClass'));
/* --- application --- */
$config = include(__DIR__."/../config/main.php");
\fadeev\php2\base\App::call()->run($config);
?>