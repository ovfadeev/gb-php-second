<?php
/**
* Пользователь
*/
class Users
{
  public $id;
  public $name;
  public $lastName;
  public $email;
  public $login;
  protected $password;

  function __construct($name, $lastName, $email, $login, $password)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;
  }

  public function Add()
  {
    $newPass = $this->HashPassword($this->password);
    $db = new DataBase();
    $query = "INSERT INTO Users (name, last_name, email, login, password) VALUES ('".$name."', '".$lastName."', '".$email."', '".$login."', '".$newPass."');";
    $res = $db->query($query);
  }

  public function Remove($login)
  {
    return false;
  }

  protected function HashPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function Auth($login, $password)
  {
    return false;
  }

  public function GetById($id)
  {
    return false;
  }

  public function GetByLogin($login)
  {
    return false;
  }

  public function GetList($arFilter = array())
  {
    return false;
  }
}

/**
* О пользователе
*/
class UsersParams extends Users
{
  public $phone;
  public $city;
  public $work;
  public $picture_id;

  function __construct($phone, $city, $work, $picture_id, $name, $lastName, $email, $login, $password)
  {
    $this->phone = $phone;
    $this->city = $city;
    $this->work = $work;
    $this->picture_id = $picture_id;

    parent::__construct($name, $lastName, $email, $login, $password);
  }
}

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
?>