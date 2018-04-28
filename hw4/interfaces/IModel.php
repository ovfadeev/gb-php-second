<?php
namespace fadeev\php2\interfaces;

interface IModel
{
  public static function getTableName();
  public static function GetById($id, $arSelect = array());
  public static function GetList($arFilter = array(), $arSelect = array());
  public function Add();
  public function Update();
  public function Remove();
  public function Save();
}
?>