<?php
namespace fadeev\php2\models;
use fadeev\php2\services\DB;
use fadeev\php2\services\PrepareSql;

abstract class Repository
{
  protected $db;
  protected $date_insert;

  function __construct()
  {
    $this->db = DB::GetInstance();
  }

  public function PrivateColumns()
  {
    return array("DB", "date_insert", "date_update");
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
    if ($this->date_insert){
      $this->Update();
    } else {
      $this->Add();
    }
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