<?php
namespace fadeev\php2\models;
use fadeev\php2\services\DB;
use fadeev\php2\models\DataEntity;
use fadeev\php2\services\PrepareSql;

abstract class Repository
{
  protected $db;
  protected $date_insert;

  function __construct()
  {
    $this->db = DB::GetInstance();
  }

  abstract public function GetTableName();

  abstract public function GetEntityClass();

  public function PrivateColumns()
  {
    return array("DB", "date_insert", "date_update");
  }

  public function Add(DataEntity $entity)
  {
    $arPrepareSql = PrepareSql::Add(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    $this->db->Query($arPrepareSql["sql"], $arPrepareSql["params"]);
    $this->id = $this->db->lastInsertId();
  }

  public function Update(DataEntity $entity)
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

  public function Delete(DataEntity $entity)
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

  public function Save(DataEntity $entity)
  {
    if ($this->date_insert){
      $this->Update();
    } else {
      $this->Add();
    }
  }

  public function GetById($id, $arSelect = array())
  {
    $arPrepareSql = PrepareSql::Select(
      static::getTableName(),
      array("id" => $id),
      $arSelect
    );
    $result = Db::getInstance()
      ->queryObject($arPrepareSql["sql"], $arPrepareSql["params"], $this->GetEntityClass());
    return $result;
  }

  public function GetList($arFilter = array(), $arSelect = array())
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