<?php
namespace fadeev\php2\interfaces;

interface IDBModel
{
  public static function getTableName();
  public static function getById($id, $arSelect = array());
  public static function getList($arFilter = array(), $arSelect = array());
  public function add();
  public function update();
  public function delete();
  public function save();
  public function privateColumns();
}
?>