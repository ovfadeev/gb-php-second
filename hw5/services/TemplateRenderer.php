<?php
namespace fadeev\php2\services;
use fadeev\php2\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
  public function Render($template, $arParams = array())
  {
    ob_start();
    extract($arParams);
    $templatePath = TEMPLATES_DIR.$template.".php";
    include $templatePath;
    return ob_get_clean();
  }
}