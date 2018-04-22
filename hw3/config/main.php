<?php
/* --- database --- */
define("DB_TYPE", "mysql");
define("DB_NAME", "gb-php-second");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");
define("DB_CHARSET", "utf8");
define("DB_PREFIX_TABLE", "php2_");
/* --- autoloader --- */
include($_SERVER["DOCUMENT_ROOT"]."/../services/Autoloader.php");
spl_autoload_register([new \fadeev\php2\services\Autoloader(), 'loadClass']);
?>