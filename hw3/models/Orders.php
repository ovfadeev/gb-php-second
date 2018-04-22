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
}
?>