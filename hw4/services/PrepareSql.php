<?php
namespace fadeev\php2\services;
/**
* PrepareSql
*/
class PrepareSql
{
  public static function Select($table, $arFilter = array(), $arSelect = array())
  {

    // $sql = "";
    // if (!empty($arSelect))
    // {
    //   $sql .= "SELECT ".implode(", ", $arSelect);
    // }
    // else
    // {
    //   $sql .= "SELECT *";
    // }
    // $sql .= " FROM ".$table;
    // if (!empty($arFilter))
    // {
    //   $sql .= " WHERE ";
    //   $sql .= implode(
    //     ", ",
    //     array_map(function ($k, $v) {
    //       return $k." = ".$v;
    //     }, array_keys($arFilter), $arFilter)
    //   );
    // }
    // $sql .= ";";
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

  public static function Add($table, $objParams, $privateParams = array())
  {
    $params = array();
    $columns = array();
    foreach ($objParams as $prop => $value)
    {
      if (!empty($privateParams) && in_array($prop, $privateParams))
      {
        continue;
      }
      $params[":{$prop}"] = $value;
      $columns[] = "`{$prop}`";
    }
    $columns = implode(", ", $columns);
    $placeholders = implode(", ", array_keys($params));
    $sql = "INSERT INTO ".$table." (".$columns.") VALUES (".$placeholders.")";
    return array(
      "sql" => $sql,
      "params" => $params
    );
  }
}
?>