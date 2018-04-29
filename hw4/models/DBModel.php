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
    $res = false;
    $arPrepareSql = PrepareSql::Update(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    echo "<pre>";
    print_r($arPrepareSql);
    echo "</pre>";
    try {
      $res = Db::getInstance()
        ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
        ->rowCount();
    } catch (PDOExecption $e) {
      die($e->getMessage());
    }
    return $res;
  }

  public function Remove()
  {
    $arPrepareSql = PrepareSql::Remove(
      static::getTableName(),
      $this,
      $this->PrivateColumns()
    );
    try {
      $res = Db::getInstance()
        ->Query($arPrepareSql["sql"], $arPrepareSql["params"])
        ->rowCount();
    } catch (PDOExecption $e) {
      die($e->getMessage());
    }
    return $res;
  }

  public function Save()
  {
    if (!$this->Update())
    {
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