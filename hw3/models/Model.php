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
    $this->db = DB::getInstance();
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
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM ".$tableName." WHERE id = ".$id;
    $res = $this->db->query($sql)->FetchAll();
    return $res[0];
  }

  public function GetList($arFilter = array(), $arSelect = array())
  {
    $tableName = $this->getTableName();
    $sql = "";
    if (!empty($arSelect))
    {
      $sql .= "SELECT ".implode(", ", $arSelect);
    }
    else
    {
      $sql .= "SELECT *";
    }
    $sql .= " FROM ".$tableName;
    if (!empty($arFilter))
    {
      $sql .= " WHERE ";
      foreach ($arFilter as $key => $value)
      {
        $arStrFilter[] = $key." = ".$value;
      }
      $sql .= implode(" AND ", $arStrFilter);
    }
    $sql .= ";";
    $res = $this->db->query($sql)->FetchAll();
    return $res;
  }
}
?>