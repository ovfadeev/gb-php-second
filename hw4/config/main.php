<?php
/* --- database --- */
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/db.php");
/* --- autoloader --- */
require_once($_SERVER["DOCUMENT_ROOT"]."/../services/Autoloader.php");

spl_autoload_register([new \fadeev\php2\services\Autoloader(), 'loadClass']);
?>