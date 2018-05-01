<?php
namespace fadeev\php2\interfaces;

interface IRenderer
{
  public function Render($template, $arParams = array());
}