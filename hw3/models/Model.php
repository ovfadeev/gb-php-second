<?php
namespace fadeev\php2\models;
use \fadeev\php2\interfaces\IModel;
use \fadeev\php2\models\DB;
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
    $sql = $this->db->PrepareAddSql($tableName, $arParams);
    $res = $this->db->Query($sql)->RowCount();
    return $res;
  }

  public function Update($id, $arParams = array())
  {
    $tableName = $this->getTableName();
    $sql = $this->db->PrepareUpdateSql($tableName, $id, $arParams);
    $res = $this->db->Query($sql)->RowCount();
    return $res;
  }

  public function Remove($id)
  {
    $tableName = $this->GetTableName();
    $sql = $this->db->PrepareDeleteSql($tableName, array("id" => $id));
    $res = $this->db->Query($sql)->RowCount();
    return $res;
  }

  public function GetById($id, $arSelect = array())
  {
    $tableName = $this->GetTableName();
    $sql = $this->db->PrepareSelectSql($tableName, array("id" => $id), $arSelect);
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult[0];
  }

  public function GetList($arFilter = array(), $arSelect = array())
  {
    $tableName = $this->getTableName();
    $sql = $this->db->PrepareSelectSql($tableName, $arFilter, $arSelect);
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult;
  }
}
?>