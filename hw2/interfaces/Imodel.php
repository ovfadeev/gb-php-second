<?php
namespace fadeev\php2\interfaces;

interface IModel
{
  public function getTableName();
  public function Add($arParams = array());
  public function Update($arParams = array());
  public function Remove($id);
  public function GetById($id);
  public function GetList($arFilter = array());
}
?>