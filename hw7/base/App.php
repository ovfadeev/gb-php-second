<?php
namespace fadeev\php2\base;
use fadeev\php2\services\DB;
use fadeev\php2\services\Request;
use fadeev\php2\traits\TSingleton;

class App
{
	use TSingleton;

	public $config;

	private $components;
	private $controller;
	private $action;

	private static $instance;

	public static function Call()
	{
		return static::GetInstance();
	}

	public function Run($config)
	{
		$this->config = $config;
		$this->components = new Storage();
		$this->RunController();
	}

	public function CreateComponent($name)
	{
		echo "<pre>";
		var_dump($this->config);
		echo "</pre>";
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

	public function RunController()
	{
		if (!is_null($this->request))
		{
			$this->controller = $this->request->GetControllerName() ?: "index";
			$this->action = $this->request->GetActionName();

			$controllerClass = $this->config['controllers_namespaces'].ucfirst($this->controller)."Controller";

			if (class_exists($controllerClass))
			{
				$controller = new $controllerClass(new \fadeev\php2\services\TemplateRenderer());
				$controller->RunAction($this->action);
			}
		}
		else
		{
			throw new \Exception("Request is null", 1);
		}
	}

	function __get($name)
	{
		echo $name;
		echo "<pre>";
		var_dump($this->components);
		echo "</pre>";

		echo "<pre>";
		var_dump($this->config);
		echo "</pre>";
		return $this->components->Get($name);
	}
}