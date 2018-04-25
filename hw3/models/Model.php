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
    return false;
  }

  public function Update($id, $arParams = array())
  {
    $tableName = $this->getTableName();
    $sql = $this->db->PrepareUpdateSql($tableName, $id, $arParams);
    echo $sql;
    $arResult = $this->db->Query($sql)->FetchAll();
    return $arResult;
  }

  public function Remove($id)
  {
    $tableName = $this->GetTableName();
    $sql = $this->db->PrepareDeleteSql($tableName, array("id" => $id));
    return $this->db->Query($sql)->FetchAll();
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