<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
* Product
*/
class Product extends Model
{
  public function getTableName()
  {
    return DB_PREFIX_TABLE."products";
  }
}
?>