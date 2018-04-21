<?php
include($_SERVER["DOCUMENT_ROOT"]."/../services/init.php");
include($_SERVER["DOCUMENT_ROOT"]."/../services/Autoloader.php");
spl_autoload_register([new \fadeev\php2\services\Autoloader(), 'loadClass']);

$product = new \fadeev\php2\models\Product();
echo "<pre>";
var_dump($product);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ДЗ 2 - Олег Фадеев</title>
</head>
<body>
  
</body>
</html>