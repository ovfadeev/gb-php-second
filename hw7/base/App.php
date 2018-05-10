<?php
namespace fadeev\php2\base;
use fadeev\php2\services\Request;
use fadeev\php2\traits\TSingleton;

class App
{
	use TSingleton;

	public $config;

	/**
	 * @var storage
	 */
	private $components;
	private $controller;
	private $action;

	private static $instance = null;

	/**
	 * @return static
	 */
	public static function call()
	{
		return static::GetInstance();
	}

	public function run($config)
	{
		$this->config = $config;
		$this->components = new Storage();
		$this->runController();
	}

	public function createComponent($name)
	{
		if (isset($this->config["components"][$name]))
		{
			$params = $this->config["components"][$name];
			$class = $params["class"];
			if (class_exists($class))
			{
				unset($params["class"]);
				$reflection = new \ReflectionClass($class);
				return $reflection->newInstanceArgs($params);
			}
		}
		return null;
	}

	public function runController()
	{
		if (!is_null($this->request))
		{
			$this->controller = $this->request->getControllerName() ?: "index";
			$this->action = $this->request->getActionName();

			$controllerClass = $this->config['controllers_namespaces'].ucfirst($this->controller)."Controller";

			if (class_exists($controllerClass))
			{
				$controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
				$controller->runAction($this->action);
			}
		}
		else
		{
			throw new \Exception("Request is null", 1);
		}
	}

	function __get($name)
	{
		return $this->components->get($name);
	}
}