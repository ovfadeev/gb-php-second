<?php
/* --- database --- */
define("DB_NAME", "php2");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");
define("DB_PREFIX_TABLE", "php2_");
/* --- autoloader --- */
include($_SERVER["DOCUMENT_ROOT"]."/../services/Autoloader.php");
spl_autoload_register([new \fadeev\php2\services\Autoloader(), 'loadClass']);
?>