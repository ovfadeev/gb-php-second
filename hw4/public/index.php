<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../config/main.php");

$user = new \fadeev\php2\models\Users(null, 'Vasya', 'Pupkin', 'test@test.ru', 'test', '123123');
$user->Add();
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