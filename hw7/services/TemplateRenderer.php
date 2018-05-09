<?php
namespace fadeev\php2\services;
use fadeev\php2\base\App;
use fadeev\php2\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
  public function Render($template, $arParams = array())
  {
    ob_start();
    extract($arParams);
    $templatePath = App::Call()->config["templates_dir"].$template.".php";
    include $templatePath;
    return ob_get_clean();
  }
}