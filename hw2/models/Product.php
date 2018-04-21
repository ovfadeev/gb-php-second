<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Product
*/
class Product
{
  private $db;

  function __construct()
  {
    
    $this->db = new DB();
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