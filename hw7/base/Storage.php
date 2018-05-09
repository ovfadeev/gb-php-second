<?php
namespace fadeev\php2\base;

class Storage
{
  protected $items = array();

  public function Set($key, $object)
  {
    $this->items[$key] = $object;
  }

  public function Get($key)
  {
    echo "<pre>";
    var_dump(App::Call());
    echo "</pre>";
    if(!isset($this->items[$key]))
    {
      $this->items[$key] = App::Call()->CreateComponent($key);
    }
    return $this->items[$key];
  }
}