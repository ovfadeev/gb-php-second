<?php
namespace fadeev\php2\services;

class Sessions
{
  public function __construct()
  {
    session_start();
    $this->Set('id', session_id());
  }

  public function get($key)
  {
    return $_SESSION[$key];
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function remove($key)
  {
    unset($_SESSION[$key]);
  }
}