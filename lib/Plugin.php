<?php
namespace application\lib;


class Plugin extends Instance {
	private static $list = array();
	private $initialized = false;

	public function __construct() {
		//
	}

	public function init() {
		$this->initialized = true;
	}

	public function render() {
		if(!$this->initialized) {
			$this->init();
		}
	}

	public static function get($pluginName) {
		if(!isset(self::$list[$pluginName])) {
			$name = '\application\plugin\\' . $pluginName . '\\' . ucfirst($pluginName);
			self::$list[$pluginName] = new $name();
		}

		return self::$list[$pluginName];
	}
}