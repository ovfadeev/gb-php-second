<?php
namespace fadeev\php2\controllers;
use fadeev\php2\interfaces\IRenderer;
use fadeev\php2\services\TemplateRenderer;
use fadeev\php2\services\TwigRenderer;

abstract class Controller
{
  private $action;
  private $defaultAction = 'index';
  private $layout = 'main';
  private $useLayout = true;
  private $renderer;

  /**
   * Controller constructor
   * @param $renderer
   */
  public function __construct(IRenderer $renderer)
  {
      $this->renderer = $renderer;
  }

  public function RunAction($action = null)
  {
    $this->action = $action ?: $this->defaultAction;
    $method = "action".ucfirst($this->action);
    if(method_exists($this, $method)){
      $this->$method();
    } else {
      echo "404";
    }
  }

  public function Render($template, $arParams = array())
  {
    if($this->useLayout){
      return $this->RenderTemplate(
        "layouts/{$this->layout}",
        array(
          "content" => $this->RenderTemplate($template, $arParams)
        )
      );
    } else {
      return $this->RenderTemplate($template, $arParams);
    }
  }

  public function RenderTemplate($template, $arParams = array())
  {
    return $this->renderer->Render($template, $arParams);
  }
}
?>