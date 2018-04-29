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
    return array(
      "sql" => $sql
    );
  }

  public static function Delete($table, $arFilter = array())
  {
    // $sql = "DELETE";
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
    // return $sql;
  }

  public static function Update($table, $obj)
  {
    $arParams = array();
    $arColumns = array();
    foreach ($obj as $prop => $value)
    {
      if (!empty($privateParams) && in_array($prop, $privateParams))
      {
        continue;
      }
      $arParams[":".$prop] = $value;
      $arColumns[] = "`".$prop."`";
    }
    $strColumns = implode(", ", $arColumns);
    $placeholders = implode(", ", array_keys($arParams));
    $sql = "UPDATE ".$table." SET ".." WHERE "..";";
    return array(
      "sql" => $sql,
      "params" => $arParams
    );

    // $sql = "UPDATE ".$table;
    // if (!empty($arParams))
    // {
    //   $sql .= " SET ";
    //   $sql .= implode(
    //     ", ",
    //     array_map(function ($k, $v) {
    //       return $k." = '".$v."'";
    //     }, array_keys($arParams), $arParams)
    //   );
    // }
    // $sql .= " WHERE id = ".$id;
    // $sql .= ";";
    // return $sql;
  }

  public static function Add($table, $obj, $privateParams = array())
  {
    $arParams = array();
    $arColumns = array();
    foreach ($obj as $prop => $value)
    {
      if (!empty($privateParams) && in_array($prop, $privateParams))
      {
        continue;
      }
      $arParams[":".$prop] = $value;
      $arColumns[] = "`".$prop."`";
    }
    $strColumns = implode(", ", $arColumns);
    $placeholders = implode(", ", array_keys($arParams));
    $sql = "INSERT INTO ".$table." (".$strColumns.") VALUES (".$placeholders.");";
    return array(
      "sql" => $sql,
      "params" => $arParams
    );
  }
}
?>