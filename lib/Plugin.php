<?php
namespace application\lib;


class Plugin extends Instance {
	private static $list = array();

	public function __construct() {
		//
	}

	public static function get($pluginName) {
		if(!isset(self::$list[$pluginName])) {
			$name = '\application\plugin\\' . $pluginName . '\\' . ucfirst($pluginName);
			self::$list[$pluginName] = new $name();
		}

		return self::$list[$pluginName];
	}

	public function getView($name, $vars = array()) {
		$view = new View('', $this->getClassName(true));
		return $view->get($name, $vars);
	}

	public function renderView($name, $vars = array()) {
		echo $this->getView($name, $vars);
	}
}