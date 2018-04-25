<?php
namespace fadeev\php2\traits;

trait TSingleton
{
  private static $instance;

  private function __construct(){}
  private function __clone(){}
  private function __wakeup(){}

  public static function GetInstance()
  {
    if (is_null($instance))
    {
      static::$instance = new Static();
    }
    return static::$instance;
  }
}
?>