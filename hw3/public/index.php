<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$product = new \fadeev\php2\models\Product();
echo "<pre>";
var_dump($product);
echo "</pre>";

$user = new \fadeev\php2\models\Users();

echo "<pre>";
print_r($user->GetById(3));
echo "</pre>";

$usersList = $user->GetList(
  array("id" => 3),
  array("f_name", "l_name")
);

echo "<pre>";
print_r($usersList);
echo "</pre>";

$usersList = $user->GetList(
  array(),
  array("login", "f_name", "l_name", "date_register")
);

echo "<pre>";
print_r($usersList);
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