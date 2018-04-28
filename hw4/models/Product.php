<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Product
*/
class Product extends Model
{
  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."products";
  }
}
?>