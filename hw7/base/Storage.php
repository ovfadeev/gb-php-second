<?php
namespace fadeev\php2\base;

class Storage
{
  protected $items = array();

  public function set($key, $object)
  {
    $this->items[$key] = $object;
  }

  public function get($key)
  {
    if(!isset($this->items[$key]))
    {
      $this->items[$key] = App::call()->CreateComponent($key);
    }
    return $this->items[$key];
  }
}