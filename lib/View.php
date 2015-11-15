<?php
namespace application\lib;

class View extends Instance {

	public $layout;
	private static $content = array();
	private static $beforeContent = array();
	private static $afterContent = array();
	private static $header = array();
	private static $footer = array();

	public function __construct($layout) {
		$this->layout = $layout;
	}

	public function get($name, $vars = array()) {
		$theme = Application::get('config')->get('theme');
		extract($vars);
		ob_start();
		include PATHROOT . DIRECTORY_SEPARATOR . APPENV . '/themes/' . $theme . '/view/' . $name . '.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function render($name, $vars = array()) {
		$this->addContent($this->get($name, $vars));
		$this->renderView();
	}

	public function renderView() {
		$theme = Application::get('config')->get('theme');
		include PATHROOT . DIRECTORY_SEPARATOR . APPENV . '/themes/' . $theme . '/layout/' . $this->layout . '.php';
	}

	public function content() {
		$content = array();
		$content[] = $this->joinContent(self::$beforeContent);
		$content[] = $this->joinContent(self::$content);
		$content[] = $this->joinContent(self::$afterContent);

		echo $this->joinContent($content);
	}

	public function header() {
		echo $this->joinContent(self::$header);
	}

	public function footer() {
		echo $this->joinContent(self::$footer);
	}

	public static function addContent($content) {
		self::$content[] = $content;
	}

	public static function addBeforeContent($content) {
		self::$beforeContent[] = $content;
	}

	public static function addAfterContent($content) {
		self::$afterContent[] = $content;
	}

	public static function addHeader($content) {
		self::$header[] = $content;
	}

	public static function addFooter($content) {
		self::$footer = $content;
	}

	private function joinContent($content) {
		return join("\n", $content);
	}

}