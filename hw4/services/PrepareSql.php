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

  public static function Add($table, $arParams = array(), $privateParams = array())
  {
    // $arColumns = array_map(function ($v){
    //   if (!empty($privateParams) && !in_array($key, $privateParams))
    //   {
    //     return $v;
    //   }
    // }, array_keys($arParams));

    echo "<pre>";
    print_r(array_keys($arParams));
    echo "</pre>";

    // $params = [];
    // $columns = [];
    // foreach ($arParams as $key => $value) {
    //   if (!empty($privateParams) && in_array($key, $privateParams)) {
    //     continue;
    //   }

    //   $params[":{$key}"] = $value;
    //   $columns[] = "`{$key}`";
    // }

    // $columns = implode(", ", $columns);
    // $placeholders = implode(", ", array_keys($params));

    // $sql = "INSERT INTO ".$table." (".$columns.") VALUES (".$placeholders.")";
    // $sql = "INSERT INTO ".$table;
    // if (!empty($arParams))
    // {
    //   $sql .= " (";
    //   $sql .= implode(", ", array_keys($arParams));
    //   $sql .= ")";
    //   $sql .= " VALUES (";
    //   $sql .= implode(
    //     ", ",
    //     array_map(function ($v) {
    //       return "'".$v."'";
    //     }, $arParams)
    //   );
    //   $sql .= ")";

    // }
    // $sql .= ";";
    return $sql;
  }
}
?>