<?php
namespace fadeev\php2\models;
use \fadeev\php2\models\DB;
/**
 * Корзина
 */
class Basket extends DBModel
{
  public static function GetTableName()
  {
    return DB_PREFIX_TABLE."basket";
  }
}