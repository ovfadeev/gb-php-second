<?php
namespace fadeev\php2\services;

class Preparesql
{
  public function select($table, $arFilter = array(), $arSelect = array())
  {
    $sql = "SELECT ";
    if (!empty($arSelect))
    {
      $sql .= implode(", ", $arSelect);
    }
    else
    {
      $sql .= "*";
    }
    $sql .= " FROM ".$table;
    if (!empty($arFilter))
    {
      $sql .= " WHERE ";
      $sql .= implode(
        ", ",
        array_map(function ($k, $v) {
          return $k." = '".$v."'";
        }, array_keys($arFilter), $arFilter)
      );
    }
    $sql .= ";";
    return array(
      "sql" => $sql,
      "params" => array()
    );
  }

  public function delete($table, $obj, $privateColumns = array())
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

  public function update($table, $obj, $privateColumns = array())
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

  public function add($table, $obj, $privateColumns = array())
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