<?php
namespace fadeev\php2\models;
use fadeev\php2\models\DB;

class Basket extends DBModel
{
  public function GetTableName()
  {
    return DB_PREFIX_TABLE."basket";
  }
}