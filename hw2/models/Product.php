<?php
namespace fadeev\php2\models;
/**
* Product
*/
class Product
{
  private $db;

  function __construct()
  {
    
    $this->db = new \fadeev\php2\models\DB();
  }

  public function GetById($id)
  {
    return false;
  }

  public function GetList($arFilter)
  {
    return false;
  }
}
?>