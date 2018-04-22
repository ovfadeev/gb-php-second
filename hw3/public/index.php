<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$db = new \fadeev\php2\models\DB();
echo "<pre>";
var_dump($db->Query(""));
echo "</pre>";


$product = new \fadeev\php2\models\Product();
echo "<pre>";
var_dump($product);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ДЗ 3 - Олег Фадеев</title>
</head>
<body>
  
</body>
</html>