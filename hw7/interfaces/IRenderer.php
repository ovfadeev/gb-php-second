<?php
namespace fadeev\php2\interfaces;

interface IRenderer
{
  public function render($template, $arParams = array());
}