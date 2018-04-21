<?php
namespace fadeev\php2\interfaces;

interface IModel
{
  public function getTableName();
  public function GetById($id);
  public function GetList($arFilter = array());
}
?>