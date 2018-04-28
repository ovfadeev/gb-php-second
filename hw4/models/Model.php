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

  public function Add($arParams = array())
  {
    $tableName = $this->getTableName();
    $sql = PrepareSql::Add($tableName, $arParams);
    $res = $this->db->Query($sql)->RowCount();
    return $res;
  }

  public function Update($id, $arParams = array())
  {
    $tableName = $this->getTableName();
    $sql = PrepareSql::Update($tableName, $id, $arParams);
    $res = $this->db->Query($sql)->RowCount();
    return $res;
  }

  public function Remove($id)
  {
    $tableName = $this->GetTableName();
    $sql = PrepareSql::Delete($tableName, array("id" => $id));
    $res = $this->db->Query($sql)->RowCount();
    return $res;
  }

  public function GetById($id, $arSelect = array())
  {
    $tableName = $this->GetTableName();
    $sql = PrepareSql::Select($tableName, array("id" => $id), $arSelect);
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult[0];
  }

  public function GetList($arFilter = array(), $arSelect = array())
  {
    $tableName = $this->getTableName();
    $sql = PrepareSql::Select($tableName, $arFilter, $arSelect);
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult;
  }
}
?>