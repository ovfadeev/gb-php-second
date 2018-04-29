<?php
namespace fadeev\php2\models;
use \fadeev\php2\interfaces\IDBModel;
use \fadeev\php2\services\DB;
use \fadeev\php2\services\PrepareSql;
/**
* Data base model
*/
abstract class DBModel extends Model implements IDBModel
{
  protected $db;

  function __construct()
  {
    $this->db = DB::GetInstance();
  }

  public function Add()
  {
    echo "<pre>";
    var_dump($this);
    echo "</pre>";
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
    # code...
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