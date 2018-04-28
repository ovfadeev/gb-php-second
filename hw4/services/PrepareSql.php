<?php
namespace fadeev\php2\services;
/**
* PrepareSql
*/
class PrepareSql
{
  public static function Select($table, $arFilter = array(), $arSelect = array())
  {
    $sql = "";
    if (!empty($arSelect))
    {
      $sql .= "SELECT ".implode(", ", $arSelect);
    }
    else
    {
      $sql .= "SELECT *";
    }
    $sql .= " FROM ".$table;
    if (!empty($arFilter))
    {
      $sql .= " WHERE ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = ".$v;
        }, array_keys($arFilter), $arFilter)
      );
    }
    $sql .= ";";
    return $sql;
  }

  public static function Delete($table, $arFilter = array())
  {
    $sql = "DELETE";
    $sql .= " FROM ".$table;
    if (!empty($arFilter))
    {
      $sql .= " WHERE ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = ".$v;
        }, array_keys($arFilter), $arFilter)
      );
    }
    $sql .= ";";
    return $sql;
  }

  public static function Update($table, $id, $arParams = array())
  {
    $sql = "UPDATE ".$table;
    if (!empty($arParams))
    {
      $sql .= " SET ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = '".$v."'";
        }, array_keys($arParams), $arParams)
      );
    }
    $sql .= " WHERE id = ".$id;
    $sql .= ";";
    return $sql;
  }

  public static function Add($table, $arParams = array())
  {
    $sql = "INSERT INTO ".$table;
    if (!empty($arParams))
    {
      $sql .= " (";
      $sql .= implode(", ", array_keys($arParams));
      $sql .= ")";
      $sql .= " VALUES (";
      $sql .= implode(
        ", ",
        array_map(function ($v) {
          return "'".$v."'";
        }, $arParams)
      );
      $sql .= ")";

    }
    $sql .= ";";
    return $sql;
  }
}
?>