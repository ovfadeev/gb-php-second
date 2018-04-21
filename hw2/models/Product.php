<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Product
*/
class Product extends Model
{
  private $db;

  function __construct()
  {
    $this->db = new DB();
  }

  public function getTableName()
  {
    return DB_PREFIX_TABLE."products";
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