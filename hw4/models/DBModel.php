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
    $this->db->Query($arPrepareSql["sql"], $arPrepareSql["params"]);
    $this->id = $this->db->lastInsertId();
  }

  public function Update()
  {
    $res = false;
    $arPrepareSql = PrepareSql::Update(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    $res = $this->db
      ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->rowCount();
    return $res;
  }

  public function Delete()
  {
    $arPrepareSql = PrepareSql::Delete(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    $res = $this->db
      ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->rowCount();
    return $res;
  }

  public function Save()
  {
    $res = false;
    if (($res = $this->Update()) <= 0)
    {
      $this->Add();
      if ($this->id > 0){
        $res = true;
      }
    }
    return $res;
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
    $arPrepareSql = PrepareSql::Select(
      static::getTableName(),
      $arFilter,
      $arSelect
    );
    $arResult = Db::getInstance()
      ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->FetchAll();
    return $arResult;
  }
}
?>