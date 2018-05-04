<?php
namespace fadeev\php2\interfaces;

interface IRepository
{
  public function getTableName();
  public function GetById($id, $arSelect = array());
  public function GetList($arFilter = array(), $arSelect = array());
  public function Add();
  public function Update();
  public function Delete();
  public function Save();
  public function PrivateColumns();
}
?>