<?php
namespace fadeev\php2\models;
/**
* Orders
*/
class Orders
{
  function __construct()
  {
    $this->db = new DB();
  }

  public function getTableName()
  {
    return DB_PREFIX_TABLE."orders";
  }

  public function GetById($id)
  {
    return false;
  }

  public function GetList($arFilter = array())
  {
    return false;
  }
}
?>