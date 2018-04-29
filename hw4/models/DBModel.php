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

  public function PrivateColumns()
  {
    return array("DB");
  }

  public function Add()
  {
    $arPrepareSql = PrepareSql::Add(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    try {
      Db::getInstance()->Query($arPrepareSql["sql"], $arPrepareSql["params"]);
      $this->id = $this->db->lastInsertId();
    } catch (PDOExecption $e) {
      die($e->getMessage());
    }
  }

  public function Update()
  {
    $arPrepareSql = PrepareSql::Update(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    $res = DB::GetInstance()
      ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->RowCount();
    return $res;
  }

  public function Remove()
  {
    $arPrepareSql = PrepareSql::Remove(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    $res = DB::GetInstance()
      ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->RowCount();
    return $res;
  }

  public function Save()
  {
    # code...
  }

  public static function GetById($id, $arSelect = array())
  {
    $arPrepareSql = PrepareSql::Select(
      static::getTableName(),
      array("id" => $id),
      $arSelect
    );
    $result = Db::getInstance()
      ->queryObject($arPrepareSql["sql"], $arPrepareSql["params"], get_called_class());
    return $result;
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