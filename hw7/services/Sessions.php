<?php
namespace fadeev\php2\services;

class Sessions
{
  public function Start()
  {
    session_start();
    $this->Set('id', session_id());
  }

  public function Get($key)
  {
    return $_SESSION[$key];
  }

  public function Set($key, $value)
  {
    $_SESSION[$key] = $value;
  }
}