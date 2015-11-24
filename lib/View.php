<?php
namespace application\lib;

class View extends Instance {

	public $layout;
	private static $content = array();
	private static $beforeContent = array();
	private static $afterContent = array();
	private static $header = array();
	private static $footer = array();
	private $pluginName;

	public function __construct($layout, $plugin) {
		$this->pluginName = $plugin;
		$this->layout = $layout;
	}

	public function get($name, $vars = array()) {
		extract($vars);
		ob_start();
		$viewFile = $this->getThemesPath() . '/view/' . $name . '.php';
		if(file_exists($viewFile)) {
			include $viewFile;
		} else {
			echo '';
		}
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function render($name, $vars = array()) {
		$view = $this->get($name, $vars);
		if($this->pluginName !== false) {
			echo $view;
		} else {
			$this->addContent($view);
			$this->renderView();
		}
	}

	public function renderView() {
		$this->init();
		include $this->getThemesPath() . '/layout/' . $this->layout . '.php';
	}

	private function getThemesPath() {
		$path = PATHROOT . DIRECTORY_SEPARATOR;
		if($this->pluginName === false) {
			$theme = Application::get('config')->get('theme');
			$path .= APPENV . '/themes/' . $theme;
		} else {
			$path .= 'plugin/' . $this->pluginName;
		}
		return $path;
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
		self::$footer[] = $content;
	}

	private function joinContent($content) {
		return join("\n", $content) . "\n";
	}

	private function init() {
		$config = Application::get('config')->get('html');

		foreach($config as $type => $configItems) {
			$type = ucfirst($type);

			foreach($configItems as $key => $val) {
				$val['params'] = isset($val['params']) ? $val['params'] : array();
				$val['inner'] = isset($val['inner']) ? $val['inner'] : '';
				$tag = Tag::get($val['tag'], $val['params'], $val['inner']);
				$method = __NAMESPACE__ . '\View::add' . $type;

				if(isset($val['comment'])) {
					$tagComment = Tag::getComment($val['comment']);
					call_user_func_array($method, array($tagComment));
				}

				call_user_func_array($method, array($tag));
			}
		}
	}

	public function plugin($name) {
		return Plugin::get($name);
	}

	public function tag($name) {
		return Tag::get($name);
	}

}