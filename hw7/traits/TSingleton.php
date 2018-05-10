<?php
namespace fadeev\php2\traits;

trait TSingleton
{
  private static $instance;

  private function __construct(){}
  private function __clone(){}
  private function __wakeup(){}

  /**
   * @return static
   */
  public static function GetInstance()
  {
    if (is_null(static::$instance))
    {
      static::$instance = new static();
    }
    return static::$instance;
  }
}
?>