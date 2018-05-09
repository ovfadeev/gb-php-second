<?php
namespace fadeev\php2\base;
use fadeev\php2\services\Db;
use fadeev\php2\services\Request;
use fadeev\php2\traits\TSingleton;

class App
{
	use TSingleton;

	public $config;

	private $components;
	private $controller;
	private $action;

	public static function Call()
	{
		return static::getInstance();
	}

	public function Run($config)
	{
		$this->config = $config;
		$this->components = new Storage();
		$this->RunController();
	}

	public function CreateComponent($name)
	{
		if (isset($this->config['components'][$name])) {
			$params = $this->config['components'][$name];
			$class = $params['class'];
			if (class_exists($class)) {
				unset($params['class']);
				$reflection = new \ReflectionClass($class);
				return $reflection->newInstanceArgs($params);
			}
		}
		return null;
	}

	public function RunController()
	{
		echo "<pre>";
		print_r($this);
		echo "</pre>";
		$this->controller = $this->request->GetControllerName() ?: 'index';
		$this->action = $this->request->GetActionName();

		$controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . "Controller";

		if (class_exists($controllerClass)) {
			$controller = new $controllerClass(new \app\services\TemplateRenderer());
			$controller->RunAction($this->action);
		}
	}

	function __get($name)
	{
		return $this->components->get($name);
	}
}