<?php
namespace application\lib;

class Application extends Instance {

	private static $vars;

	public static function run($config) {
		self::set('config', $config);
		$config->set('root', $config->get(array('path', APPENV)));

		self::initPlugin();
		self::initRouter($config);
	}

	public static function set($var, $val) {
		self::$vars[$var] = $val;
	}

	public static function get($var) {
		return isset(self::$vars[$var]) ? self::$vars[$var] : false;
	}

	public static function getVar($name, $params) {
		$name = '\application\lib\\' . ucfirst($name);
		return new $name($params);
	}

	public static function redirect($url) {
		header('Location: ' . $url);
		exit;
	}

	public static function getModel($name) {
		$modelClass = '\application\model\\' . ucfirst($name);
		return new $modelClass();
	}

	public static function getPlugin($name) {
		return false;
	}

	private static function initPlugin() {
		$pluginsList = self::get('config')->get('initPlugin');
		$pluginsListCount = count($pluginsList);

		for($i = 0; $i < $pluginsListCount; $i++) {
			Plugin::get($pluginsList[$i]);
		}
	}

	private static function initRouter($config) {
		$match = self::get('router')->match();
		if($match !== false) {
			if(is_callable( $match['target'] )) {
				call_user_func($match['target']);
			} else {
				$target = explode('/', $match['target']);

				if(count($target) == 3 && $target[0] == 'plugin') {
					$pluginName = $match['params']['name'];
					$nameSpace = '\application\plugin\\' . $pluginName . '\controller\\';
					unset($match['params']['name']);
					array_shift($target);
				} else {
					$nameSpace = '\application\\' . APPENV . '\controller\\';
				}

				$controllerName = $nameSpace . ucfirst($target[0] ? $target[0] : $config->get(array('default', 'controller'))) . 'Controller';
				$actionName = 'action' . ucfirst($target[1] ? $target[1] : $config->get(array('default', 'method')));
				$controller = new $controllerName();

				if(!isset($match['params']['controller'])) {
					$match['params']['controller'] = $config->get(array('default', 'controller'));
				}

				if(!isset($match['params']['action'])) {
					$match['params']['action'] = $config->get(array('default', 'method'));
				}

				$match['params'] = self::initRouterParams($match['params']);
				call_user_func_array(array($controller, $actionName), $match['params']);
			}
		} else {
			self::redirect(self::get('router')->generate('redirect', array('controller' => $config->get(array('default', 'controller')))));
		}
	}

	private static function initRouterParams($params) {
		$defaultParams = array('controller', 'action');
		$result = array();
		$request = new Request('get');
		foreach($params as $key => $val) {
			$request->set($key, $val);

			if(in_array($key, $defaultParams)) {
				$result[$key] = $val;
			}
		}
		return $result;
	}
}