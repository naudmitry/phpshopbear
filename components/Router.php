<?php
	class Router
	{
		// массив, в котором будут хранится маршруты
		private $routes;

		// прочитаем и запомним router
		public function __construct()
		{
			$routesPath = ROOT.'/config/routes.php';
			$this->routes = include($routesPath);
		}

		// получить строку запроса
		private function getURI()
		{
			if (!empty($_SERVER['REQUEST_URI'])) {
				return trim($_SERVER['REQUEST_URI'], '/');
			}
		}

		// принимает направления от front controller
		public function run()
		{
			// получить строку запроса
			$uri = $this->getURI();
			
			// проверить наличие такого запроса в routes.php
			foreach ($this->routes as $uriPattern => $path) {
				// сравниваем $uriPattern и $uri
				if (preg_match("~$uriPattern~", $uri))
				{
					//получаем внутренний путь из внешнего согласно правилу
					$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

					$segments = explode('/', $internalRoute);
					
					$controllerName = array_shift($segments) . 'Controller';
					// название controller
					$controllerName = ucfirst($controllerName);
					// название action
					$actionName = 'action'.ucfirst(array_shift($segments));
					// массив с параметрами
					$parameters = $segments;

					// подключить файл класса-контроллера
					$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

					if (file_exists($controllerFile)) {
						include_once($controllerFile);
					}

					// создать объект, вызвать метод (т.е. action)
					$controllerObject = new $controllerName;

					$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

					//$result = $controllerObject->$actionName($parameters);
					if ($result != null) {
						break;
					}
				}
			}	
		}
	}
?>