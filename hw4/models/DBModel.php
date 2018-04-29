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
    $sql = PrepareSql::Add(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    echo $sql;
    // $res = DB::GetInstance()->Query($sql)->RowCount();
    return $res;
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
    $sql = PrepareSql::Select(
      static::getTableName(),
      array("id" => $id),
      $arSelect
    );
    $arResult = DB::GetInstance()->Query($sql)->FetchAll();
    return $arResult[0];
  }

  public static function GetList($arFilter = array(), $arSelect = array())
  {
    $sql = PrepareSql::Select(
      static::getTableName(),
      $arFilter,
      $arSelect
    );
    $arResult = DB::GetInstance()->Query($sql)->FetchAll();
    return $arResult;
  }
}
?>