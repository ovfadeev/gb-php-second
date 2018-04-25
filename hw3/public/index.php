<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$product = new \fadeev\php2\models\Product();
echo "<pre>";
var_dump($product);
echo "</pre>";

$user = new \fadeev\php2\models\Users();

// GetById
echo "<pre>";
print_r($user->GetById(3));
echo "</pre>";

// GetList filter and select
$usersList = $user->GetList(
  array("id" => 3),
  array("f_name", "l_name")
);

echo "<pre>";
print_r($usersList);
echo "</pre>";

// GetList filter and select
$usersList = $user->GetList(
  array(),
  array("id", "login", "f_name", "l_name", "date_register")
);

echo "<pre>";
print_r($usersList);
echo "</pre>";

// Remove
// echo "<pre>";
// print_r($user->Remove(4));
// echo "</pre>";

// update
$userUpdate = $user->Update(
  3,
  array(
    "login" => "test_update", "f_name" => "test_f_name_update"
  )
);

// add
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