<?php
namespace fadeev\php2\models;
use fadeev\php2\base\App;
use fadeev\php2\models\DataEntity;
use fadeev\php2\services\PrepareSql;

abstract class Repository
{
  protected $db;
  protected $date_insert;

  function __construct()
  {
    $this->db = App::Call()->db;
  }

  abstract public function GetTableName();

  abstract public function GetEntityClass();

  public function PrivateColumns()
  {
    return array("DB", "date_insert", "date_update");
  }

  public function Add(DataEntity $entity)
  {
    $arPrepareSql = (new PrepareSql)->Add(
      $this->GetTableName(),
      $this,
      $this->PrivateColumns()
    );
    $this->db->Query($arPrepareSql["sql"], $arPrepareSql["params"]);
    $this->id = $this->db->lastInsertId();
  }

  public function Update(DataEntity $entity)
  {
    $res = false;
    $arPrepareSql = (new PrepareSql)->Update(
      $this->GetTableName(),
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
    $arPrepareSql = (new PrepareSql)->Delete(
      $this->GetTableName(),
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
    $arPrepareSql = (new PrepareSql)->Select(
      $this->GetTableName(),
      array("id" => $id),
      $arSelect
    );
    $result = $this->db
      ->queryObject($arPrepareSql["sql"], $arPrepareSql["params"], $this->GetEntityClass());
    return $result;
  }

  public function GetList($arFilter = array(), $arSelect = array())
  {
    $arPrepareSql = (new PrepareSql)->Select(
      $this->GetTableName(),
      $arFilter,
      $arSelect
    );
    $arResult = $this->db
      ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->FetchAll();
    return $arResult;
  }
}
?>