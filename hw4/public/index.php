<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$user = new \fadeev\php2\models\Users(null, 'Vasya', 'Pupkin', 'test@test.ru', 'test', '123123');
echo "<pre>";
var_dump($user);
echo "</pre>";

/*// GetById
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
  array("login", "email", "f_name", "l_name", "date_register")
);

echo "<pre>";
print_r($usersList);
echo "</pre>";

// Remove
echo "<pre>";
var_dump($user->Remove(5));
echo "</pre>";

// update
$userUpdate = $user->Update(
  3,
  array(
    "login" => "test_update", "f_name" => "test_f_name_update"
  )
);
echo "<pre>";
var_dump($userUpdate);
echo "</pre>";
// add
$userAdd = $user->Add(
  array(
    "login" => "123123123",
    "password" => "asdasd asd asd asd ",
    "email" => "test@test.ru",
    "f_name" => "test_add",
    "l_name" => "test add",
    "image" => "/images/reviews.jpg",
    "address" => "Москва"
  )
);
echo "<pre>";
var_dump($userAdd);
echo "</pre>";*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ДЗ 4 - Олег Фадеев</title>
</head>
<body>
  
</body>
</html>