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
		extract($vars);
		ob_start();
		include PATHROOT . '/plugin/' . $this->getClassName() . '/view/' . $name . '.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function renderView($name, $vars = array()) {
		echo $this->getView($name, $vars);
	}
}