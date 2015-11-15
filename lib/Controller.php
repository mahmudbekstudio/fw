<?php
namespace application\lib;

class Controller extends Instance {
	public $layout = 'main';
	private $view;

	public function __construct() {
		$this->view = new View($this->layout);
	}

	public function actionRedirect($controller = false, $action = false) {
		if($controller == false) {
			$controller = Application::get('config')->get(array('default', 'control'));
		}

		if($action == false) {
			$action = Application::get('config')->get(array('default', 'method'));
		}

		$controllerClass = '\application\\' . APPENV . '\controller\\' . ucfirst($controller) . 'Controller';
		if('\\' . get_called_class() == $controllerClass) {
			if(method_exists($this, 'action' . $action)) {
				call_user_func(array($this, 'action' . $action));
			} else {
				$this->action404();
			}
		} else {
			$c = new $controllerClass();
			$c->actionRedirect($controller, $action);
		}
	}

	public function action404() {
		echo __CLASS__ . ' 404';
	}

	public function getModel($name) {
		return Application::getModel($name);
	}

	public function getView() {
		return $this->view;
	}

	public function getPlugin($name) {
		return Application::getPlugin($name);
	}
}