<?php
namespace fadeev\php2\controllers;
/**
 * Controller
 */
abstract class Controller
{
  private $action;
  private $defaultAction = 'index';
  private $layout = 'main';
  private $useLayout = true;

  public function runAction($action = null)
  {
    $this->action = $action ?: $this->defaultAction;
    $method = "action" . ucfirst($this->action);

    if(method_exists($this, $method)){
      $this->$method();
    }else{
      echo "404";
    }
  }

  public function render($template, $arParams = array())
  {
    if($this->useLayout){
      return $this->renderTemplate("layouts/{$this->layout}",
        ['content' => $this->renderTemplate($template, $arParams)]);
    }else{
      return $this->renderTemplate($template, $arParams);
    }
  }

  public function renderTemplate($template, $arParams = array())
  {
    ob_start();
    extract($arParams);
    $templatePath = TEMPLATES_DIR . $template . ".php";
    include $templatePath;
    return ob_get_clean();
  }

}
?>