<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Orders
*/
class Orders
{
  public function getTableName()
  {
    return DB_PREFIX_TABLE."orders";
  }

  public function Add($arParams = array())
  {
    return false;
  }

  public function Update($arParams = array())
  {
    return false;
  }

  public function Remove($id)
  {
    return false;
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