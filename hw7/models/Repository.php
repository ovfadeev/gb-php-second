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

  abstract public function getTableName();

  abstract public function getEntityClass();

  public function privateColumns()
  {
    return array("DB", "date_insert", "date_update");
  }

  public function add(DataEntity $entity)
  {
    $arPrepareSql = (new PrepareSql)->add(
      $this->getTableName(),
      $this,
      $this->privateColumns()
    );
    $this->db->Query($arPrepareSql["sql"], $arPrepareSql["params"]);
    $this->id = $this->db->lastInsertId();
  }

  public function Update(DataEntity $entity)
  {
    $res = false;
    $arPrepareSql = (new PrepareSql)->update(
      $this->getTableName(),
      $this,
      $this->privateColumns()
    );
    $res = $this->db
      ->query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->rowCount();
    return $res;
  }

  public function Delete(DataEntity $entity)
  {
    $arPrepareSql = (new PrepareSql)->delete(
      $this->getTableName(),
      $this,
      $this->privateColumns()
    );
    $res = $this->db
      ->query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->rowCount();
    return $res;
  }

  public function save(DataEntity $entity)
  {
    if ($this->date_insert){
      $this->update();
    } else {
      $this->add();
    }
  }

  public function getById($id, $arSelect = array())
  {
    $arPrepareSql = (new PrepareSql)->select(
      $this->getTableName(),
      array("id" => $id),
      $arSelect
    );
    $result = $this->db
      ->queryObject($arPrepareSql["sql"], $arPrepareSql["params"], $this->getEntityClass());
    return $result;
  }

  public function GetList($arFilter = array(), $arSelect = array())
  {
    $arPrepareSql = (new PrepareSql)->select(
      $this->getTableName(),
      $arFilter,
      $arSelect
    );
    $arResult = $this->db
      ->query($arPrepareSql["sql"], $arPrepareSql["params"])
      ->fetchAll();
    return $arResult;
  }
}
?>