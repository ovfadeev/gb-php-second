<?php
namespace fadeev\php2\interfaces;

interface IModel
{
  public function getTableName();
  public function Add($arParams = array());
  public function Update($id, $arParams = array());
  public function Remove($id);
  public function GetById($id, $arSelect = array());
  public function GetList($arFilter = array(), $arSelect = array());
}
?>