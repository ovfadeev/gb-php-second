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

  public function Update($arParams = array())
  {
    return false;
  }

  public function Remove($id)
  {
    return false;
  }

  public function GetById($id, $arSelect = array())
  {
    $tableName = $this->GetTableName();
    $sql = "SELECT * FROM ".$tableName." WHERE id = ".$id;
    $res = $this->db->Query($sql)->FetchAll();
    return $res[0];
  }

  public function GetList($arFilter = array(), $arSelect = array())
  {
    $tableName = $this->getTableName();
    $sql = $this->db->PrepareSql($tableName, $arFilter, $arSelect);
    $res = $this->db->Query($sql)->FetchAll();
    return $res;
  }
}
?>