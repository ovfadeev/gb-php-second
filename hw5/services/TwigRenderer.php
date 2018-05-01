<?php
namespace fadeev\php2\services;
use fadeev\php2\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
  public function Render($template, $params = array())
  {
    require_once ROOT_DIR.'vendor/autoload.php';
    $loader = new Twig_Loader_String();
    $twig = new Twig_Environment($loader);
  }

}