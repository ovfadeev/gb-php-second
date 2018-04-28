<?php
namespace fadeev\php2\models;
use \fadeev\php2\interfaces\IModel;
use \fadeev\php2\services\DB;
use \fadeev\php2\services\PrepareSql;
/**
* Model
*/
abstract class Model implements IModel
{
  protected $db;

  function __construct()
  {
    $this->db = DB::GetInstance();
  }

  public function Add()
  {
    // $tableName = static::getTableName();
    // $sql = PrepareSql::Add($tableName, $arParams);
    // $res = $this->db->Query($sql)->RowCount();
    // return $res;
  }

  public function Update()
  {
    // $tableName = static::getTableName();
    // $sql = PrepareSql::Update($tableName, $id, $arParams);
    // $res = $this->db->Query($sql)->RowCount();
    // return $res;
  }

  public function Remove()
  {
    // $tableName = static::getTableName();
    // $sql = PrepareSql::Delete($tableName, array("id" => $id));
    // $res = $this->db->Query($sql)->RowCount();
    // return $res;
  }

  public function Save()
  {
    $tableName = static::getTableName();
  }

  public static function GetById($id, $arSelect = array())
  {
    $tableName = static::getTableName();
    $sql = PrepareSql::Select($tableName, array("id" => $id), $arSelect);
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult[0];
  }

  public static function GetList($arFilter = array(), $arSelect = array())
  {
    $tableName = $this->getTableName();
    $sql = PrepareSql::Select($tableName, $arFilter, $arSelect);
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult;
  }
}
?>