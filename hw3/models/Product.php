<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Product
*/
class Product extends Model
{
  protected $db;

  function __construct()
  {
    $this->db = new DB();
  }

  public function getTableName()
  {
    return DB_PREFIX_TABLE."products";
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