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

  public static function Delete($table, $obj, $privateColumns = array())
  {
    $arParams = array();
    $arColumns = array();
    foreach ($obj as $prop => $value)
    {
      if (!empty($privateColumns) && in_array($prop, $privateColumns))
      {
        continue;
      }
      $arParams[":".$prop] = $value;
      $arColumns[] = $prop." = :".$prop;
    }
    $strColumns = implode(" AND ", $arColumns);
    return array(
      "sql" => "DELETE FROM ".$table." WHERE ".$strColumns.";",
      "params" => $arParams
    );
  }

  public static function Update($table, $obj, $privateColumns = array())
  {
    $arParams = array();
    $arColumns = array();
    foreach ($obj as $prop => $value)
    {
      if (!empty($privateColumns) && in_array($prop, $privateColumns))
      {
        continue;
      }
      $arParams[":".$prop] = $value;
      if ($prop == "id")
      {
        continue;
      }
      $arColumns[] = $prop." = :".$prop;
    }
    $strColumns = implode(", ", $arColumns);
    return array(
      "sql" => "UPDATE ".$table." SET ".$strColumns." WHERE id = :id;",
      "params" => $arParams
    );
  }

  public static function Add($table, $obj, $privateColumns = array())
  {
    $arParams = array();
    $arColumns = array();
    foreach ($obj as $prop => $value)
    {
      if (!empty($privateColumns) && in_array($prop, $privateColumns))
      {
        continue;
      }
      $arParams[":".$prop] = $value;
      $arColumns[] = "`".$prop."`";
    }
    $strColumns = implode(", ", $arColumns);
    $placeholders = implode(", ", array_keys($arParams));
    return array(
      "sql" => "INSERT INTO ".$table." (".$strColumns.") VALUES (".$placeholders.");",
      "params" => $arParams
    );
  }
}
?>