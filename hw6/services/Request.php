<?php
namespace fadeev\php2\services;

class Request
{
  private $requestString;
  private $controllerName;
  private $actionName;
  private $params;
  private $method;

  public function __construct()
  {
    $this->requestString = $_SERVER['REQUEST_URI'];
    $this->parseRequest();
  }

  private function ParseRequest()
  {
    $pattern = "#(?P<controller>[a-z]+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
    $this->method = $_SERVER['REQUEST_METHOD'];
    if (preg_match_all($pattern, $this->requestString, $matches)) {
      $this->controllerName = $matches['controller'][0];
      $this->actionName = $matches['action'][0];
      $this->params = $_REQUEST;
    }
  }

  public function GetControllerName()
  {
    return $this->controllerName;
  }

  public function GetActionName()
  {
    return $this->actionName;
  }

  public function GetParams()
  {
    return $this->params;
  }

  public function GetMethod()
  {
    return $this->method;
  }

}