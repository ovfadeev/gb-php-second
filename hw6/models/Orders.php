<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DB;

class Orders extends DBModel
{
  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."orders";
  }
}
?>